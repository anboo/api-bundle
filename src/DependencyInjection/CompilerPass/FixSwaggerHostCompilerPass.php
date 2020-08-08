<?php

namespace Anboo\ApiBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FixSwaggerHostCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $param = $container->getDefinition('nelmio_api_doc.describers.config')->getArgument(0);;
        $param['host'] = $_SERVER['HTTP_HOST'];
        $container->getDefinition('nelmio_api_doc.describers.config')->replaceArgument(0, $param);
    }
}