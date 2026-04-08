<!DOCTYPE html>
<html>
<head>
<style>
body { font-family: Arial; background:#f4f6f9; }
form {
    width:300px;
    margin:50px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}
input, button {
    width:100%;
    padding:10px;
    margin-bottom:10px;
}
button { background:#2980b9; color:white; border:none; }
</style>
</head>

<body>

<form method="POST" action="/etudiants/update">

<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
<input type="hidden" name="id" value="<?= $etudiant['id'] ?>">

<h3>Modifier étudiant</h3>

<input type="text" name="nom" value="<?= $etudiant['nom'] ?>" required>
<input type="email" name="email" value="<?= $etudiant['email'] ?>" required>

<button>Modifier</button>

</form>

</body>
</html>