<?php

namespace Anboo\ApiBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FixSwaggerHostCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $param = $container->getDefinition('nelmio_api_doc.describers.config')->getArgument(0);;
        $param['host'] = '127.0.0.1';
        $container->getDefinition('nelmio_api_doc.describers.config')->replaceArgument(0, $param);
    }
}