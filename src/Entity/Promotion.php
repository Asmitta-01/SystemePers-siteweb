<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_promo = null;

    #[ORM\ManyToOne(inversedBy: 'promotions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $employe = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poste $ancien_poste = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poste $nouveau_poste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePromo(): ?\DateTimeInterface
    {
        return $this->date_promo;
    }

    public function setDatePromo(\DateTimeInterface $date_promo): self
    {
        $this->date_promo = $date_promo;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(?Employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }

    public function getAncienPoste(): ?Poste
    {
        return $this->ancien_poste;
    }

    public function setAncienPoste(?Poste $ancien_poste): self
    {
        $this->ancien_poste = $ancien_poste;

        return $this;
    }

    public function getNouveauPoste(): ?Poste
    {
        return $this->nouveau_poste;
    }

    public function setNouveauPoste(?Poste $nouveau_poste): self
    {
        $this->nouveau_poste = $nouveau_poste;

        return $this;
    }
}
