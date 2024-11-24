<?php
session_start();
if (!isset($_SESSION['formData'])) {
    die("No data to display. Please submit the form first.");
}

$data = $_SESSION['formData'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Form Submission Result</h1>

    <h2>User Data</h2>
    <table>
        <tr><th>Name</th><td><?= htmlspecialchars($data['name']); ?></td></tr>
        <tr><th>Email</th><td><?= htmlspecialchars($data['email']); ?></td></tr>
        <tr><th>Phone</th><td><?= htmlspecialchars($data['phone']); ?></td></tr>
        <tr><th>Food Choice</th><td><?= htmlspecialchars($data['food']); ?></td></tr>
    </table>

    <h2>Uploaded File</h2>
    <?php if (in_array($data['fileType'], ['image/jpeg', 'image/png'])): ?>
        <p><strong>Uploaded Image:</strong></p>
        <img src="<?= 'uploads/' . htmlspecialchars(basename($data['filePath'])); ?>" alt="Uploaded File" style="max-width: 100%; height: auto;">
    <?php else: ?>
        <p>Unsupported file type.</p>
    <?php endif; ?>
</body>
</html>
