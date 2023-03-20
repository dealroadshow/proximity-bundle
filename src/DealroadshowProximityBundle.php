<?php

namespace Dealroadshow\Bundle\ProximityBundle;

use Dealroadshow\Bundle\ProximityBundle\DependencyInjection\Compiler\InterceptorsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class DealroadshowProximityBundle extends AbstractBundle
{
    public function boot(): void
    {
        $proxiesDir = $this->container->getParameter('dealroadshow_proximity.proxy_classes_dir');
        if (!file_exists($proxiesDir)) {
            mkdir($proxiesDir, 0777, true);
        }
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new InterceptorsPass());
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/dealroadshow_proximity.yaml');
    }
}
