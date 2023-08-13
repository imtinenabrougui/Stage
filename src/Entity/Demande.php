<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="fk_client", columns={"idfc"}), @ORM\Index(name="fk_tulisa", columns={"idu"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", nullable=false)
     */
    private $cin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_delivrance", type="string", length=255, nullable=true)
     */
    private $dateDelivrance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_naissance", type="string", length=255, nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etat_civil", type="string", length=255, nullable=true)
     */
    private $etatCivil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identite_employeur", type="string", length=255, nullable=true)
     */
    private $identiteEmployeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse_employeur", type="string", length=255, nullable=true)
     */
    private $adresseEmployeur;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_compte", type="integer", nullable=false)
     */
    private $numeroCompte;

    /**
     * @var int|null
     *
     * @ORM\Column(name="salaire", type="integer", nullable=true)
     */
    private $salaire;

    /**
     * @var int|null
     *
     * @ORM\Column(name="montant_credit", type="integer", nullable=true)
     */
    private $montantCredit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objet_credit", type="string", length=255, nullable=true)
     */
    private $objetCredit;

    /**
     * @var string
     *
     * @ORM\Column(name="besoins_courants", type="string", length=255, nullable=false)
     */
    private $besoinsCourants;

    /**
     * @var string
     *
     * @ORM\Column(name="acquisition_vehicule", type="string", length=255, nullable=false)
     */
    private $acquisitionVehicule;

    /**
     * @var string
     *
     * @ORM\Column(name="amenagement", type="string", length=255, nullable=false)
     */
    private $amenagement;

    /**
     * @var string
     *
     * @ORM\Column(name="attestation_salaire", type="string", length=255, nullable=false)
     */
    private $attestationSalaire;

    /**
     * @var string
     *
     * @ORM\Column(name="copie_cin", type="string", length=255, nullable=false)
     */
    private $copieCin;

    /**
     * @var string
     *
     * @ORM\Column(name="fiche_paie", type="string", length=255, nullable=false)
     */
    private $fichePaie;

    /**
     * @var string
     *
     * @ORM\Column(name="devis", type="string", length=255, nullable=false)
     */
    private $devis;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idu", referencedColumnName="idu")
     * })
     */
    private $idu;

    /**
     * @var \Ficheclient
     *
     * @ORM\ManyToOne(targetEntity="Ficheclient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idfc", referencedColumnName="idfc")
     * })
     */
    private $idfc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getDateDelivrance(): ?string
    {
        return $this->dateDelivrance;
    }

    public function setDateDelivrance(?string $dateDelivrance): static
    {
        $this->dateDelivrance = $dateDelivrance;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?string $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getEtatCivil(): ?string
    {
        return $this->etatCivil;
    }

    public function setEtatCivil(?string $etatCivil): static
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getIdentiteEmployeur(): ?string
    {
        return $this->identiteEmployeur;
    }

    public function setIdentiteEmployeur(?string $identiteEmployeur): static
    {
        $this->identiteEmployeur = $identiteEmployeur;

        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresseEmployeur;
    }

    public function setAdresseEmployeur(?string $adresseEmployeur): static
    {
        $this->adresseEmployeur = $adresseEmployeur;

        return $this;
    }

    public function getNumeroCompte(): ?int
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(int $numeroCompte): static
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(?int $salaire): static
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getMontantCredit(): ?int
    {
        return $this->montantCredit;
    }

    public function setMontantCredit(?int $montantCredit): static
    {
        $this->montantCredit = $montantCredit;

        return $this;
    }

    public function getObjetCredit(): ?string
    {
        return $this->objetCredit;
    }

    public function setObjetCredit(?string $objetCredit): static
    {
        $this->objetCredit = $objetCredit;

        return $this;
    }

    public function getBesoinsCourants(): ?string
    {
        return $this->besoinsCourants;
    }

    public function setBesoinsCourants(string $besoinsCourants): static
    {
        $this->besoinsCourants = $besoinsCourants;

        return $this;
    }

    public function getAcquisitionVehicule(): ?string
    {
        return $this->acquisitionVehicule;
    }

    public function setAcquisitionVehicule(string $acquisitionVehicule): static
    {
        $this->acquisitionVehicule = $acquisitionVehicule;

        return $this;
    }

    public function getAmenagement(): ?string
    {
        return $this->amenagement;
    }

    public function setAmenagement(string $amenagement): static
    {
        $this->amenagement = $amenagement;

        return $this;
    }

    public function getAttestationSalaire(): ?string
    {
        return $this->attestationSalaire;
    }

    public function setAttestationSalaire(string $attestationSalaire): static
    {
        $this->attestationSalaire = $attestationSalaire;

        return $this;
    }

    public function getCopieCin(): ?string
    {
        return $this->copieCin;
    }

    public function setCopieCin(string $copieCin): static
    {
        $this->copieCin = $copieCin;

        return $this;
    }

    public function getFichePaie(): ?string
    {
        return $this->fichePaie;
    }

    public function setFichePaie(string $fichePaie): static
    {
        $this->fichePaie = $fichePaie;

        return $this;
    }

    public function getDevis(): ?string
    {
        return $this->devis;
    }

    public function setDevis(string $devis): static
    {
        $this->devis = $devis;

        return $this;
    }

    public function getIdu(): ?Utilisateur
    {
        return $this->idu;
    }

    public function setIdu(?Utilisateur $idu): static
    {
        $this->idu = $idu;

        return $this;
    }

    public function getIdfc(): ?Ficheclient
    {
        return $this->idfc;
    }

    public function setIdfc(?Ficheclient $idfc): static
    {
        $this->idfc = $idfc;

        return $this;
    }


}
