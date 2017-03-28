<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class GenusController extends Controller
{
    /**
     * @Route("api/genus/{id}/notes", name="api_genus_index_notes")
     * @Method("GET")
     * @param String $id
     * @return JsonResponse
     */
    public function indexAction(String $id): JsonResponse
    {
        $notes = [
            ['id' => 1, 'username' => 'AquaPelham1', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];

        $note = array_filter($notes, function ($note) use ($id) {
            return $note['id'] == $id;
        });

        $data = [
            'notes' => $note
        ];

        return new JsonResponse($data);
    }
}
