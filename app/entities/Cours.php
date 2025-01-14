<?php
namespace App\Entities;

class Cours {
    private int  $id;
    private string $title;
    private string $description;
    private string $contentType;
    public function __construct(int $id, string $title, string $description, string $contentType) {

    }
}



