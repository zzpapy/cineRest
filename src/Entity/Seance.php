<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SeanceRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *  normalizationContext={"groups"={"seance:read"}},
 *  denormalizationContext={"groups"={"seance:write"}}
 * )
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("seance:read")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"seance:write","seance:read"})
     */
    private $date_heure;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="seances")
     * @Groups({"seance:read","seance:write"})
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity=Salle::class, inversedBy="seances")
     * @Groups({"seance:read","seance:write"})
     */
    private $salle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->date_heure;
    }

    public function setDateHeure(\DateTimeInterface $date_heure): self
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get the value of date_heure
     */ 
    public function getDate_heure()
    {
        return $this->date_heure;
    }

    /**
     * Set the value of date_heure
     *
     * @return  self
     */ 
    public function setDate_heure($date_heure)
    {
        $this->date_heure = $date_heure;

        return $this;
    }
}
