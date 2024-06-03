<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Create Vehicle</title>
</head>
<body>
    <h1>Add New Vehicle</h1>
    <form action="/vehicles/store" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required>
        <label for="registration_number">Registration Number:</label>
        <input type="text" id="registration_number" name="registration_number" required>
        <label for="owner">Owner:</label>
        <input type="text" id="owner" name="owner" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
