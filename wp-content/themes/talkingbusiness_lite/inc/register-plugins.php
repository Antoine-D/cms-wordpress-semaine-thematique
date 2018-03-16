<?php
/**
 * Register required plugins for TGM Plugin Activator
 *
 * @package TalkingBusiness_Lite
 */
add_action( 'tgmpa_register', 'talkingbusiness_lite_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function talkingbusiness_lite_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     => esc_html__( 'Contact Form 7', 'talkingbusiness_lite' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Cherry Sidebars', 'talkingbusiness_lite' ),
			'slug'     => 'cherry-sidebars',
			'required' => false,
		),
		array(
			'name'               => 'Cherry Data Importer', // The plugin name
			'slug'               => 'cherry-data-importer', // The plugin slug (typically the folder name)
			'source'             => TALKINGBUSINESS_LITE_THEME_DIR . '/inc/plugins/cherry-data-importer.zip', // The plugin source
			'required'           => true, // If false, the plugin is only 'recommended' instead of required
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'Content builder', // The plugin name
			'slug'               => 'tm-content-builder', // The plugin slug (typically the folder name)
			'source'             => TALKINGBUSINESS_LITE_THEME_DIR . '/inc/plugins/tm-content-builder.zip', // The plugin source
			'required'           => true, // If false, the plugin is only 'recommended' instead of required
			'version'            => '1.1.0', // E.g. 1.1.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'talkingbusiness_lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
