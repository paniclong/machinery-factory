<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarEngineCounterRepository")
 */
class CarEngineCounter
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function incrementId(): void
    {
        ++$this->id;
    }
}
