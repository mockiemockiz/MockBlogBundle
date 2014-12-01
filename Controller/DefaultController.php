<?php

namespace MockBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MockBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
