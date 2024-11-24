<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 style="text-align: center;">Food Order Form</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <!-- Input untuk Nama -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required minlength="3" maxlength="50">
        
        <!-- Input untuk Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <!-- Input untuk Nomor Telepon -->
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required pattern="[0-9]{10,15}">
        
        <!-- Input untuk Pilihan Makanan -->
        <label for="food">Food Choice:</label>
        <select id="food" name="food" required>
            <option value="">Select a food item</option>
            <option value="Pizza">Pizza</option>
            <option value="Burger">Burger</option>
            <option value="Pasta">Pasta</option>
            <option value="Sushi">Sushi</option>
        </select>
        
        <!-- Input untuk Unggah File -->
        <label for="file">Upload File (JPG or PNG only):</label>
        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png" required>
        
        <!-- Tombol Submit -->
        <button type="submit">Submit</button>
    </form>
</body>
</html>
