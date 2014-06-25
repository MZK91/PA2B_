<?php

namespace Ingetis\NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActualitesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('titreActualite')
            ->add('texteActualite')
            ->add('photoActualite')
            ->add('event','checkbox', array(
                'required' => false
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ingetis\NewsBundle\Entity\Actualites'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ingetis_newsbundle_actualites';
    }
}
