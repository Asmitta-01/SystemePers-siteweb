<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $piece_jointe = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    #[ORM\Column]
    private ?bool $non_lu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_envoi = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_lu = null;

    #[ORM\Column]
    private ?bool $visible_emetteur = null;

    #[ORM\Column]
    private ?bool $visible_recepteur = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $emmetteur = null;

    #[ORM\ManyToOne(inversedBy: 'messages_recus')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $recepteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPieceJointe(): ?string
    {
        return $this->piece_jointe;
    }

    public function setPieceJointe(?string $piece_jointe): self
    {
        $this->piece_jointe = $piece_jointe;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function isNonLu(): ?bool
    {
        return $this->non_lu;
    }

    public function setNonLu(bool $non_lu): self
    {
        $this->non_lu = $non_lu;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDateEnvoi(\DateTimeInterface $date_envoi): self
    {
        $this->date_envoi = $date_envoi;

        return $this;
    }

    public function getDateLu(): ?\DateTimeInterface
    {
        return $this->date_lu;
    }

    public function setDateLu(?\DateTimeInterface $date_lu): self
    {
        $this->date_lu = $date_lu;

        return $this;
    }

    public function isVisibleEmetteur(): ?bool
    {
        return $this->visible_emetteur;
    }

    public function setVisibleEmetteur(bool $visible_emetteur): self
    {
        $this->visible_emetteur = $visible_emetteur;

        return $this;
    }

    public function isVisibleRecepteur(): ?bool
    {
        return $this->visible_recepteur;
    }

    public function setVisibleRecepteur(bool $visible_recepteur): self
    {
        $this->visible_recepteur = $visible_recepteur;

        return $this;
    }

    public function getEmmetteur(): ?Employe
    {
        return $this->emmetteur;
    }

    public function setEmmetteur(?Employe $emmetteur): self
    {
        $this->emmetteur = $emmetteur;

        return $this;
    }

    public function getRecepteur(): ?Employe
    {
        return $this->recepteur;
    }

    public function setRecepteur(?Employe $recepteur): self
    {
        $this->recepteur = $recepteur;

        return $this;
    }
}
