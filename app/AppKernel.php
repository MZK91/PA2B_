<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            // Site Bundle
            new Ingetis\SiteBundle\IngetisSiteBundle(),
            
            // Bundle Ingetis
            new Ingetis\NewsBundle\IngetisNewsBundle(),
            new Ingetis\CarouselBundle\IngetisCarouselBundle(),
            new Ingetis\IndexBundle\IngetisIndexBundle(),
            new Ingetis\NavbarBundle\IngetisNavbarBundle(),
            new Ingetis\OffresBundle\IngetisOffresBundle(),
            new Ingetis\PagesBundle\IngetisPagesBundle(),
            new Ingetis\MenuBundle\IngetisMenuBundle(),
            new Ingetis\AnnonceIndexBundle\IngetisAnnonceIndexBundle(),
            new Ingetis\DivIndexBundle\IngetisDivIndexBundle(),
            new Ingetis\UserBundle\IngetisUserBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
