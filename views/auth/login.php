<form method="post" action="/login">
  <input type="hidden" name="_csrf" value="<?= $_SESSION['csrf_token'] ?>">
  
  <input name="username" placeholder="Username" required>
  <input type="password" name="password" required>

  <button>Login</button>
</form>