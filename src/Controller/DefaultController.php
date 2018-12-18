<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/movie/{id}", name="default")
     */
    public function index($id)
    {
            $url = "https://api.themoviedb.org/3/movie/$id?api_key=c5cddb45ee31d73bd900992a40180443&language=fr";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result=curl_exec($ch);
            curl_close($ch);

            $url = "https://api.themoviedb.org/3/movie/$id/videos?api_key=c5cddb45ee31d73bd900992a40180443&language=en-US";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $video=curl_exec($ch);
            curl_close($ch);

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'result' => json_decode($result, true),
            'videos' => json_decode($video, true),
        ]);
    }
}
