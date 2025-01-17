<?php
namespace App\Entities;

abstract class Cours {
    protected int  $id;
    protected string $title;
    protected string $description;
    protected string $contentType;
    protected array $tags = [];
    public function __construct(int $id, string $title, string $description, string $contentType, array $tags = []) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->contentType = $contentType;
        $this->tags = $tags;
    }
    public function getId() : int {return $this->id; }
    public function getTitle() : string {return $this->title; }
    public function getDescription() : string {return $this->description; }
    public function getContentType() : string {return $this->contentType; }
    public function getTags() : array {return $this->tags; }

    abstract public function getContent() : string;
}



