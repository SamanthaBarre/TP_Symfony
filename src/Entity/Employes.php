<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    #[Assert\Length(min:2, max:200, minMessage: "Le prénom doit contenir au minimum {{ limit }} lettres", maxMessage: "Le prénom ne peut contenir que {{ limit }}  lettres")] 
    private $prenom;

    #[ORM\Column(type: 'string', length: 200)]
    #[Assert\Length(min:2, max:200, minMessage: "Le nom doit contenir au minimum {{ limit }} lettres", maxMessage: "Le nom ne peut contenir que {{ limit }}  lettres")] 
    private $nom;

    #[ORM\Column(type: 'string', length: 200)]
    #[Assert\Regex(pattern:"/^[0-9]+$/")]
    private $telephone;

    #[ORM\Column(type: 'string', length: 200)]
    #[Assert\Email(message: "Le format de l'email n'est pas valide")]
    private $email;

    #[ORM\Column(type: 'string', length: 200)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 200)]
    private $poste;

    #[ORM\Column(type: 'integer')]
    #[Assert\PositiveOrZero(message:"Le salaire ne peut pas être négatif")]
    private $salaire;

    #[ORM\Column(type: 'date')]
    #[Assert\Type("datetime")]
    private $dt_naissance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDtNaissance(): ?\DateTimeInterface
    {
        return $this->dt_naissance;
    }

    public function setDtNaissance(\DateTimeInterface $dt_naissance): self
    {
        $this->dt_naissance = $dt_naissance;

        return $this;
    }
}
