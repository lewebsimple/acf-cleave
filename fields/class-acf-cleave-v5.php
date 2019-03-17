<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'acf_cleave_field' ) ) {

	class acf_cleave_field extends acf_field {

		public $settings;

		function __construct( $settings ) {
			$this->name     = 'cleave';
			$this->label    = __( "Cleave.js", 'acf-cleave' );
			$this->category = 'basic';
			$this->defaults = array();
			$this->settings = $settings;
			parent::__construct();
		}

		function input_admin_enqueue_scripts() {
			$url     = $this->settings['url'];
			$version = $this->settings['version'];
			wp_register_script( 'cleave', "{$url}assets/js/cleave.min.js", array(), '1.4.10' );
			wp_register_script( 'cleave-phone', "{$url}assets/js/cleave-phone.ca.js", array(), '1.4.10' );
			wp_register_script( 'acf-cleave', "{$url}assets/js/acf-cleave.js", array(
				'cleave',
				'cleave-phone',
			), $version );
			wp_enqueue_script( 'acf-cleave' );
		}

		function render_field( $field ) {
		    // TODO Implement format presets in field settings (phone, credit card, date, etc.)
            // TODO Add 'acf-cleave/options' filter
			$cleave_options = array(
				'phone'           => true,
				'phoneRegionCode' => 'CA',
			);
			$atts           = array(
				'id'          => $field['id'],
				'class'       => $field['class'] . ' acf-cleave',
				'data-cleave' => json_encode( $cleave_options ),
			);
			?>
            <div <?= acf_esc_attr( $atts ); ?>>
                <input name="<?= esc_attr( $field['name'] ); ?>" type="text" value="<?= $field['value'] ?>">
            </div>
			<?php
		}


	}

	new acf_cleave_field( $this->settings );
}
