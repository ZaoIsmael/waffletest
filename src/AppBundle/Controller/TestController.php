<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    /**
     * @Route("/{message}")
     * @param String $message
     * @return Response
     */
    public function indexAction(String $message): Response
    {
        $funFact = 'Octopuses cant change the color of their body in just *three-tenths* of a second!';

        $cache = $this->get('doctrine_cache.providers.my_markdown_cache');
        $key = md5($funFact);

        if ($cache->contains($key)) {
            $funFact = $cache->fetch($key);
        } else {
            sleep(1); // fake how slow this could be
            $funFact = $this->get('markdown.parser')->transform($funFact);
            $cache->save($key, $funFact);
        }

        return $this->render('test/index.html.twig', compact('message', 'funFact'));
    }
}
