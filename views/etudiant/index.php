<!DOCTYPE html>
<html>
<head>
    <title>Etudiants</title>

    <style>
        body { font-family: Arial; background:#f4f6f9; padding:30px; }

        table {
            width:100%;
            border-collapse: collapse;
            background:white;
        }

        th, td {
            padding:10px;
            border:1px solid #ddd;
            text-align:center;
        }

        th { background:#2c3e50; color:white; }

        a.btn {
            padding:6px 10px;
            text-decoration:none;
            border-radius:5px;
            color:white;
        }

        .add { background:#27ae60; }
        .edit { background:#2980b9; }
        .delete { background:#e74c3c; }

    </style>
</head>

<body>

<h2>Liste des étudiants</h2>

<a href="/etudiants/create" class="btn add">➕ Ajouter</a>

<br><br>

<table>
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

<?php foreach ($etudiants as $e): ?>
<tr>
    <td><?= $e['id'] ?></td>
    <td><?= $e['nom'] ?></td>
    <td><?= $e['email'] ?></td>
    <td>
        <a class="btn edit" href="/etudiants/edit?id=<?= $e['id'] ?>">Edit</a>
        <a class="btn delete" href="/etudiants/delete?id=<?= $e['id'] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>