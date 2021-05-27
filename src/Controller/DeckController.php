<?php

namespace App\Controller;

use App\Entity\Deck;
use App\Form\Type\DeckType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeckController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {
        $deck = new Deck();

        $form = $this->createForm(DeckType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $playerHand = $deck->createPlayerHand($formData['nbCards']);

            return $this->render('deck/index.html.twig', [
                'form' => $form->createView(),
                'valuesRule' => $deck->getValuesOrder(),
                'colorsRule' => $deck->getColorsOrder(),
                'cards' => $playerHand->getCards(),
                'sortedCards' => $playerHand->getSortedCards()
            ]);
        }

        return $this->render('deck/index.html.twig', [
            'form' => $form->createView(),
            'valuesRule' => [],
            'colorsRule' => [],
            'cards' => [],
            'sortedCards' => [],
        ]);
    }
}
