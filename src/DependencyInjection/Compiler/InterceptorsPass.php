<?php

namespace Dealroadshow\Bundle\ProximityBundle\DependencyInjection\Compiler;

use Dealroadshow\Proximity\MethodsInterception\BodyInterceptorInterface;
use Dealroadshow\Proximity\MethodsInterception\ResultInterceptorInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class InterceptorsPass implements CompilerPassInterface
{
    public const BODY_INTERCEPTOR_TAG = 'dealroadshow_proximity.interceptor.body';
    public const RESULT_INTERCEPTOR_TAG = 'dealroadshow_proximity.interceptor.result';


    public function process(ContainerBuilder $container): void
    {
        $container
            ->registerForAutoconfiguration(BodyInterceptorInterface::class)
            ->addTag(self::BODY_INTERCEPTOR_TAG);

        $container
            ->registerForAutoconfiguration(ResultInterceptorInterface::class)
            ->addTag(self::RESULT_INTERCEPTOR_TAG);
    }
}
