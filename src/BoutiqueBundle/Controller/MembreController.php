<?php
namespace BoutiqueBundle\Controller;

use BoutiqueBundle\Entity\Membre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class MembreController extends Controller
{
	/**
	 * @Route("/inscription/", name="inscription")
	 */
	public function inscriptionAction(Request $request)
	{
		// Entity :
		$membre = new Membre(); // objet vide

		// Formulaire :
		$formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $membre);
		// le createBuilder a besoin de 2 informations :
		// -> quel genre de formulaire
		// -> à quelle entité est liée le formulaire
		// Méthode courte :
		//	$formBuilder = $this->createBuilder($membre);

		//On paramètre le formulaire (créer chaque champs) grâce à la méthode add de notre formBuilder.
		//	/!\ Attention à bien use toutes les classes Type dont nous avons besoin
		$formBuilder
			->add('pseudo', TextType::class)
			->add('mdp', PasswordType::class)
			->add('nom', TextType::class)
			->add('prenom', TextType::class)
			->add('email', EmailType::class)
			->add('civilite', ChoiceType::class, array(
				'choices' => array(
					'genre' => '',
					'Homme' => 'm',
					'Femme' => 'f',
				),
			))
			->add('ville', TextType::class)
			->add('codePostal', IntegerType::class)
			->add('adresse', TextType::class)
			->add('enregistrer', SubmitType::class);

		// Une fois le formulaire paramétré on le génère
		$form = $formBuilder->getForm();

		// Traitement des informations du formulaire :
		$form->handleRequest($request);

		// on lie l'objet $membre aux informations saisies dans le formulaire
		if ($form->isSubmitted() && $form->isValid()) {

			//if(!empty($_POST))
			//+ toute les vérifs sur les champs

			$em = $this->getDoctrine()->getManager();
			$em->persist($membre);
			$em->flush();

			$request->getSession()->getFlashBag()->add(
				'success', 'Félicitations ' . $membre->getPseudo() . ', vous êtes inscrit !');
			return $this->redirectToRoute('connexion');
		}

		// Enfin on génère la vue en lui passant les paramètres du formulaire
		$params = array(
			'membreForm' => $form->createView(),
			'title' => 'inscription'
		);

//		return $this->render('@Boutique/Membre/inscription.html.twig', $params);
		// on met cette ligne commentaire car on a laissé SF gérer le formulaire avec une structure Bootstrap générique
		// Méthode 1 :
		//    fichier app/config/config.yml
		//    <code>
		//    twig
		//        form-themes:
		//            - 'bootstrap_4_layout.html.twig'

		// -Méthode 2 :
		//	On prend la main sur la création du formulaire avec notre propre structure et mise en forme
		return $this->render('@Boutique/Membre/form.html.twig', $params);

	}
	#--------------------------------------#
	/**
	 * @Route("/connexion", name="connexion")
	 *
	 *
	 */

	public function connexionAction()
	{
		$params = array(

		);

		return $this->render(
			'@Boutique/Membre/connexion.html.twig', $params
		);
	}
	#--------------------------------------#

}
