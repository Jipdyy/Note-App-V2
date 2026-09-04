<?php
session_start;

require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../repositories/NoteRepository.php';
require_once __DIR__ . '/../repositories/UserRepository.php';

$db = getConnection();
$noteRepo = new NoteRepository($db);
$userRepo = new UserRepository($db);
