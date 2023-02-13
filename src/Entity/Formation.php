<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'text')]
    private $titre;

    #[ORM\Column(type: 'datetime')]
    private $datetime;

    #[ORM\Column(type: 'time')]
    private $duree;

    #[ORM\Column(type: 'string', length: 255)]
    private $credit;

   


    #[ORM\Column(type: 'string')]
    private $brochureFilename;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\ManyToOne(targetEntity: Inscrire::class, inversedBy: 'formations')]
    private $nombreplace;

   


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCredit(): ?string
    {
        return $this->credit;
    }

    public function setCredit(string $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function __toString():string {

        return  $this-> credit;
    }

   

    public function getBrochureFilename()
    {
        return $this->brochureFilename;
    }

    public function setBrochureFilename($brochureFilename)
    {
        $this->brochureFilename = $brochureFilename;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getNombreplace(): ?Inscrire
    {
        return $this->nombreplace;
    }

    public function setNombreplace(?Inscrire $nombreplace): self
    {
        $this->nombreplace = $nombreplace;

        return $this;
    }

    
}


