<?php

    namespace App\entities;

    class TextCourse extends Cours {
        private string $textContent;

        public function __construct(int $id, string $title, string $description, string $contentType, string $textContent, $category, User $publisher, array $tags = []) {
            parent::__construct($id, $title, $description, $contentType, $category, $publisher, $tags);
            $this->textContent = $textContent;
        }

        public function getContent(): string {
            return $this->textContent;
        }
    }