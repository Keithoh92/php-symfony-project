<?php

namespace App\Form;

use App\Entity\Auction;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuctionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('item')
            ->add('startDateTime')
            ->add('quantity')
            ->add('category', EntityType::class, [
                'class' => 'App:Category',
                'choice_label' => 'title',
            ])

//            ->add('Bids', EntityType::class, [
//                'class' => 'App:Bids',
//                'choice_label' => 'title'
//            ])
            ->add('currentBid')
            ->add('deadline')
            ->add('completed');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Auction::class,
        ]);
    }
}
