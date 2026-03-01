<?php

namespace App\Form;

use App\Entity\Nation;
use App\Entity\TeamManagers;
use App\Entity\Teams;
use App\Entity\TeamTermsAcceptance;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('status')
            ->add('totalAmount')
            ->add('currency')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updateAt', null, [
                'widget' => 'single_text',
            ])
            ->add('nation', EntityType::class, [
                'class' => Nation::class,
                'choice_label' => 'id',
            ])
            ->add('teamManagers', EntityType::class, [
                'class' => TeamManagers::class,
                'choice_label' => 'id',
            ])
            ->add('teamTermsAcceptance', EntityType::class, [
                'class' => TeamTermsAcceptance::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teams::class,
        ]);
    }
}
