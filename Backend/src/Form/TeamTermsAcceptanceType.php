<?php

namespace App\Form;

use App\Entity\Teams;
use App\Entity\TeamTermsAcceptance;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamTermsAcceptanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('accepted')
            ->add('acceptedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('termsVersion')
            ->add('ipAdress')
            ->add('userAgent')
            ->add('team', EntityType::class, [
                'class' => Teams::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TeamTermsAcceptance::class,
        ]);
    }
}
