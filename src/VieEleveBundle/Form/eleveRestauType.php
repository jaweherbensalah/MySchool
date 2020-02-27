<?php

namespace VieEleveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class eleveRestauType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email')
            ->add('username')
            ->add('password')
            ->add('duree_abonnement',ChoiceType::class, array(
                'choices' => array(
                    'Trimestre' => 'trimestre',
                    'Semestre' => 'semestre',
                    'Année' => 'annee',
                    'Autre' => '',
                )));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VieEleveBundle\Entity\eleveRestau'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vieelevebundle_eleverestau';
    }


}
