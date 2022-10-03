<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?RefMaker $maker = null;

    #[ORM\OneToMany(mappedBy: 'vehicle', targetEntity: RefModel::class)]
    private Collection $model;

    public function __construct()
    {
        $this->model = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaker(): ?RefMaker
    {
        return $this->maker;
    }

    public function setMaker(RefMaker $maker): self
    {
        $this->maker = $maker;

        return $this;
    }

    /**
     * @return Collection<int, RefModel>
     */
    public function getModel(): Collection
    {
        return $this->model;
    }

    public function addModel(RefModel $model): self
    {
        if (!$this->model->contains($model)) {
            $this->model->add($model);
            $model->setVehicle($this);
        }

        return $this;
    }

    public function removeModel(RefModel $model): self
    {
        if ($this->model->removeElement($model)) {
            // set the owning side to null (unless already changed)
            if ($model->getVehicle() === $this) {
                $model->setVehicle(null);
            }
        }

        return $this;
    }
}
