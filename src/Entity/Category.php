<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Cat_Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Cat_Des = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->Cat_Name;
    }

    public function setCatName(string $Cat_Name): self
    {
        $this->Cat_Name = $Cat_Name;

        return $this;
    }

    public function getCatDes(): ?string
    {
        return $this->Cat_Des;
    }

    public function setCatDes(string $Cat_Des): self
    {
        $this->Cat_Des = $Cat_Des;

        return $this;
    }
}
