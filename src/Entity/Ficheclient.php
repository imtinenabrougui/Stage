<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ficheclient
 *
 * @ORM\Table(name="ficheclient", indexes={@ORM\Index(name="fk_utili", columns={"idu"})})
 * @ORM\Entity
 */
class Ficheclient
{
    /**
     * @var int
     *
     * @ORM\Column(name="idfc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfc;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="date_ouvertureCompte", type="string", length=255, nullable=false)
     */
    private $dateOuverturecompte;

    /**
     * @var string
     *
     * @ORM\Column(name="agence", type="string", length=255, nullable=false)
     */
    private $agence;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_civilite", type="string", length=255, nullable=false)
     */
    private $titreCivilite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_pere", type="string", length=255, nullable=false)
     */
    private $nomPere;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_pere", type="string", length=255, nullable=false)
     */
    private $prenomPere;

    /**
     * @var string
     *
     * @ORM\Column(name="type_client", type="string", length=255, nullable=false)
     */
    private $typeClient;

    /**
     * @var string
     *
     * @ORM\Column(name="type_document", type="string", length=255, nullable=false)
     */
    private $typeDocument;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_document", type="integer", nullable=false)
     */
    private $numeroDocument;

    /**
     * @var string
     *
     * @ORM\Column(name="date_delivrance", type="string", length=255, nullable=false)
     */
    private $dateDelivrance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_delevrance", type="string", length=255, nullable=false)
     */
    private $lieuDelevrance;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255, nullable=false)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string", length=255, nullable=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="pays_naissance", type="string", length=255, nullable=false)
     */
    private $paysNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_naissance", type="string", length=255, nullable=false)
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="autre_nationalite", type="string", length=255, nullable=false)
     */
    private $autreNationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_civil", type="string", length=255, nullable=false)
     */
    private $etatCivil;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_enfant", type="integer", nullable=false)
     */
    private $nbrEnfant;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_telephone", type="integer", nullable=false)
     */
    private $numeroTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="code_postal", type="integer", nullable=false)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="gouvernerat", type="string", length=255, nullable=false)
     */
    private $gouvernerat;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=false)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="status_professionnel", type="string", length=255, nullable=false)
     */
    private $statusProfessionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="position_professionnel", type="string", length=255, nullable=false)
     */
    private $positionProfessionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction_exercee", type="string", length=255, nullable=false)
     */
    private $fonctionExercee;

    /**
     * @var string
     *
     * @ORM\Column(name="activite_professionnel", type="string", length=255, nullable=false)
     */
    private $activiteProfessionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=false)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_professionnelle", type="string", length=255, nullable=false)
     */
    private $adresseProfessionnelle;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction_publique", type="string", length=255, nullable=false)
     */
    private $fonctionPublique;

    /**
     * @var string
     *
     * @ORM\Column(name="nature_employeur", type="string", length=255, nullable=false)
     */
    private $natureEmployeur;

    /**
     * @var string
     *
     * @ORM\Column(name="type_compte", type="string", length=255, nullable=false)
     */
    private $typeCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="sources_fonds", type="string", length=255, nullable=false)
     */
    private $sourcesFonds;

    /**
     * @var string
     *
     * @ORM\Column(name="source_patirimoine", type="string", length=255, nullable=false)
     */
    private $sourcePatirimoine;

    /**
     * @var int
     *
     * @ORM\Column(name="revenus_annuels", type="integer", nullable=false)
     */
    private $revenusAnnuels;

    /**
     * @var int
     *
     * @ORM\Column(name="charge_annuelles", type="integer", nullable=false)
     */
    private $chargeAnnuelles;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idu", referencedColumnName="idu")
     * })
     */
    private $idu;

    public function getIdfc(): ?int
    {
        return $this->idfc;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateOuverturecompte(): ?string
    {
        return $this->dateOuverturecompte;
    }

    public function setDateOuverturecompte(string $dateOuverturecompte): static
    {
        $this->dateOuverturecompte = $dateOuverturecompte;

        return $this;
    }

    public function getAgence(): ?string
    {
        return $this->agence;
    }

    public function setAgence(string $agence): static
    {
        $this->agence = $agence;

        return $this;
    }

    public function getTitreCivilite(): ?string
    {
        return $this->titreCivilite;
    }

    public function setTitreCivilite(string $titreCivilite): static
    {
        $this->titreCivilite = $titreCivilite;

        return $this;
    }

    public function getNomPere(): ?string
    {
        return $this->nomPere;
    }

    public function setNomPere(string $nomPere): static
    {
        $this->nomPere = $nomPere;

        return $this;
    }

    public function getPrenomPere(): ?string
    {
        return $this->prenomPere;
    }

    public function setPrenomPere(string $prenomPere): static
    {
        $this->prenomPere = $prenomPere;

        return $this;
    }

    public function getTypeClient(): ?string
    {
        return $this->typeClient;
    }

    public function setTypeClient(string $typeClient): static
    {
        $this->typeClient = $typeClient;

        return $this;
    }

    public function getTypeDocument(): ?string
    {
        return $this->typeDocument;
    }

    public function setTypeDocument(string $typeDocument): static
    {
        $this->typeDocument = $typeDocument;

        return $this;
    }

    public function getNumeroDocument(): ?int
    {
        return $this->numeroDocument;
    }

    public function setNumeroDocument(int $numeroDocument): static
    {
        $this->numeroDocument = $numeroDocument;

        return $this;
    }

    public function getDateDelivrance(): ?string
    {
        return $this->dateDelivrance;
    }

    public function setDateDelivrance(string $dateDelivrance): static
    {
        $this->dateDelivrance = $dateDelivrance;

        return $this;
    }

    public function getLieuDelevrance(): ?string
    {
        return $this->lieuDelevrance;
    }

    public function setLieuDelevrance(string $lieuDelevrance): static
    {
        $this->lieuDelevrance = $lieuDelevrance;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getPaysNaissance(): ?string
    {
        return $this->paysNaissance;
    }

    public function setPaysNaissance(string $paysNaissance): static
    {
        $this->paysNaissance = $paysNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): static
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getAutreNationalite(): ?string
    {
        return $this->autreNationalite;
    }

    public function setAutreNationalite(string $autreNationalite): static
    {
        $this->autreNationalite = $autreNationalite;

        return $this;
    }

    public function getEtatCivil(): ?string
    {
        return $this->etatCivil;
    }

    public function setEtatCivil(string $etatCivil): static
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    public function getNbrEnfant(): ?int
    {
        return $this->nbrEnfant;
    }

    public function setNbrEnfant(int $nbrEnfant): static
    {
        $this->nbrEnfant = $nbrEnfant;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(int $numeroTelephone): static
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getGouvernerat(): ?string
    {
        return $this->gouvernerat;
    }

    public function setGouvernerat(string $gouvernerat): static
    {
        $this->gouvernerat = $gouvernerat;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getStatusProfessionnel(): ?string
    {
        return $this->statusProfessionnel;
    }

    public function setStatusProfessionnel(string $statusProfessionnel): static
    {
        $this->statusProfessionnel = $statusProfessionnel;

        return $this;
    }

    public function getPositionProfessionnel(): ?string
    {
        return $this->positionProfessionnel;
    }

    public function setPositionProfessionnel(string $positionProfessionnel): static
    {
        $this->positionProfessionnel = $positionProfessionnel;

        return $this;
    }

    public function getFonctionExercee(): ?string
    {
        return $this->fonctionExercee;
    }

    public function setFonctionExercee(string $fonctionExercee): static
    {
        $this->fonctionExercee = $fonctionExercee;

        return $this;
    }

    public function getActiviteProfessionnel(): ?string
    {
        return $this->activiteProfessionnel;
    }

    public function setActiviteProfessionnel(string $activiteProfessionnel): static
    {
        $this->activiteProfessionnel = $activiteProfessionnel;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getAdresseProfessionnelle(): ?string
    {
        return $this->adresseProfessionnelle;
    }

    public function setAdresseProfessionnelle(string $adresseProfessionnelle): static
    {
        $this->adresseProfessionnelle = $adresseProfessionnelle;

        return $this;
    }

    public function getFonctionPublique(): ?string
    {
        return $this->fonctionPublique;
    }

    public function setFonctionPublique(string $fonctionPublique): static
    {
        $this->fonctionPublique = $fonctionPublique;

        return $this;
    }

    public function getNatureEmployeur(): ?string
    {
        return $this->natureEmployeur;
    }

    public function setNatureEmployeur(string $natureEmployeur): static
    {
        $this->natureEmployeur = $natureEmployeur;

        return $this;
    }

    public function getTypeCompte(): ?string
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(string $typeCompte): static
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    public function getSourcesFonds(): ?string
    {
        return $this->sourcesFonds;
    }

    public function setSourcesFonds(string $sourcesFonds): static
    {
        $this->sourcesFonds = $sourcesFonds;

        return $this;
    }

    public function getSourcePatirimoine(): ?string
    {
        return $this->sourcePatirimoine;
    }

    public function setSourcePatirimoine(string $sourcePatirimoine): static
    {
        $this->sourcePatirimoine = $sourcePatirimoine;

        return $this;
    }

    public function getRevenusAnnuels(): ?int
    {
        return $this->revenusAnnuels;
    }

    public function setRevenusAnnuels(int $revenusAnnuels): static
    {
        $this->revenusAnnuels = $revenusAnnuels;

        return $this;
    }

    public function getChargeAnnuelles(): ?int
    {
        return $this->chargeAnnuelles;
    }

    public function setChargeAnnuelles(int $chargeAnnuelles): static
    {
        $this->chargeAnnuelles = $chargeAnnuelles;

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


}
