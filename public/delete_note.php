<?php
/** @var NoteRepository $noteRepo */
/** @var UserRepository $userRepo */
require_once '../includes/bootstrap.php';
require_once '../includes/session.php';

requireLogin();

$id = (int)$_GET['id'];
$noteRepo->delete($id, currentUserId());
header('Location: index.php');
exit();
