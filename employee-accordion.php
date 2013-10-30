<?php
	/*
	 * Plugin Name: Employee Accordion
	 * Description: Show off your employees, with style!
	 * Author: Dusty Filippini
	 * Author URI: 
	 * Version: 0.0.1
	 */

	class Employee_Accordion {

		function __construct() {
			$this->register_actions();
		}

		function register_actions() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'init', array( $this, 'register_custom_fields' ) );
		}

		function enqueue_scripts() {

			wp_register_script(
				'easing',
				plugins_url( '/js/jquery.easing.1.3.js', __FILE__ ),
				array( 'jquery' )
			);

			wp_enqueue_script(
				'vaccordion',
				plugins_url( '/js/jquery.vaccordion.js', __FILE__ ),
				array( 'easing' )
			);

			wp_enqueue_style(
				'vaccordion',
				plugins_url( '/css/employee-accordion.css', __FILE__ )
			);

		}

		function register_custom_fields() {
			// TODO: Remove dependency to ACF

			if(function_exists("register_field_group"))
			{
				register_field_group(array (
					'id' => 'acf_team-photos',
					'title' => 'Team Photos',
					'fields' => array (
						array (
							'key' => 'field_50f4d169b273a',
							'label' => 'Team Members',
							'name' => 'br_team_members',
							'type' => 'repeater',
							'sub_fields' => array (
								'field_50f4d1d342458' => array (
									'key' => 'field_50f4d1d342458',
									'label' => 'Photo',
									'name' => 'br_team_photo',
									'type' => 'image',
									'column_width' => '',
									'save_format' => 'object',
									'preview_size' => 'our-team',
									'library' => 'all',
								),
								'field_50f4d20a42459' => array (
									'key' => 'field_50f4d20a42459',
									'label' => 'Name',
									'name' => 'br_team_name',
									'type' => 'text',
									'column_width' => '',
									'default_value' => '',
									'formatting' => 'html',
									'maxlength' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
								),
								'field_1' => array (
									'key' => 'field_1',
									'label' => 'Bio',
									'name' => 'br_team_bio',
									'type' => 'wysiwyg',
									'column_width' => '',
									'default_value' => '',
									'toolbar' => 'full',
									'media_upload' => 'yes',
									'the_content' => 'yes',
								),
							),
							'row_min' => 0,
							'row_limit' => '',
							'layout' => 'table',
							'button_label' => 'Add Team Member',
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'page_template',
								'operator' => '==',
								'value' => 'page-templates/page-our-team.php',
								'order_no' => 0,
								'group_no' => 0,
							),
						),
					),
					'options' => array (
						'position' => 'normal',
						'layout' => 'no_box',
						'hide_on_screen' => array (
						),
					),
					'menu_order' => 0,
				));
			}

		}

	}

	new Employee_Accordion();

