<?php

namespace Ingetis\OffresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OffresEmploisType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreOffre')
            ->add('descriptionOffre')
            //->add('vues')
            //->add('date')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ingetis\OffresBundle\Entity\OffresEmplois'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ingetis_offresbundle_offresemplois';
    }
}
