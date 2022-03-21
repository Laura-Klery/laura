<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Competence::class, mappedBy="category_id")
     */
    private $competence_id;

    public function __construct()
    {
        $this->competence_id = new ArrayCollection();
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

    /**
     * @return Collection<int, Competence>
     */
    public function getCompetenceId(): Collection
    {
        return $this->competence_id;
    }

    public function addCompetenceId(Competence $competenceId): self
    {
        if (!$this->competence_id->contains($competenceId)) {
            $this->competence_id[] = $competenceId;
            $competenceId->setCategoryId($this);
        }

        return $this;
    }

    public function removeCompetenceId(Competence $competenceId): self
    {
        if ($this->competence_id->removeElement($competenceId)) {
            // set the owning side to null (unless already changed)
            if ($competenceId->getCategoryId() === $this) {
                $competenceId->setCategoryId(null);
            }
        }

        return $this;
    }
}
