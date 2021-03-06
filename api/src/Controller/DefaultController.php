<?php

// src/Controller/LuckyController.php

namespace App\Controller;

use App\Service\CommonGroundService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     * @Template
     */
    public function viewAction(Request $request, CommonGroundService $commonGroundService)
    {
        $token = $request->query->get('token');
        $responceUrl = $request->query->get('responceUrl');
        $brpUrl = $request->query->get('brpUrl');
        $url = $request->getHost();

        if (!$brpUrl) {
            $brpUrl = str_replace(['ds.', 'digispoof.'], 'brp.', $url);
        }

        if ($brpUrl == 'localhost') {
            $brpUrl = 'https://brp.dev.huwelijksplanner.online';
        }

        $brpUrl = 'https://brp.huwelijksplanner.online';

        $people = $commonGroundService->getResourceList($brpUrl.'/ingeschrevenpersonen')['hydra:member'];

        return ['people'=>$people, 'responceUrl' => $responceUrl, 'token' => $token];
    }
}
