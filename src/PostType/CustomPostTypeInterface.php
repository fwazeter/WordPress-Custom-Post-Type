<?php

namespace WazFactor\CPT\PostType;

interface CustomPostTypeInterface {

	/**
	 * Retrieves the labels to be used for the CPT.
	 * Accepted keys of the label array:
	 *
	 * name – General name for the post type, usually plural. The same and overridden by $post_type_object->label. Default is ‘Posts’ / ‘Pages’.
	 * singular_name – Name for one object of this post type. Default is ‘Post’ / ‘Page’.
	 * add_new – Default is ‘Add New’ for both hierarchical and non-hierarchical types. When internationalizing this string, please use a gettext context matching your post type. Example: _x( 'Add New', 'product', 'textdomain' );.
	 * add_new_item – Label for adding a new singular item. Default is ‘Add New Post’ / ‘Add New Page’.
	 * edit_item – Label for editing a singular item. Default is ‘Edit Post’ / ‘Edit Page’.
	 * new_item – Label for the new item page title. Default is ‘New Post’ / ‘New Page’.
	 * view_item – Label for viewing a singular item. Default is ‘View Post’ / ‘View Page’.
	 * view_items – Label for viewing post type archives. Default is ‘View Posts’ / ‘View Pages’.
	 * search_items – Label for searching plural items. Default is ‘Search Posts’ / ‘Search Pages’.
	 * not_found – Label used when no items are found. Default is ‘No posts found’ / ‘No pages found’.
	 * not_found_in_trash – Label used when no items are in the Trash. Default is ‘No posts found in Trash’ / ‘No pages found in Trash’.
	 * parent_item_colon – Label used to prefix parents of hierarchical items. Not used on non-hierarchical post types. Default is ‘Parent Page:’.
	 * all_items – Label to signify all items in a submenu link. Default is ‘All Posts’ / ‘All Pages’.
	 * archives – Label for archives in nav menus. Default is ‘Post Archives’ / ‘Page Archives’.
	 * attributes – Label for the attributes meta box. Default is ‘Post Attributes’ / ‘Page Attributes’.
	 * insert_into_item – Label for the media frame button. Default is ‘Insert into post’ / ‘Insert into page’.
	 * uploaded_to_this_item – Label for the media frame filter. Default is ‘Uploaded to this post’ / ‘Uploaded to this page’.
	 * featured_image – Label for the featured image meta box title. Default is ‘Featured image’.
	 * set_featured_image – Label for setting the featured image. Default is ‘Set featured image’.
	 * remove_featured_image – Label for removing the featured image. Default is ‘Remove featured image’.
	 * use_featured_image – Label in the media frame for using a featured image. Default is ‘Use as featured image’.
	 * menu_name – Label for the menu name. Default is the same as name.
	 * filter_items_list – Label for the table views hidden heading. Default is ‘Filter posts list’ / ‘Filter pages list’.
	 * filter_by_date – Label for the date filter in list tables. Default is ‘Filter by date’.
	 * items_list_navigation – Label for the table pagination hidden heading. Default is ‘Posts list navigation’ / ‘Pages list navigation’.
	 * items_list – Label for the table hidden heading. Default is ‘Posts list’ / ‘Pages list’.
	 * item_published – Label used when an item is published. Default is ‘Post published.’ / ‘Page published.’
	 * item_published_privately – Label used when an item is published with private visibility. Default is ‘Post published privately.’ / ‘Page published privately.’
	 * item_reverted_to_draft – Label used when an item is switched to a draft. Default is ‘Post reverted to draft.’ / ‘Page reverted to draft.’
	 * item_scheduled – Label used when an item is scheduled for publishing. Default is ‘Post scheduled.’ / ‘Page scheduled.’
	 * item_updated – Label used when an item is updated. Default is ‘Post updated.’ / ‘Page updated.’
	 * item_link – Title for a navigation link block variation. Default is ‘Post Link’ / ‘Page Link’.
	 * item_link_description – Description for a navigation link block variation. Default is ‘A link to a post.’ / ‘A link to a page.’
	 *
	 * @return array
	 */
	public function getLabels(): array;

	/**
	 * Core feature(s) the post type supports. Serves as an alias for calling
	 * add_post_type_support() directly.
	 *
	 * Core features include 'title', 'editor', 'comments', 'revisions',
	 * 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail',
	 * 'custom-fields', and 'post-formats'.
	 *
	 * Additionally, the 'revisions' feature dictates whether the post type will
	 * store revisions, and the 'comments' feature dictates whether the comments
	 * count will show on the edit screen.
	 *
	 * A feature can also be specified as an array of arguments to provide
	 * additional information about supporting that feature.
	 *
	 * Example: array( 'my_feature', array( 'field' => 'value' ) ).
	 * Default is an array containing 'title' and 'editor'.
	 *
	 * @return array
	 */
	public function getSupports(): array;

	/**
	 * Triggers the handling of rewrites for this post type. To prevent rewrite,
	 * set to false.
	 *
	 * Defaults to true, using $post_type as slug.
	 *
	 * To specify rewrite rules, an array can be passed with any of these keys:
	 * slug (string)
	 * Customize the permastruct slug.
	 * Defaults to $post_type key.
	 *
	 * with_front (bool)
	 * Whether the permastruct should be prepended with WP_Rewrite::$front.
	 * Default true.
	 *
	 * feeds (bool)
	 * Whether the feed permastruct should be built for this post type.
	 * Default is value of $has_archive.
	 *
	 * pages (bool)
	 * Whether the permastruct should provide for pagination.
	 * Default true.
	 *
	 * ep_mask (int)
	 * Endpoint mask to assign.
	 * If not specified and permalink_epmask is set, inherits from $permalink_epmask.
	 * If not specified and permalink_epmask is not set, defaults to EP_PERMALINK.
	 *
	 * @return array
	 */
	public function getRewrite(): array;

	/**
	 * Renders the template for the WordPress CPT for use in the Gutenberg / Block Editor.
	 * Block templates are passed as a series of arrays.
	 *
	 * field: template
	 *
	 * Array of blocks to use as the default initial state for an editor session. Each item should
	 * be an array containing block name and optional attributes.
	 *
	 */
	public function renderTemplate();
}