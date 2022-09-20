<?php

declare( strict_types=1 );

namespace WazFactor\CPT\Vendor\League\Container\ServiceProvider;

use IteratorAggregate;
use WazFactor\CPT\Vendor\League\Container\ContainerAwareInterface;

interface ServiceProviderAggregateInterface extends ContainerAwareInterface, IteratorAggregate
{
	public function add( ServiceProviderInterface $provider ): ServiceProviderAggregateInterface;
	
	public function provides( string $id ): bool;
	
	public function register( string $service ): void;
}
