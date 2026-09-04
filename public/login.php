<?php
require_once '../includes/bootstrap.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = $userRepo->findByUsername($username);

    if(!$user || !password_verify($password, $user->password)) {
        $error = 'Username atau password salah!';
    } else {
        $_SESSION['user_id'] = $user->id;
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
	<h2>Login</h2>
	<?php if($error != ''): ?>
        <p style="color: red;"><?= $error?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Masukkan username anda">
        <input type="password" name="password" placeholder="Masukkan password anda">
        <button type="submit">Login</button>
    </form>

    <a href="register.php">Belum punya akun? Buat disini.</a>

</body>
</html>
