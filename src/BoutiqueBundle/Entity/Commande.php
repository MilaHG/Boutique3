<?php

namespace BoutiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_membre", type="integer", nullable=true)
     */
    private $idMembre;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enregistrement", type="datetime", nullable=false)
     */
    private $dateEnregistrement;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=100, nullable=false)
     */
    private $etat;

    /**
     * @return int
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param int $idCommande
     * @return Commande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdMembre()
    {
        return $this->idMembre;
    }

    /**
     * @param int $idMembre
     * @return Commande
     */
    public function setIdMembre($idMembre)
    {
        $this->idMembre = $idMembre;
        return $this;
    }

    /**
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param int $montant
     * @return Commande
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateEnregistrement()
    {
        return $this->dateEnregistrement;
    }

    /**
     * @param \DateTime $dateEnregistrement
     * @return Commande
     */
    public function setDateEnregistrement($dateEnregistrement)
    {
        $this->dateEnregistrement = $dateEnregistrement;
        return $this;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     * @return Commande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
        return $this;
    }



}

