<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Amies;
use AppBundle\Form\AmiesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class AmiesController extends Controller {

    /**
     * @Route("/afficher", name="afficher")
     */
    public function afficherAction() {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Amies')->findAll();

        return $this->render('amies/afficher.html.twig', array('amies' => $entities,
        ));
    }

    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function ajouterAction(Request $request) {

        $amies = new Amies();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $amies)
                ->add('age', TextType::class)
                ->add('famille', TextType::class)
                ->add('race', TextType::class)
                ->add('nourriture', TextType::class)
                ->add('enregistrer', SubmitType::class)
        ;
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($amies);
                $em->flush();


                return $this->redirectToRoute('homepage', array('id' => $amies->getId()));
            }
        }

        return $this->render('amies/ajouter.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/modifier", name="modifier")
     */
    public function modifierAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Amies');

        $amies = $repo->find($id);

        $form = $this->createForm(AmiesType::class, $amies);


        $form->handleRequest($request);

        if ($form->isValid()) {

            $produit = $form->getData();
            $em->persist($amies);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('amies/ajouter.html.twig', ['form' => $form->createView()]);
    }

}
