<?php
class User {
    public int $id;
    public string $username;
    public string $password;

    public function __construct(int $id, string $title, string $content) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
}
