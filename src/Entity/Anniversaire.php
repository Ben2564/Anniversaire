<?php

namespace App\Entity;

use App\Repository\AnniversaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnniversaireRepository::class)
 */
class Anniversaire
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
     * @ORM\Column(type="date")
     */
    private $dateAnniv;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUser;

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

    public function getDateAnniv(): ?\DateTimeInterface
    {
        return $this->dateAnniv;
    }

    public function setDateAnniv(\DateTimeInterface $dateAnniv): self
    {
        $this->dateAnniv = $dateAnniv;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
