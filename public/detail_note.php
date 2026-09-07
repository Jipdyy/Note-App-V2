<?php
/** @var NoteRepository $noteRepo */
/** @var UserRepository $userRepo */
require_once '../includes/bootstrap.php';
require_once '../includes/session.php';

requireLogin();

$id = (int)$_GET['id'];
$note = $noteRepo->find($id, currentUserId());
if (!$note){
    header('Refresh: 2; url=index.php;');
    echo 'Catatan tidak ditemukan';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<body>

    <h2>Judul : <?= htmlspecialchars($note->title) ?></h2>
    <h2>Konten: <?= htmlspecialchars($note->content) ?></h2>

    <a href="edit_note.php?id=<?= $note->id ?>">Edit</a>
    <a href="delete_note.php?id=<?= $note->id ?>">Hapus</a>
    <a href="index.php">Kembali</a>
</body>
</html>
