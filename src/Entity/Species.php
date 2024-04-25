<?php

namespace App\Entity;

use App\Repository\SpeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpeciesRepository::class)]
class
Species
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'species')]
    private Collection $type;

    /**
     * @var Collection<int, Ability>
     */
    #[ORM\ManyToMany(targetEntity: Ability::class, inversedBy: 'species')]
    private Collection $ability;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $parent_id;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->ability = new ArrayCollection();
        $this->parent_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Type $type): static
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
        }

        return $this;
    }

    public function removeType(Type $type): static
    {
        $this->type->removeElement($type);

        return $this;
    }

    /**
     * @return Collection<int, Ability>
     */
    public function getAbility(): Collection
    {
        return $this->ability;
    }

    public function addAbility(Ability $ability): static
    {
        if (!$this->ability->contains($ability)) {
            $this->ability->add($ability);
        }

        return $this;
    }

    public function removeAbility(Ability $ability): static
    {
        $this->ability->removeElement($ability);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getParentId(): Collection
    {
        return $this->parent_id;
    }

    public function addParentId(self $parentId): static
    {
        if (!$this->parent_id->contains($parentId)) {
            $this->parent_id->add($parentId);
        }

        return $this;
    }

    public function removeParentId(self $parentId): static
    {
        $this->parent_id->removeElement($parentId);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
