<?php

namespace WazFactor\CPT\PostType;

class ListingPostType extends AbstractCustomPostType {

	/**
	 * The custom post type.
	 *
	 * @var string
	 */
	public string $custom_post_type = 'wazframe_listings';

	/**
	 * Description of the post type.
	 *
	 * @var string
	 */
	protected string $description = 'Property Listings';

	/**
	 * Post Type friendly slug / name singular.
	 *
	 * @var string
	 */
	protected string $singular_label = 'listing';

	/**
	 * Post Type friendly slug / plural name.
	 *
	 * @var string
	 */
	protected string $plural_label = 'listings';

	/**
	 * Menu icon
	 *
	 * @var string
	 */
	protected string $menu_icon = 'dashicons-admin-multisite';

	public function renderTemplate(): array {
		return array(
			array(
				'core/group',
				array(
					'align' => 'full',
					'style' => array(
						'color' => array(
							'background'    => '#000000',
						),
					),
				),
			),
		);
	}
}