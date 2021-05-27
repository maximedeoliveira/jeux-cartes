<?php

namespace App\Form\Type;

use App\Entity\Deck;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DeckType
 * @package App\Form\Type
 */
class DeckType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('nbCards', IntegerType::class, [
            'attr' => [
                'min' => 1,
                'max' => 52
            ]
        ]);
    }
}
