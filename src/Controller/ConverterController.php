<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/converter")
 */
class ConverterController extends AbstractController
{
    /**
     * @Route("/", name="converter", methods="GET|POST")
     */
    public function convert(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('text', TextType::class) 
            ->add('convert', ChoiceType::class, [
                'choices' => [
                    'Velka pismena' => 'velka',
                    'Mala pismena' => 'mala'
                ]
            ])
            ->add('prevest', SubmitType::class)
            ->getForm();    
        
        $form->handleRequest($request);
            
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $text = $formData['text'];
            $convert = $formData['convert'];
            if ($convert === 'velka'){
                $vysledek = strtoupper($text);
            } else {
                $vysledek = strtolower($text);
            }
        }

        return $this->render('converter/convert.html.twig', [
            'form' => $form->createView(),
            'result' => $vysledek ?? null
        ]);
    }
}
