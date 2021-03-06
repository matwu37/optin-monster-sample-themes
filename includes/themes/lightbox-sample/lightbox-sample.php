<?php
/**
 * Sample theme class.
 *
 * Each theme class must extend 'Optin_Monster_Theme'
 */
class Optin_Monster_Lightbox_Theme_Sample extends Optin_Monster_Theme {

    /**
     * Path to the file.
     *
     * @var string
     */
    public $file = __FILE__;

    /**
     * Slug of the theme.
     *
     * @var string
     */
    public $theme = 'sample';

    /**
     * The width of the image for the optin.
     * This is only needed if the theme has an image
     *
     * @var int
     */
    public $img_width = 340;

    /**
     * The height of the image for the optin.
     * This is only needed if the theme has an image
     *
     * @var int
     */
    public $img_height = 250;

    /**
     * Primary class constructor.
     *
     * The constructor must invoke the parent constructor
     *
     * @param int $optin_id The optin ID to target.
     */
    public function __construct( $optin_id ) {

        // Construct via the parent object.
        parent::__construct( $optin_id );

        // Set the optin type.
        $this->type = $this->meta['type'];

    }

    /**
     * Retrieval method for getting the styles for a theme.
     *
     * @since 2.0.0
     *
     * @return string A string of concatenated CSS for the theme.
     */
    public function get_styles() {

	    /**
	     * All optins should have these rules to ensure proper CSS reset and positioning.
	     */
        $css = '
        html div#om-' . $this->optin->post_name . ' * {
            box-sizing:border-box;
            -webkit-box-sizing:border-box;
            -moz-box-sizing:border-box;
        }
        html div#om-' . $this->optin->post_name . ' {
            background:none;
            border:0;
            border-radius:0;
            -webkit-border-radius:0;
            -moz-border-radius:0;
            float:none;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing: grayscale;
            height:auto;
            letter-spacing:normal;
            outline:none;
            position:static;
            text-decoration:none;
            text-indent:0;
            text-shadow:none;
            text-transform:none;
            width:auto;
            visibility:visible;
            overflow:visible;
            margin:0;
            padding:0;
            line-height:1;
            box-sizing:border-box;
            -webkit-box-sizing:border-box;
            -moz-box-sizing:border-box;
            -webkit-box-shadow:none;
            -moz-box-shadow:none;
            -ms-box-shadow:none;
            -o-box-shadow:none;
            box-shadow:none;
            -webkit-appearance:none;
        }
        html div#om-' . $this->optin->post_name . ' {
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, .7);
            -webkit-font-smoothing: antialiased;
            line-height: 1;
            width: 100%;
            height: 100%;
        }
        html div#om-' . $this->optin->post_name . ' .om-clearfix {
            clear: both;
        }
        html div#om-' . $this->optin->post_name . ' .om-clearfix:after {
            clear: both;
            content: ".";
            display: block;
            height: 0;
            line-height: 0;
            overflow: auto;
            visibility: hidden;
            zoom: 1;
        }';

	    /**
	     * These rules dictate positioning, sizing, and background color.
	     */
        $css .= '
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin {
            background-color: #fff;
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            min-height: 175px;
            width: 600px;
        }
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-wrap {
            position: relative;
            height: 100%;
        }';


	    /**
	     * Pro tip: Always have a close button
	     *
	     * We're using the symbol '&times;' here, but you could also use a
	     * background image.
	     */
	    $css .= '
	    html div#om-' . $this->optin->post_name . ' .om-close {
            position: absolute;
            top: 4px;
            right: 10px;
            display: block;
            font-family: "Verdana", Arial, sans-serif;
            font-size: 28px;
            font-weight: bold;
            color: #333333;
            color: rgba(0,0,0,0.3);
            text-decoration: none !important;
        }';

	    /**
	     * Here's the top of the optin
	     */
        $css .= '
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-header {
            min-height: 30px;
            margin: 0 auto;
            padding: 40px 32px;
            width: 495px;
        }
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-title {
            font-family: "Lato", Arial, sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: #ff5533;
            width: 100%;
            text-align: center;
        }';

        $css .= '
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-content {
            width: 340px;
            display: block;
            margin: 0 auto;
        }
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-content-clear {
            min-height: 0;
        }
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-tagline {
            font-family: "Lato", Arial, sans-serif;
            font-size: 18px;
            text-align: center;
            line-height: 1.25;
            color: #8d9aa1;
        }
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-image-container {
            position: relative;
            width: 340px;
            height: 250px;
            margin: 0 auto;
        }
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-image-container img {
            display: block;
            margin: 0 auto;
            text-align: center;
            height: auto;
            max-width: 100%;
        }';

	    /**
	     * Now for the optin footer which contains the form
	     */
        $css .= '
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-footer {
            padding: 30px 32px 45px;
        }
        html div#om-' . $this->optin->post_name . ' label {
            color: #333;
        }
        html div#om-' . $this->optin->post_name . ' input,
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-name,
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-email {
            background-color: #fff;
            width: 340px;
            height: 48px;
            border: 1px solid #ccc;
            -webkit-box-shadow: 0 0 6px -3px rgba(0,0,0,0.8) inset;
            -moz-box-shadow: 0 0 6px -3px rgba(0,0,0,0.8) inset;
            box-shadow: 0 0 6px -3px rgba(0,0,0,0.8) inset;
            border-radius: 2px;
            font-size: 18px;
            line-height: 38px;
            margin: 0 auto 18px;
            padding: 4px 6px;
            overflow: hidden;
            outline: none;
            vertical-align: middle;
            display: block;
        }
        html div#om-' . $this->optin->post_name . ' input[type=submit],
        html div#om-' . $this->optin->post_name . ' button,
        html div#om-' . $this->optin->post_name . ' #om-' . $this->type . '-' . $this->theme . '-optin-submit {
            background: #ff5533;
            border: 1px solid #ce4226;
            -webkit-box-shadow: 0 1px 1px -1px #fff inset;
            -moz-box-shadow: 0 1px 1px -1px #fff inset;
            box-shadow: 0 1px 1px -1px #fff inset;
            -webkit-text-shadow: #888 -0 0 1px;
            -moz-text-shadow: #888 -0 0 1px;
            text-shadow: #888 -0 0 1px;
            width: 340px;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            padding: 4px 6px;
            line-height: 24px;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }';

	    /**
	     * And return all of the CSS
	     */
        return $css;

    }

    /**
     * Retrieval method for getting the HTML output for a theme.
     *
     * @return string A string of HTML for the theme.
     */
    public function get_html() {

        $provider = $this->get_email_setting( 'provider', '', false );
	    // Make sure to have both of the next two <div> elements or OptinMonster may not work.
		$html = '<div id="om-' . $this->type . '-' . $this->theme . '-optin" class="om-' . $this->type . '-' . $this->theme . ' om-clearfix om-theme-' . $this->theme . ' ' . ( $provider && 'custom' == $provider ? 'om-custom-html-form' : '' ) . '"style="background-color:' . $this->get_background_setting( 'content', '#ffffff' ) . '">';
		$html .= '<div id="om-' . $this->type . '-' . $this->theme . '-optin-wrap" class="om-clearfix" style="background-color:' . $this->get_background_setting( 'content', '#ffffff' ) . '>';
	        // Here's that oh-so-important close button
			$html .= '<a href="#" class="om-close" title="' . esc_attr__( 'Close', 'optin-monster' ) . '">&times;</a>';

			// Header area.
			$html .= '<div id="om-' . $this->type . '-' . $this->theme . '-header" class="om-clearfix" >';
				$html .= '<div id="om-' . $this->type . '-' . $this->theme . '-optin-title" data-om-action="editable" data-om-field="title" style="' . $this->get_element_style( 'title', array( 'color' => '#ff5533', 'font' => 'Lato', 'size' => '40px', 'meta' => array( 'text-align' => 'center' ) ) ) . '">' . $this->get_title_setting( 'text', __( 'Grow Your Blog Traffic by 200% with Our FREE Tool!', 'optin-monster' ) ) . '</div>';
			$html .= '</div>';

			// Content area.
			$html .= '<div id="om-' . $this->type . '-' . $this->theme . '-content" class="om-clearfix">';
				$html .= '<div id="om-' . $this->type . '-' . $this->theme . '-optin-image-container" class="om-image-container om-clearfix">';
					$html .= $this->get_image();
				$html .= '</div>';
				$html .= '<div id="om-' . $this->type . '-' . $this->theme . '-optin-tagline" data-om-action="editable" data-om-field="tagline" style="' . $this->get_element_style( 'tagline', array( 'color' => '#8d9aa1', 'font' => 'Lato', 'size' => '16px', 'meta' => array( 'text-align' => 'left' ) ) ) . '">' . $this->get_tagline_setting( 'text', __( 'Get the inside details on how you can increase your traffic overnight by 200% or more!', 'optin-monster' ) ) . '</div>';
			$html .= '</div>';

			// Footer area.
	        // We need to know if the name field should be shown.
			$show_name  = $this->get_name_setting( 'show' );

	        // And change the footer class if the name should be shown.
			$class_name = $show_name ? ' om-has-name-email' : ' om-has-email';
			$html .= '<div id="om-' . $this->type . '-' . $this->theme . '-footer" class="om-clearfix' . $class_name . '" data-om-action="selectable" data-om-target="#optin-monster-field-content_bg">';

				// Show either the custom HTML form entered by the user or the custom fields in the Fields pane.
				if ( isset( $this->meta['email']['provider'] ) && 'custom' == $this->meta['email']['provider'] ) {
					$html .= do_shortcode( html_entity_decode( $this->meta['custom_html'] ) );
				} else {
					// Possibly show the name field.
					if ( $show_name ) {
						$html .= '<input id="om-' . $this->type . '-' . $this->theme . '-optin-name" type="text" value="" data-om-action="selectable" data-om-target="#optin-monster-field-name_field" placeholder="' . $this->get_name_setting( 'placeholder', __( 'Enter your name here...', 'optin-monster' ) ) . '" style="' . $this->get_element_style( 'name', array( 'font' => 'Open Sans' ) ) . '" />';
					}

					$html .= '<input id="om-' . $this->type . '-' . $this->theme . '-optin-email" type="email" value="" data-om-action="selectable" data-om-target="#optin-monster-field-email_field" placeholder="' . $this->get_email_setting( 'placeholder', __( 'Enter your email address here...', 'optin-monster' ) ) . '" style="' . $this->get_element_style( 'email', array( 'font' => 'Open Sans' ) ) . '" />';
					$html .= '<input id="om-' . $this->type . '-' . $this->theme . '-optin-submit" type="submit" data-om-action="selectable" data-om-target="#optin-monster-field-submit_field" value="' . $this->get_submit_setting( 'placeholder', __( 'Sign Up', 'optin-monster' ) ) . '" style="' . $this->get_element_style( 'submit', array( 'font' => 'Open Sans' ) ) . '" />';
				}

			$html .= '</div>';

		$html .= '</div>';

		// If we have a powered by link, output it now.
		$html .= $this->get_powered_by_link();
        $html .= '</div>';
        return $html;

    }

    /**
     * Retrieval method for getting any custom JS for a theme.
     * This is done via output buffering so that it is easier
     * to read as JS during development.
     *
     * @return string A string of JS for the theme.
     */
    public function get_js() {

    }

    /**
     * Outputs the filters needed to register controls for the OptinMonster
     * preview customizer and save the fields registered.
     */
    public function controls() {

        add_filter( 'optin_monster_panel_design_fields', array( $this, 'design_fields' ), 10, 2 );
        add_filter( 'optin_monster_panel_input_fields', array( $this, 'input_fields' ), 10, 2 );
        add_filter( 'optin_monster_save_optin', array( $this, 'save_controls' ), 10, 4 );

    }

    /**
     * Outputs the design controls for the theme.
     *
     * Each field should be added to the $fields array with a unique slug.
     *
     * @param array $fields    Array of design fields.
     * @param object $instance The Edit UI instance.
     * @return array $fields   Amended array of design fields.
     */
    public function design_fields( $fields, $instance ) {

	    $fields['content_bg'] = $instance->get_color_field(
		    'content_bg', // Identifier for the save method
		    $instance->get_background_setting( 'content', '#ffffff' ), // Get the saved value
		    __( 'Optin Content Background', 'optin-monster' ), // Field title
		    __( 'The background color of the optin.', 'optin-monster' ), // Field description/helper text
		    '', // Field placeholder text
		    array( // Field data attributes
			    'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-wrap',
			    'props'  => 'background-color'
		    )
	    );

        return $fields;

    }

    /**
     * Outputs the fields controls for the theme.
     *
     * @param array $fields    Array of input fields.
     * @param object $instance The Edit UI instance.
     * @return array $fields   Amended array of input fields.
     */
    public function input_fields( $fields, $instance ) {

        // Build the name field.
        $fields['name_header'] = $instance->get_field_header( __( 'Name Field', 'optin-monster' ), 'name', true );
        $fields['name_show'] = $instance->get_checkbox_field(
            'name_show', // Identifier for the save method
            $instance->get_name_setting( 'show' ), // Get the saved value
            __( 'Show optin name field?', 'optin-monster' ), // Field title
            __( 'Displays or hides the name field in the optin.', 'optin-monster' ), // Field description/helper text
            array( // Field data attributes
                'target' => '#om-' . $this->type . '-' . $this->theme . '-footer',
                'input'  => esc_attr( '<input id="om-' . $this->type . '-' . $this->theme . '-optin-name" type="text" value="" data-om-action="selectable" data-om-target="#optin-monster-field-name_field" placeholder="' . $this->get_name_setting( 'placeholder', __( 'Enter your name here...', 'optin-monster' ) ) . '" style="' . $this->get_element_style( 'name', array( 'font' => 'Open Sans' ) ) . '" />' ),
                'name'   => '#om-' . $this->type . '-' . $this->theme . '-optin-name'
            )
        );
        $fields['name_field'] = $instance->get_text_field(
            'name_field',
            $instance->get_name_setting( 'placeholder', __( 'Enter your name here...', 'optin-monster' ) ),
            __( 'Name Placeholder', 'optin-monster' ),
            __( 'The placeholder text for the email field.', 'optin-monster' ),
            false,
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-name',
                'method' => 'attr',
                'attr'   => 'placeholder'
            ),
            array( 'om-live-preview' )
        );
        $fields['name_color'] = $instance->get_color_field(
            'name_color',
            $instance->get_name_setting( 'color', '#484848' ),
            __( 'Name Color', 'optin-monster' ),
            __( 'The text color for the name field.', 'optin-monster' ),
            '',
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-name',
                'props'  => 'color'
            )
        );
        $fields['name_font'] = $instance->get_font_field(
            'name_font',
            $instance->get_name_setting( 'font', 'Open Sans' ),
            Optin_Monster_Output::get_instance()->get_supported_fonts(),
            __( 'Name Font', 'optin-monster' ),
            __( 'The font family for the name field.', 'optin-monster' ),
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-name',
                'attr'   => 'font-family',
                'method' => 'css'
            ),
            array( 'om-live-preview' )
        );

        // Build the email field.
        $fields['email_header'] = $instance->get_field_header( __( 'Email Field', 'optin-monster' ), 'email' );
        $fields['email_field'] = $instance->get_text_field(
            'email_field',
            $instance->get_email_setting( 'placeholder', __( 'Enter your email address here...', 'optin-monster' ) ),
            __( 'Email Placeholder', 'optin-monster' ),
            __( 'The placeholder text for the email field.', 'optin-monster' ),
            false,
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-email',
                'method' => 'attr',
                'attr'   => 'placeholder'
            ),
            array( 'om-live-preview' )
        );
        $fields['email_color'] = $instance->get_color_field(
            'email_color',
            $instance->get_email_setting( 'color', '#484848' ),
            __( 'Email Color', 'optin-monster' ),
            __( 'The text color for the email field.', 'optin-monster' ),
            '',
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-email',
                'props'  => 'color'
            )
        );
        $fields['email_font'] = $instance->get_font_field(
            'email_font',
            $instance->get_email_setting( 'font', 'Open Sans' ),
            Optin_Monster_Output::get_instance()->get_supported_fonts(),
            __( 'Email Font', 'optin-monster' ),
            __( 'The font family for the email field.', 'optin-monster' ),
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-email',
                'attr'   => 'font-family',
                'method' => 'css'
            ),
            array( 'om-live-preview' )
        );

        // Build the submit field.
        $fields['submit_header'] = $instance->get_field_header( __( 'Submit Field', 'optin-monster' ), 'submit' );
        $fields['submit_field'] = $instance->get_text_field(
            'submit_field',
            $instance->get_submit_setting( 'placeholder', __( 'Sign Up', 'optin-monster' ) ),
            __( 'Submit Field', 'optin-monster' ),
            __( 'The value of the submit button field.', 'optin-monster' ),
            false,
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-submit',
                'method' => 'val'
            ),
            array( 'om-live-preview' )
        );

        $fields['submit_color'] = $instance->get_color_field(
            'submit_color',
            $instance->get_submit_setting( 'field_color', '#fff' ),
            __( 'Submit Button Color', 'optin-monster' ),
            __( 'The text color for the submit button field.', 'optin-monster' ),
            '',
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-submit',
                'props'  => 'color'
            )
        );

        $fields['submit_bg'] = $instance->get_color_field(
            'submit_bg',
            $instance->get_submit_setting( 'bg_color', '#ff5533' ),
            __( 'Submit Button Background', 'optin-monster' ),
            __( 'The background color of the submit button.', 'optin-monster' ),
            '',
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-submit',
                'props'  => 'background-color'
            )
        );

	    /**
	     * This is a special field that allows for dynamic border color based
	     * on the button background color.
	     */
        $fields['submit_border']  = $instance->get_hidden_field(
            'submit_border',
            $instance->get_submit_setting( 'border', '#ce4226' ),
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-submit',
                'attr' => 'border-color',
                'method' => 'css',
                'source' => 'submit_bg' // Tell the field where to get the original color.
            ),
            array( 'om-live-preview' )
        );

        $fields['submit_font'] = $instance->get_font_field(
            'submit_font',
            $instance->get_submit_setting( 'font', 'Open Sans' ),
            Optin_Monster_Output::get_instance()->get_supported_fonts(),
            __( 'Submit Button Font', 'optin-monster' ),
            __( 'The font family for the submit button field.', 'optin-monster' ),
            array(
                'target' => '#om-' . $this->type . '-' . $this->theme . '-optin-submit',
                'attr'   => 'font-family',
                'method' => 'css'
            ),
            array( 'om-live-preview' )
        );

        return $fields;

    }

    /**
     * Saves the meta fields for the optin controls.
     *
     * @param array $meta      The meta key "_om_meta" with all of its data.
     * @param int $optin_id    The optin ID to target.
     * @param array $fields    The post fields under the key "optin_monster".
     * @param array $post_data All of the $_POST contents generated when saving.
     * @return array $meta     Amended array of meta to be saved.
     */
    public function save_controls( $meta, $optin_id, $fields, $post_data ) {

	    $meta['background']['content']       = isset( $fields['content_bg'] ) ? esc_attr( $fields['content_bg'] ) : '';
        $meta['name']['show']                = isset( $fields['name_show'] ) ? 1 : 0;
        $meta['name']['placeholder']         = isset( $fields['name_field'] ) ? trim( strip_tags( $fields['name_field'] ) ) : '';
        $meta['name']['color']               = isset( $fields['name_color'] ) ? esc_attr( $fields['name_color'] ) : '';
        $meta['name']['font']                = isset( $fields['name_font'] ) ? trim( $fields['name_font'] ) : '';
        $meta['email']['placeholder']        = isset( $fields['email_field'] ) ? trim( strip_tags( $fields['email_field'] ) ) : '';
        $meta['email']['color']              = isset( $fields['email_color'] ) ? esc_attr( $fields['email_color'] ) : '';
        $meta['email']['font']               = isset( $fields['email_font'] ) ? trim( $fields['email_font'] ) : '';
        $meta['submit']['placeholder']       = isset( $fields['submit_field'] ) ? trim( strip_tags( $fields['submit_field'] ) ) : '';
        $meta['submit']['field_color']       = isset( $fields['submit_color'] ) ? esc_attr( $fields['submit_color'] ) : '';
        $meta['submit']['bg_color']          = isset( $fields['submit_bg'] ) ? esc_attr( $fields['submit_bg'] ) : '';
        $meta['submit']['border']            = isset( $fields['submit_border'] ) ? esc_attr( $fields['submit_border'] ) : '';
        $meta['submit']['font']              = isset( $fields['submit_font'] ) ? trim( $fields['submit_font'] ) : '';

        return $meta;

    }

}