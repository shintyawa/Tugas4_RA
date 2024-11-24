<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $food = $_POST['food'];

    // Validasi teks
    if (strlen($name) < 3 || strlen($name) > 50) {
        die("Name must be between 3 and 50 characters.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        die("Phone number must be 10-15 digits.");
    }

    // Validasi file
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $fileType = mime_content_type($file['tmp_name']);
        $allowedTypes = ['image/jpeg', 'image/png'];

        if (!in_array($fileType, $allowedTypes)) {
            die("Only JPG or PNG files are allowed.");
        }

        if ($file['size'] > 2 * 1024 * 1024) { // 2MB max size
            die("File size must not exceed 2MB.");
        }

        // Simpan file ke folder "uploads"
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Buat folder jika belum ada
        }
        $filePath = $uploadDir . basename($file['name']);
        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            die("Failed to upload file.");
        }
    } else {
        die("File is required.");
    }

    // Simpan data ke session
    $_SESSION['formData'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'food' => $food,
        'filePath' => $filePath,
        'fileType' => $fileType,
    ];

    // Redirect ke result.php
    header('Location: result.php');
    exit();
} else {
    die("Invalid request.");
}
