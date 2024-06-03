<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Vehicle Management</title>
</head>
<body>
    <h1>Vehicle Management System</h1>
    <a href="/vehicles/create">Add New Vehicle</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Registration Number</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['vehicles'] as $vehicle): ?>
            <tr>
                <td><?= $vehicle->id ?></td>
                <td><?= $vehicle->name ?></td>
                <td><?= $vehicle->type ?></td>
                <td><?= $vehicle->registration_number ?></td>
                <td><?= $vehicle->owner ?></td>
                <td>
                    <a href="/vehicles/edit/<?= $vehicle->id ?>">Edit</a>
                    <a href="/vehicles/delete/<?= $vehicle->id ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
