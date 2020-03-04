<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Service\SjabloonService;
use App\Service\BRPService;
use App\Service\RequestTypeService;
use App\Service\ContactService;
use App\Service\AssentService;

use App\Service\CommonGroundService;
use App\Service\RequestService;
use App\Service\ApplicationService;

/**
 */
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
		
		if(!$brpUrl){
			$brpUrl = str_replace(['ds.','digispoof.'],'brp.',$url);
		}
		
		if($brpUrl == 'localhost'){
			$brpUrl = "https://brp.dev.huwelijksplanner.online";
		}
		$people = $commonGroundService->getResourceList($brpUrl.'/ingeschrevenpersonen');
		
		
		return ['people'=>$people, 'responceUrl' => $responceUrl, 'token' => $token];
	}
}
