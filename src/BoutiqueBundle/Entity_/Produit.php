<?php
/**
 * Created by PhpStorm.
 * User: Mila
 * Date: 15/11/2018
 * Time: 14:35
 */

namespace BoutiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="produit")
 *
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produit", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=20)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=20)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=20)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=5)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="public", type="string", length=5)
     */
    private $public;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=20)
     */
    private $couleur;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=250, nullable=true)
     */
    private $photo;

    #---------------------------------------------------------#
    /**
     * Get Id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set Id
     * @param int $arg
     * @return Produit
     */
    public function setId($arg)
    {
        $this->id = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Reference
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set Reference
     * @param string $arg
     * @return Produit
     */
    public function setReference($arg)
    {
        $this->reference = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Categorie
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set Categorie
     * @param string $arg
     * @return Produit
     */
    public function setCategorie($arg)
    {
        $this->categorie = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Titre
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set Titre
     * @param string $arg
     * @return Produit
     */
    public function setTitre($arg)
    {
        $this->titre = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Description
     * @param string $arg
     * @return Produit
     */
    public function setDescription($arg)
    {
        $this->description = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Taille
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set Taille
     * @param string $arg
     * @return Produit
     */
    public function setTaille($arg)
    {
        $this->taille = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Public
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set Public
     * @param string $arg
     * @return Produit
     */
    public function setPublic($arg)
    {
        $this->public = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Couleur
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set Couleur
     * @param string $arg
     * @return Produit
     */
    public function setCouleur($arg)
    {
        $this->couleur = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Prix
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set Prix
     * @param float $arg
     * @return Produit
     */
    public function setPrix($arg)
    {
        $this->prix = $arg;
        return $this;
    }

    #---------------------------------------------------------#
    /**
     * Get Stock
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set Stock
     * @param int $arg
     * @return Produit
     */
    public function setStock($arg)
    {
        $this->stock = $arg;
        return $this;
    }

    #---------------------------------------------------------#

    /**
     * Get Photo
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set Photo
     * @param string $arg
     * @return Produit
     */
    public function setPhoto($arg)
    {
        $this->photo = $arg;
        return $this;
    }

    #---------------------------------------------------------#



}