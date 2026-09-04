<?php
function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

function requireLogin(): void {
    if (!isLoggedIn()){
        header('Location: login.php');
        exit();
    }
}

function currentUserId(): int {
    return $_SESSION['user_id'];
}
