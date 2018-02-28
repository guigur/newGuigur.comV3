<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArchivesController extends Controller
{
    public function indexAction($nameOfProject = null)
    {

        $archives = [];
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('archives');
        return $this->render('GuigurFrontBundle:Default:archives.html.twig', array("Catchphrase" =>  $catchPhrase, "Archives" => $archives));

    }
}
