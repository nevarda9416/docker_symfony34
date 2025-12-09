<?php

namespace DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $message = 'Chào mừng đến với Demo Bundle!';
        $features = [
            'Routing cơ bản',
            'Controller và Actions',
            'Twig templates',
            'Dependency Injection',
        ];

        return $this->render('demo/index.html.twig', [
            'message' => $message,
            'features' => $features,
        ]);
    }

    public function formAction(Request $request)
    {
        $data = [];
        $submitted = false;
        if ($request->isMethod('POST')) {
            $data = [
                'name' => $request->request->get('name'),
                'email' => $request->request->get('email'),
                'message' => $request->request->get('message'),
            ];
            $submitted = true;
        }
        return $this->render('demo/form.html.twig', [
            'data' => $data,
            'submitted' => $submitted,
        ]);
    }

    public function apiAction()
    {
        // TODO: Implement API endpoint
        return $this->json(['status' => 'success', 'message' => 'Demo API endpoint']);
    }
}


