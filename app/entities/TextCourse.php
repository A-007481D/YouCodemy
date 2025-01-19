<?php

namespace App\entities;

class TextCourse extends Cours {
    private string $textContent;

    public function __construct(int $id, string $title, string $description, string $contentType, string $textContent, string $category, User $publisher, string $status, array $tags = [])
    {
        parent::__construct($id, $title, $description, $contentType, $category, $publisher, $status, $tags);
        $this->textContent = $textContent;
    }

    public function getContent(): string
    {
        return $this->textContent;
    }
}
