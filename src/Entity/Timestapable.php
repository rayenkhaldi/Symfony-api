<?php

declare(strict_types=1);

namespace App\Entity;

trait Timestapable{
    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime",nullable=true)
     */
    private \DateTimeInterface  $createdAt;
    private ?\DateTimeInterface  $updatedAt;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }


}