<?php

namespace VieEleveBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class quittanceRestauType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('eleve_restau',EntityType::class,array(
                'class'=>'VieEleveBundle:eleveRestau',
                'choice_label'=>'id',
                'multiple'=>false
            ))
            ->add('debutInscription')
            ->add('finInscription')
            ->add('prix')
            ->add('valider',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VieEleveBundle\Entity\quittanceRestau'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vieelevebundle_quittancerestau';
    }


}
