<?php

declare( strict_types=1 );

namespace WazFactor\CPT\Vendor\League\Container\Argument;

use WazFactor\CPT\Vendor\League\Container\ContainerAwareInterface;
use ReflectionFunctionAbstract;

interface ArgumentResolverInterface extends ContainerAwareInterface
{
	public function resolveArguments( array $arguments ): array;
	
	public function reflectArguments( ReflectionFunctionAbstract $method, array $args = [] ): array;
}
