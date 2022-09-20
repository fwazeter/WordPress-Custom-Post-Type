<?php

namespace WazFactor\CPT\PostType;

use WazFactor\CPT\Internal\Translation\Translator;

abstract class AbstractCustomPostType implements CustomPostTypeInterface
{
	/**
	 * The custom post type.
	 *
	 * @var string
	 */
	public string $custom_post_type = 'wazframe';

	/**
	 * Description of the post type.
	 *
	 * @var string
	 */
	protected string $description;

	/**
	 * Post Type friendly slug / name singular.
	 *
	 * @var string
	 */
	protected string $singular_label = 'post';

	/**
	 * Post Type friendly slug / plural name.
	 *
	 * @var string
	 */
	protected string $plural_label = 'posts';

	/**
	 * Menu icon
	 *
	 * @var string
	 */
	protected string $menu_icon;

	/**
	 * The menu position of the CPT.
	 *
	 * @var int
	 */
	protected int $menu_position = 8;

	/**
	 * Whether the post template can be locked.
	 *
	 * If set to 'all', the user is unable to insert new blocks,
	 * move existing blocks and delete blocks.
	 *
	 * If set to 'insert', the user is able to move existing blocks
	 * but is unable to insert new blocks and delete blocks.
	 *
	 * @var bool|string
	 */
	protected bool $template_lock = true;

	/**
	 * Plugin translator.
	 *
	 * @var Translator
	 */
	protected Translator $translator;

	/**
	 * Path to Custom Post Type templates
	 *
	 * @var string
	 */
	protected string $template_path;

	/**
	 * Constructor
	 *
	 * @param Translator $translator
	 * @param string $template_path
	 */
	public function __construct( Translator $translator, string $template_path )
	{
		$this->template_path = $template_path;
		$this->translator = $translator;
	}

	/**
	 * Standard translation
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function translate ( string $string ): string
	{
		return $this->translator->translate( $string );
	}

	/**
	 * Translate with context.
	 *
	 * @param string $string
	 * @param string $context
	 *
	 * @return string
	 */
	public function contextTranslate ( string $string, string $context ): string
	{
		return $this->translator->translate( $string, $context );
	}

	public function getPostTypeName(): string
	{
		return $this->custom_post_type;
	}

	public function getLabels(): array {
		return array(
			'name'                  =>  $this->contextTranslate( ucfirst( $this->plural_label ), 'post type general name' ),
			'singular_name'         =>  $this->contextTranslate( ucfirst( $this->singular_label ), 'post type singular name' ),
			'add_new'               =>  $this->contextTranslate( 'Add New', 'Call to Action' ),
			'add_new_item'          =>  $this->translate( 'Add New ' . ucfirst( $this->singular_label ) ),
			'edit_item'             =>  $this->translate( 'Edit ' . ucfirst( $this->singular_label ) ),
			'new_item'              =>  $this->translate( 'New ' . ucfirst( $this->singular_label ) ),
			'view_item'             =>  $this->translate( 'View ' . ucfirst( $this->singular_label ) ),
			'search_items'          =>  $this->translate( 'Search ' . ucfirst( $this->plural_label ) ),
			'not_found'             =>  $this->translate( 'No ' . ucfirst( $this->plural_label ) . ' found' ),
			'not_found_in_trash'    =>  $this->translate( 'No ' . ucfirst( $this->plural_label ) . ' found in Trash' ),
			'menu_name'             =>  $this->translate( ucfirst( $this->plural_label ) ),
		);
	}

	public function getSupports(): array {
		return array(
			'title',
			'editor',
			'revisions'
		);
	}

	public function getRewrite(): array {
		return array(
			'slug'  => $this->translate( $this->singular_label )
		);
	}

	/**
	 * Renders the block template.
	 *
	 * At the moment this seems to have to be within the class file itself.
	 * Early attempts at import from external dedicated file did not go well.
	 *
	 * There's a way to separate this out, like I've done in the past with
	 * Block Patterns, but this is a task for a later time.
	 */
	public function renderTemplate(): array {
		return array(
			array( 'core/image', array(
				'align' => 'left',
			) ),
			array( 'core/heading', array(
				'placeholder' => 'Add Author...',
			) ),
			array( 'core/paragraph', array(
				'placeholder' => 'Add Description...',
			) ),
		);
	}


	public function getCustomPostArgs(): array
	{
		return array (
			'description'       =>  $this->translate( ucfirst( $this->description ) ),
			'public'            =>  true,
			'show_in_nav_menus' =>  true,
			'show_in_admin_bar' =>  true,
			'exclude_from_search'   =>  false,
			'show_ui'               =>  true,
			'show_in_menu'          =>  true,
			'can_export'            =>  true,
			'delete_with_user'      =>  false,
			'hierarchical'          =>  false,
			'has_archive'           =>  false,
			'menu_icon'             =>  $this->menu_icon,
			'menu_position'         =>  $this->menu_position,
			'labels'                =>  $this->getLabels(),
			'supports'              =>  $this->getSupports(),
			'show_in_rest'          =>  true,
			'rewrite'               =>  $this->getRewrite(),
			'template_lock'         =>  $this->template_lock,
			'template'              =>  $this->renderTemplate(),
		);
	}

}