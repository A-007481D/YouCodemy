<?php

namespace App\entities;

abstract class Cours
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected string $contentType;
    protected string $category;
    protected array $tags = [];
    protected User $publisher;
    protected string $status;

    public function __construct(int $id, string $title, string $description, string $contentType, string $category, User $publisher, string $status, array $tags = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->contentType = $contentType;
        $this->category = $category;
        $this->tags = $tags;
        $this->publisher = $publisher;
        $this->status = $status;
    }
    public function getId() : int {return $this->id; }
    public function getTitle() : string {return $this->title; }
    public function getDescription() : string {return $this->description; }
    public function getContentType() : string {return $this->contentType; }
    public function getCategory() : string {return $this->category;}
    public function getTags() : array {return $this->tags; }
    public function getPublisher(): User {return $this->publisher;}
    public function getStatus() : string {return $this->status; }
    abstract public function getContent() : string;
}
