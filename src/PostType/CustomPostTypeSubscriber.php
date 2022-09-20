<?php

namespace WazFactor\CPT\PostType;

use WazFactor\CPT\Internal\EventManagement\SubscriberInterface;

class CustomPostTypeSubscriber implements SubscriberInterface
{
	/**
	 * The custom post type
	 *
	 * @var ListingPostType
	 */
	protected ListingPostType $post_type;


	/**
	 * Constructor
	 *
	 * @param ListingPostType   $post_type
	 */
	public function __construct( ListingPostType $post_type )
	{
		$this->post_type = $post_type;
	}

	/**
	 * {@inheritdoc }
	 * @return array
	 */
	public static function getSubscribedEvents(): array
	{
		return array(
			'init'  => 'registerPostType',
		);
	}

	public function registerPostType()
	{
		register_post_type(
			$this->post_type->getPostTypeName(),
			$this->post_type->getCustomPostArgs()
		);
	}
}