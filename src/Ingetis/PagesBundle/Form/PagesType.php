<?php

namespace Ingetis\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PagesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titrePage')
            ->add('titreNav')
            ->add('textePage')
            ->add('urlPage')
            ->add('vuesPage')
            ->add('lastIp')
            ->add('datePage')
            ->add('indexCategorie')
            ->add('indexSousCategorie')
            ->add('idCategorie')
            ->add('idSousCategorie')
            ->add('pageFixe')
            ->add('urlPageFixe')
            ->add('link')
            ->add('idLink')
            ->add('lastVisit')
            ->add('position')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ingetis\PagesBundle\Entity\Pages'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ingetis_pagesbundle_pages';
    }
}
