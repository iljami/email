<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BaseController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('mailer/index.html.twig');
    }

    /**
     * @Route("/base/signup", name="signUp")
     */
    public function registerAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('mailer/signUp.html.twig');
    }

    /**
     * @Route("/base/signin", name="signIn")
     */
    public function loginAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('mailer/signIn.html.twig');
    }

    /**
     * @Route("/base/search", name="search")
     */
    public function searchAction(Request $request)
    {
        /*

        $search = new Search();
        $form = $this->createFormBuilder($search)
            ->add('search', TextType::class)
            ->add('submit', SubmitType::class, array('label' => 'Search'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $search = $form->getData();

            return $this->redirectToRoute('mailer/results');
        }

        */

        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        $foundUsers = $repository->findBy(
            array('username' => 'test')
        );

        return $this->render('mailer/search.html.twig');

    }

    /**
     * @Route("/base/results", name="results")
     */

    public function resultsAction(Request $request)
    {

        $users = $this->getDoctrine()->getRepository('AppBundle:User')
            ->findAll();

        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        $foundUsers = $repository->findBy(
            array('username' => 'test')
        );

        return $this->render('mailer/results.html.twig', array(
            'users' => $users, 'foundUsers' => $foundUsers
        ));
    }
}
