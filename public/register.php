<?php
require_once '/../includes/bootstrap.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
       $error = 'Username dan Password tidak boleh kosong';
    } else if ($userRepo->findByUsername($username)){
        $error = "Username sudah digunakan";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userRepo->create($username, $hashedPassword);
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Daftar</h2>
    <?php if($error != ''): ?>
        <p style="color: red;"><?= $error?></p>
    <php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Masukkan username anda...">
        <input type="password" name="password" placeholder="Masukkan password anda...">
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
