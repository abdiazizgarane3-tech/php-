<?php
session_start();

$errors = [];
$old = [
    'name' => '', 'pob' => '', 'dob' => '', 'address' => '', 'gender' => '',
    'telephone' => '', 'email' => '', 'parent_name' => '', 'parent_telephone' => '',
    'relationship' => '', 'student_id' => '', 'faculty' => '', 'department' => '',
    'class' => '', 'registration_date' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $key => $value) {
        $old[$key] = trim($_POST[$key] ?? '');
    }

    $requiredLabels = [
        'name' => 'Student Name', 'pob' => 'Place of Birth', 'dob' => 'Date of Birth',
        'address' => 'Address', 'gender' => 'Gender', 'telephone' => 'Telephone',
        'email' => 'Email', 'parent_name' => 'Parent Name',
        'parent_telephone' => 'Parent Telephone', 'relationship' => 'Relationship',
        'student_id' => 'Student ID', 'faculty' => 'Faculty', 'department' => 'Department',
        'class' => 'Class', 'registration_date' => 'Registration Date'
    ];

    foreach ($requiredLabels as $key => $label) {
        if ($old[$key] === '') {
            $errors[$key] = "$label is required.";
        }
    }

    if ($old['name'] !== '' && !preg_match("/^[\p{L} ]+$/u", $old['name'])) {
        $errors['name'] = 'Name must contain only letters and spaces.';
    }

    if ($old['parent_name'] !== '' && !preg_match("/^[\p{L} ]+$/u", $old['parent_name'])) {
        $errors['parent_name'] = 'Parent name must contain only letters and spaces.';
    }

    if ($old['email'] !== '' && !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if (!isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
        $errors['image'] = 'Please upload a student image.';
    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $errors['image'] = 'The image upload failed. Please try again.';
    } else {
        $maxSize = 5 * 1024 * 1024;
        if ($_FILES['image']['size'] > $maxSize) {
            $errors['image'] = 'Image must be 5 MB or smaller.';
        } else {
            $allowedMimeTypes = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp'
            ];
            $fileInfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $fileInfo->file($_FILES['image']['tmp_name']);
            if (!isset($allowedMimeTypes[$mimeType])) {
                $errors['image'] = 'Only JPG, JPEG, PNG, GIF, or WEBP image files are allowed.';
            }
        }
    }

    if (!$errors) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $extension = $allowedMimeTypes[$mimeType];
        $imageName = bin2hex(random_bytes(12)) . '.' . $extension;
        $destination = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            $errors['image'] = 'Could not save the uploaded image. Check the uploads folder permissions.';
        } else {
            $_SESSION['student'] = $old;
            $_SESSION['student']['image'] = 'uploads/' . $imageName;
            header('Location: result.php');
            exit;
        }
    }
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration | Jamhuriya University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f6fb; }
        .page-header { background: linear-gradient(135deg, #123b68, #2369a8); color: white; }
        .form-card { border: 0; border-radius: 16px; box-shadow: 0 8px 28px rgba(20, 48, 80, .09); }
        .section-title { color: #174a7e; border-bottom: 2px solid #e6edf5; padding-bottom: .65rem; margin-bottom: 1.2rem; }
        .required::after { content: " *"; color: #dc3545; }
    </style>
</head>
<body>
<header class="page-header py-4 mb-4">
    <div class="container">
        <h1 class="h3 mb-1">Gaarane primary &amp; secondary school</h1>
        <p class="mb-0">Faculty of Computer &amp; IT · Student Registration Form</p>
    </div>
</header>

<main class="container pb-5">
    <div class="card form-card">
        <div class="card-body p-4 p-md-5">
            <h2 class="h4 mb-4">Student Information</h2>

            <?php if ($errors): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Please correct the following:</strong>
                    <ul class="mb-0 mt-2">
                        <?php foreach ($errors as $message): ?>
                            <li><?= e($message) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="index.php" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880">

                <h3 class="h5 section-title">1. Personal Information</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label required">Full Name</label>
                        <input class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= e($old['name']) ?>" required pattern="[\p{L} ]+" title="Letters and spaces only">
                        <?php if (isset($errors['name'])): ?><div class="invalid-feedback"><?= e($errors['name']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="pob" class="form-label required">Place of Birth (POB)</label>
                        <input class="form-control" id="pob" name="pob" value="<?= e($old['pob']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dob" class="form-label required">Date of Birth (DOB)</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?= e($old['dob']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label required">Address</label>
                        <input class="form-control" id="address" name="address" value="<?= e($old['address']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label required">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">Choose gender</option>
                            <option value="Male" <?= $old['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                            <option value="Female" <?= $old['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                            <option value="Prefer not to say" <?= $old['gender'] === 'Prefer not to say' ? 'selected' : '' ?>>Prefer not to say</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="telephone" class="form-label required">Telephone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" value="<?= e($old['telephone']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label required">Email</label>
                        <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= e($old['email']) ?>" required>
                        <?php if (isset($errors['email'])): ?><div class="invalid-feedback"><?= e($errors['email']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label required">Student Image</label>
                        <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid' : '' ?>" id="image" name="image" accept=".png,.jpg,.jpeg,.gif,.webp,image/png,image/jpeg,image/gif,image/webp" required>
                        <div class="form-text">Accepted: JPG, JPEG, PNG, GIF, WEBP. Maximum 5 MB.</div>
                        <?php if (isset($errors['image'])): ?><div class="invalid-feedback"><?= e($errors['image']) ?></div><?php endif; ?>
                    </div>
                </div>

                <h3 class="h5 section-title">2. Parent Information</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="parent_name" class="form-label required">Parent/Guardian Name</label>
                        <input class="form-control <?= isset($errors['parent_name']) ? 'is-invalid' : '' ?>" id="parent_name" name="parent_name" value="<?= e($old['parent_name']) ?>" required>
                        <?php if (isset($errors['parent_name'])): ?><div class="invalid-feedback"><?= e($errors['parent_name']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="parent_telephone" class="form-label required">Parent Telephone</label>
                        <input type="tel" class="form-control" id="parent_telephone" name="parent_telephone" value="<?= e($old['parent_telephone']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="relationship" class="form-label required">Relationship</label>
                        <select class="form-select" id="relationship" name="relationship" required>
                            <option value="">Choose relationship</option>
                            <?php foreach (['Father', 'Mother', 'Guardian', 'Other'] as $relation): ?>
                                <option value="<?= e($relation) ?>" <?= $old['relationship'] === $relation ? 'selected' : '' ?>><?= e($relation) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <h3 class="h5 section-title">3. Academic Information</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="student_id" class="form-label required">Student ID</label>
                        <input class="form-control" id="student_id" name="student_id" value="<?= e($old['student_id']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="faculty" class="form-label required">Faculty</label>
                        <input class="form-control" id="faculty" name="faculty" value="<?= e($old['faculty']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="department" class="form-label required">Department</label>
                        <input class="form-control" id="department" name="department" value="<?= e($old['department']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="class" class="form-label required">Class</label>
                        <input class="form-control" id="class" name="class" value="<?= e($old['class']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="registration_date" class="form-label required">Registration Date</label>
                        <input type="date" class="form-control" id="registration_date" name="registration_date" value="<?= e($old['registration_date']) ?>" required>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary px-4">Register Student</button>
                    <button type="reset" class="btn btn-outline-secondary px-4">Clear Form</button>
                </div>
            </form>
        </div>
    </div>
    <p class="text-center text-secondary small mt-3 mb-0">PHP &amp; MySQL · Chapter 4 Assignment (Forms)</p>
</main>
</body>
</html>
