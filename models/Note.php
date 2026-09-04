<?php
class Note {
    public int $id;
    public string $title;
    public string $content;

    public function __construct(int $id, string $title, string $content) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }
}
