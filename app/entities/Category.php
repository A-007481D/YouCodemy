<?php


namespace App\entities;

class Category {
    private int $id;
    private string $category_name;

    public function __construct(int $id, string $category_name)
    {
      $this->id = $id;
      $this->category_name = $category_name;
    }

    public function getId(): int {return $this->id;}
    public function getCategoryName(): string {return $this->category_name;}

    public function setCategoryName(string $category_name): void {$this->category_name = $category_name;}
}