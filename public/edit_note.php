<?php
/** @var NoteRepository $noteRepo */
/** @var UserRepository $userRepo */
require_once '../includes/bootstrap.php';
require_once '../includes/session.php';

requireLogin();

$id = (int)$_GET['id'];
$note = $noteRepo->find($id, currentUserId());
if (!$note) {
    header('Location: index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $noteRepo->update($id, currentUserId(), $title, $content);
    header('Location: detail_note.php?id='. $id);
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Edit Note</h2>
    <?php if($error != ''): ?>
        <p style="color: red;"><?= $error?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="title" value="<?= htmlspecialchars($note->title)?>">
        <input type="text" name="content" value="<?= htmlspecialchars($note->content)?>">
        <button type="submit">Edit</button>
    </form>
</body>
</html>
