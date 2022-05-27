<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
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
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $formation_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $formateur_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getFormationId(): ?int
    {
        return $this->formation_id;
    }

    public function setFormationId(int $formation_id): self
    {
        $this->formation_id = $formation_id;

        return $this;
    }

    public function getFormateurId(): ?int
    {
        return $this->formateur_id;
    }

    public function setFormateurId(int $formateur_id): self
    {
        $this->formateur_id = $formateur_id;

        return $this;
    }
}
