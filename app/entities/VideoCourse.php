<?php

namespace App\entities;

class VideoCourse extends Cours {
    private string $videoPath;

    public function __construct(int $id, string $title, string $description, string $contentType, string $videoPath,User $publisher, array $tags = []) {
        parent::__construct($id, $title, $description, $contentType,$publisher, $tags);
        $this->videoPath = $videoPath;
    }

    public function getContent(): string {
        return $this->videoPath;
    }
}
