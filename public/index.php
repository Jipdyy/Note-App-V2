<?php
/** @var NoteRepository $noteRepo */
require_once '../includes/bootstrap.php';
require_once '../includes/session.php';

requireLogin();

$notes= $noteRepo->allByUser(currentUserId());
?>

<!DOCTYPE html>
<html lang="en">
<body>
	<h2>Notes Saya</h2>
	<ul>
	    <?php if(empty($notes)): ?>
			<h3>Belum ada catatan.</h3>
		<?php else:?>
            <?php foreach ($notes as $note): ?>
          		<li>
                    <a href="detail_note.php?id=<?= $note->id ?>">
                        <?= htmlspecialchars($note->title) ?>
                    </a>
                </li>
           	<?php endforeach; ?>
        <?php endif; ?>
	</ul>

	<a href="add_note.php">+Tambah Note</a>
	<a href="logout.php">+Logout</a>

</body>
</html>
