<?php
/**
 * Tinybit Theme Customizer
 *
 * @package tinybit
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'tinybit_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function tinybit_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'tinybit_customize_register' );

if ( ! function_exists( 'tinybit_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function tinybit_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'tinybit_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'tinybit' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width', 'tinybit' ),
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
		function tinybit_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'tinybit_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'tinybit_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tinybit_container_type',
				array(
					'label'       => __( 'Container Width', 'tinybit' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'tinybit' ),
					'section'     => 'tinybit_theme_layout_options',
					'settings'    => 'tinybit_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'tinybit' ),
						'container-fluid' => __( 'Full width container', 'tinybit' ),
					),
					'priority'    => '10',
				)
			)
		);

		// 



    //  =============================
    //  = Profile section              =
    //  =============================
    $wp_customize->add_section('tinybit_profile', array(
        'title'    => __('Author Profile', 'tinybit'),
        'priority' => 40,
    ));
    
    //full name
    $wp_customize->add_setting('tinybit_author_options_full_name', array(
        'default'        => __('Enter Full Name', 'tinybit'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('tinybit_full_name', array(
        'label'      => __('Full Name', 'tinybit'),
        'section'    => 'tinybit_profile',
		'settings'   => 'tinybit_author_options_full_name',
		
	));
	
    //career
    $wp_customize->add_setting('tinybit_author_options_career', array(
        'default'        => 'Enter your career',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
    $wp_customize->add_control('tinybit_career', array(
        'label'      => __('Career', 'tinybit'),
        'section'    => 'tinybit_profile',
		'settings'   => 'tinybit_author_options_career',
    ));

  
    //linkedin
    $wp_customize->add_setting('tinybit_author_options_linkedin_url', array(
        'default'        => __('Enter Linkedin URL', 'tinybit'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('tinybit_linkedin_url', array(
        'label'      => __('Linkedin URL', 'tinybit'),
        'section'    => 'tinybit_profile',
		'settings'   => 'tinybit_author_options_linkedin_url',
    ));
   
    //github
    $wp_customize->add_setting('tinybit_author_options_github_url', array(
        'default'        => __('Enter Github URL', 'tinybit'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',        
    ));
    $wp_customize->add_control('tinybit_github_url', array(
        'label'      => __('Github URL', 'tinybit'),
        'section'    => 'tinybit_profile',
		'settings'   => 'tinybit_author_options_github_url',
    ));

	//gitlab
    $wp_customize->add_setting('tinybit_author_options_gitlab_url', array(
        'default'        => __('Enter Gitlab URL', 'tinybit'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',        
    ));
    $wp_customize->add_control('tinybit_gitlab_url', array(
        'label'      => __('Gitlab URL', 'tinybit'),
        'section'    => 'tinybit_profile',
		'settings'   => 'tinybit_author_options_gitlab_url',
    ));

   //twitter
  	$wp_customize->add_setting('tinybit_author_options_twitter_url', array(
		'default'        => __('Enter Twitter URL', 'tinybit'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('tinybit_twitter_url', array(
		'label'      => __('Twitter URL', 'tinybit'),
		'section'    => 'tinybit_profile',
		'settings'   => 'tinybit_author_options_twitter_url',
	)); 

    //Facebook
	$wp_customize->add_setting('tinybit_author_options_facebook_url', array(
		'default'        => __('Enter Facebook URL', 'tinybit'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('tinybit_facebook_url', array(
		'label'      => __('Facebook URL', 'tinybit'),
		'section'    => 'tinybit_profile',
		'settings'   => 'tinybit_author_options_facebook_url',
	));


	//  =============================
    //  = Footer section              =
    //  =============================
    $wp_customize->add_section('tinybit_footer', array(
        'title'    => __('Footer Note/Link', 'tinybit'),
        'priority' => 50,
    ));

    $wp_customize->add_setting('tinybit_theme_options_copyright', array( 
		'default'   => '<a href="http://wordpress.org/" >Proudly powered by WordPress</a> | Theme: Tinybit by <a href="http://tinybit.com">Hosain Masoudi</a>', 
        'type' => 'theme_mod', 
        'sanitize_callback' => 'wp_kses_post', 
        'transport'   => 'refresh'
    ));
    $wp_customize->add_control('tinybit_copyright_text', array(
        'label'      => __('You can add text/html', 'tinybit'),
        'section'    => 'tinybit_footer',
        'type'       => 'textarea',
        'settings'   => 'tinybit_theme_options_copyright',
    ));

	}
} // endif function_exists( 'tinybit_theme_customize_register' ).
add_action( 'customize_register', 'tinybit_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'tinybit_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function tinybit_customize_preview_js() {
		wp_enqueue_script(
			'tinybit_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'tinybit_customize_preview_js' );
