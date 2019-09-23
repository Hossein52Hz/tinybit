<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'understrap_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width', 'understrap' ),
				'priority'    => 160,
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function understrap_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'understrap_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type',
				array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => '10',
				)
			)
		);

		// 



    //  =============================
    //  = Profile section              =
    //  =============================
    $wp_customize->add_section('understrap_profile', array(
        'title'    => __('Author Profile', 'understrap'),
        'priority' => 40,
    ));
    
    //full name
    $wp_customize->add_setting('understrap_author_options_full_name', array(
        'default'        => __('Enter Full Name', 'understrap'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
        
    ));
    $wp_customize->add_control('understrap_full_name', array(
        'label'      => __('Full Name', 'understrap'),
        'section'    => 'understrap_profile',
		'settings'   => 'understrap_author_options_full_name',
		
	));
	
    //career
    $wp_customize->add_setting('understrap_author_options_career', array(
        'default'        => 'Enter your career',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
	));
	
    $wp_customize->add_control('understrap_career', array(
        'label'      => __('Career', 'understrap'),
        'section'    => 'understrap_profile',
		'settings'   => 'understrap_author_options_career',
    ));

  
    //linkedin
    $wp_customize->add_setting('understrap_author_options_linkedin_url', array(
        'default'        => __('Enter Linkedin URL', 'understrap'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('understrap_linkedin_url', array(
        'label'      => __('Linkedin URL', 'understrap'),
        'section'    => 'understrap_profile',
		'settings'   => 'understrap_author_options_linkedin_url',
    ));
   
    //github
    $wp_customize->add_setting('understrap_author_options_github_url', array(
        'default'        => __('Enter Github URL', 'understrap'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',        
    ));
    $wp_customize->add_control('understrap_github_url', array(
        'label'      => __('Github URL', 'understrap'),
        'section'    => 'understrap_profile',
		'settings'   => 'understrap_author_options_github_url',
    ));

	//gitlab
    $wp_customize->add_setting('understrap_author_options_gitlab_url', array(
        'default'        => __('Enter Gitlab URL', 'understrap'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',        
    ));
    $wp_customize->add_control('understrap_gitlab_url', array(
        'label'      => __('Gitlab URL', 'understrap'),
        'section'    => 'understrap_profile',
		'settings'   => 'understrap_author_options_gitlab_url',
    ));

   //twitter
  	$wp_customize->add_setting('understrap_author_options_twitter_url', array(
		'default'        => __('Enter Twitter URL', 'understrap'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('understrap_twitter_url', array(
		'label'      => __('Twitter URL', 'understrap'),
		'section'    => 'understrap_profile',
		'settings'   => 'understrap_author_options_twitter_url',
	)); 

    //Facebook
	$wp_customize->add_setting('understrap_author_options_facebook_url', array(
		'default'        => __('Enter Facebook URL', 'understrap'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('understrap_facebook_url', array(
		'label'      => __('Facebook URL', 'understrap'),
		'section'    => 'understrap_profile',
		'settings'   => 'understrap_author_options_facebook_url',
	));


	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script(
			'understrap_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );
