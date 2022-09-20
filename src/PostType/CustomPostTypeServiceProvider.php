<?php

namespace WazFactor\CPT\PostType;


use WazFactor\CPT\Internal\Translation\Translator;
use WazFactor\CPT\Vendor\League\Container\ServiceProvider\AbstractServiceProvider;

class CustomPostTypeServiceProvider extends AbstractServiceProvider
{
	public function provides( string $id ): bool
	{
		$services = array(
			ListingPostType::class,
			Translator::class,
		);

		return in_array( $id, $services );
	}

	public function register(): void
	{
		$container = $this->getContainer();

		$container->addShared( ListingPostType::class )
		          ->addArgument( Translator::class )
		          ->addArgument( 'template_path' );
	}
}