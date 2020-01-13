<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryHairstyleRepository")
 */
class CategoryHairstyle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ModelHairstyle", mappedBy="categoty_hairstyle")
     */
    private $modelHairstyles;

    public function __construct()
    {
        $this->modelHairstyles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|ModelHairstyle[]
     */
    public function getModelHairstyles(): Collection
    {
        return $this->modelHairstyles;
    }

    public function addModelHairstyle(ModelHairstyle $modelHairstyle): self
    {
        if (!$this->modelHairstyles->contains($modelHairstyle)) {
            $this->modelHairstyles[] = $modelHairstyle;
            $modelHairstyle->setCategotyHairstyle($this);
        }

        return $this;
    }

    public function removeModelHairstyle(ModelHairstyle $modelHairstyle): self
    {
        if ($this->modelHairstyles->contains($modelHairstyle)) {
            $this->modelHairstyles->removeElement($modelHairstyle);
            // set the owning side to null (unless already changed)
            if ($modelHairstyle->getCategotyHairstyle() === $this) {
                $modelHairstyle->setCategotyHairstyle(null);
            }
        }

        return $this;
    }
}
