<?php

declare( strict_types=1 );

namespace WazFactor\CPT\Vendor\League\Container;

interface ContainerAwareInterface
{
	public function getContainer(): DefinitionContainerInterface;
	
	public function setContainer( DefinitionContainerInterface $container ): ContainerAwareInterface;
}
