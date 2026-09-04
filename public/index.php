<?php
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

	</ul>

	<a href="add_note.php">+Tambah Note</a>
	<a href="logout.php">+Logout</a>

</body>
</html>
