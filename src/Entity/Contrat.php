<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\Column]
    private ?float $salaire = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_signature = null;

    #[ORM\Column]
    private ?int $periode_preavis = null;

    #[ORM\Column]
    private ?int $duree_travail_hebdo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $clause_supp = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_resiliation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_modification = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $employe = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poste $poste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->date_signature;
    }

    public function setDateSignature(\DateTimeInterface $date_signature): self
    {
        $this->date_signature = $date_signature;

        return $this;
    }

    public function getPeriodePreavis(): ?int
    {
        return $this->periode_preavis;
    }

    public function setPeriodePreavis(int $periode_preavis): self
    {
        $this->periode_preavis = $periode_preavis;

        return $this;
    }

    public function getDureeTravailHebdo(): ?int
    {
        return $this->duree_travail_hebdo;
    }

    public function setDureeTravailHebdo(int $duree_travail_hebdo): self
    {
        $this->duree_travail_hebdo = $duree_travail_hebdo;

        return $this;
    }

    public function getClauseSupp(): ?string
    {
        return $this->clause_supp;
    }

    public function setClauseSupp(?string $clause_supp): self
    {
        $this->clause_supp = $clause_supp;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateResiliation(): ?\DateTimeInterface
    {
        return $this->date_resiliation;
    }

    public function setDateResiliation(?\DateTimeInterface $date_resiliation): self
    {
        $this->date_resiliation = $date_resiliation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->date_modification;
    }

    public function setDateModification(?\DateTimeInterface $date_modification): self
    {
        $this->date_modification = $date_modification;

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

    public function getPoste(): ?Poste
    {
        return $this->poste;
    }

    public function setPoste(?Poste $poste): self
    {
        $this->poste = $poste;

        return $this;
    }
}
