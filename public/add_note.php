<?php
/** @var NoteRepository $noteRepo */
/** @var UserRepository $userRepo */
require_once '../includes/bootstrap.php';
require_once '../includes/session.php';

requireLogin();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (empty($title) || empty($content)) {
        $error = 'Judul dan isi konten tidak boleh kosong!';
    } else {
        $noteRepo->create(currentUserId(), $title, $content);
        header('Location: index.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Tambah Note</h2>
    <?php if($error != ''): ?>
           <p style="color: red;"><?= $error?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="title" placeholder="Judul">
        <textarea name="content" placeholder="Konten"></textarea>
        <button type="submit">Simpan</button>
    </form>

    <a href="index.php">Kembali</a>
</body>
</html>
