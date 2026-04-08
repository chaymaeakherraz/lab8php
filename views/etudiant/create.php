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
button { background:#27ae60; color:white; border:none; }
</style>
</head>

<body>

<form method="POST" action="/etudiants/store">

<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

<h3>Ajouter étudiant</h3>

<input type="text" name="nom" placeholder="Nom" required>
<input type="email" name="email" placeholder="Email" required>

<button>Ajouter</button>

</form>

</body>
</html>