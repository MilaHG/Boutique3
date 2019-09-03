<?php
/**
 * Created by PhpStorm.
 * User: Mila
 * Date: 20/11/2018
 * Time: 16:51
 */

namespace BoutiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Component\Routing\Annotation\Route;

use BoutiqueBundle\Entity\Produit;
use BoutiqueBundle\Entity\Membre;
use BoutiqueBundle\Entity\Commande;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{

    // affiche tous les produits dans un tableau
    /**
     * @Route("/admin/produit/show", name="show_produit")
     */
    public function showProduitAction()
    {
        // récupérer les produits (BDD)
        // SELECT * FROM produits

        // on récupère le service Doctrine
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        // $repository est de fait le repository correspondant à la classe Produit (donc à la table produit).
        // Et me permet de faire des requêtes sur la table produit

        // SELECT * FROM produits :
        $produits = $repository->findAll();

        $params = [
            'produits'  => $produits,
            'title' => 'Gestion Boutique'
        ];

        return $this->render('@Boutique/Admin/show_produit.html.twig', $params);
    }
#--------------------------------------------#
    // supprime un produit via son ID et retourne à show_produit
    /**
     * @Route("/admin/produit/delete/{id}", name="delete_produit")
     */
    public function deleteProduitAction($id, Request $request)
    {
        // on récupère l'entity manager
        $em = $this->getDoctrine()->getManager();

        // on récupère le produit à modifier par son $id sous forme d'un objet (Doctrine manipule des objets)
        $produit = $em->find(Produit::class, $id);

        $session = $request->getSession();
        // si le produit existe, on le supprime
        if ($produit) {

            $em->remove($produit);
            $em->flush();

            $session->getFlashBag()->add('success', 'Le produit a bien été supprimé');
        } else {
            $session->getFlashBag()->add('error', 'Le produit n\'existe pas !');
        }


        return $this->redirectToRoute('show_produit');
    }
#--------------------------------------------#
    // affiche toutes les commandes dans un tableau
    /**Nom
     * @Route("/admin/commande/show", name="show_commande")
     */
    public function showCommandeAction()
    {
        // récupérer les commandes (BDD)
        // SELECT * FROM commande

        // on récupère le service Doctrine
        $repository = $this->getDoctrine()->getRepository(Commande::class);
        // $repository est de fait le repository correspondant à la classe Commande (donc à la table commande).
        // Et me permet de faire des requêtes sur la table commande

        // SELECT * FROM commande :
        $commandes = $repository->findAll();

        $params = [
            'commandes'  => $commandes,
            'title' => 'Gestion Commandes'
        ];

        return $this->render('@Boutique/Admin/show_commande.html.twig', $params);
    }

#--------------------------------------------#
    // supprime une commande via son ID et retourne à show_commande
    /**
     * @Route("/admin/commande/delete/{id}", name="delete_commande")
     */
    public function deleteCommande($id, Request $request)
    {
        // on récupère l'entity manager
        $em = $this->getDoctrine()->getManager();

        // on récupère la commande à modifier par son $id sous forme d'un objet (Doctrine manipule des objets)
        $commande = $em->find(Commande::class, $id);

        $session = $request->getSession();
        // si la commande existe, on la supprime
        if ($commande) {

            $em->remove($commande);
            $em->flush();

            $session->getFlashBag()->add('success', 'La commande a bien été supprimée');
        } else {
            $session->getFlashBag()->add('error', 'La commande n\'existe pas !');
        }


        return $this->redirectToRoute('show_commande');
    }

#--------------------------------------------#
    // affiche tous les membres dans un tableau
    /**
     * @Route("/admin/membre/show", name="show_membre")
     */
    public function showMembreAction()
    {
        // récupérer les membres (BDD)
        // SELECT * FROM membre

        // on récupère le service Doctrine
        $repository = $this->getDoctrine()->getRepository(Membre::class);
        // $repository est de fait le repository correspondant à la classe Membre (donc à la table membre).
        // Et me permet de faire des requêtes sur la table produit

        // SELECT * FROM produits :
        $membres = $repository->findAll();

        $params = [
            'membres'  => $membres,
            'title' => 'Gestion Membres'
        ];

        return $this->render('@Boutique/Admin/show_membre.html.twig', $params);
    }

#--------------------------------------------#
    // supprime un membre via son ID et retourne à show_membres
    /**
     * @Route("/admin/membre/delete/{id}", name="delete_membre")
     */
    public function deleteMembreAction($id, Request $request)
    {
        // on récupère l'entity manager
        $em = $this->getDoctrine()->getManager();

        // on récupère le membre à modifier par son $id sous forme d'un objet (Doctrine manipule des objets)
        $membre = $em->find(Membre::class, $id);

        $session = $request->getSession();
        // si le membre existe, on le supprime
        if ($membre) {

            $em->remove($membre);
            $em->flush();

            $session->getFlashBag()->add('success', 'Le membre a bien été supprimé');
        } else {
            $session->getFlashBag()->add('error', 'Le membre n\'existe pas !');
        }

        return $this->redirectToRoute('show_membre');
    }

#--------------------------------------------#

}


