<?php
/**
 * Medical Spa Functions
*/

/**
 * After setup theme hook
 */
function medical_spa_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'medical-spa', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'medical_spa_theme_setup' );

/**
 * Load assets.
 *
 */
function medical_spa_enqueue_styles() {
    $my_theme = wp_get_theme();
    $version = $my_theme['Version'];
    
    wp_enqueue_style( 'medical-spa-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'medical-spa-style', get_stylesheet_directory_uri() . '/style.css', array( 'medical-spa-parent-style' ), $version );
}
add_action( 'wp_enqueue_scripts', 'medical_spa_enqueue_styles' );

function medical_spa_customizer_js() {
      wp_enqueue_script( 'medical-spa-customizer-js', get_stylesheet_directory_uri() . '/js/customizer.js', array('jquery'), '1.0.0', true  );

      //localizing for templates in the customizer
      $frontpage_url        = get_permalink( get_option( 'page_on_front' ) );
      $array = array(
          'frontpage'          => $frontpage_url,
      );

      wp_localize_script( 'medical-spa-customizer-js', 'medical_spa_customizer_data', $array );
      
  }
add_action( 'customize_controls_enqueue_scripts', 'medical_spa_customizer_js' );

function medical_spa_footer_text(){
    $copyright_text = get_theme_mod( 'spa_and_salon_footer_copyright_text' );

    $text  = '<div class="site-info"><div class="container"><span class="copyright">';
    if( $copyright_text ){
        $text .= wp_kses_post( $copyright_text ); 
    }else{
        $text .= esc_html__( '&copy; ', 'medical-spa' ) . date_i18n( esc_html__( 'Y', 'medical-spa' ) ); 
        $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>'. esc_html__( '. All Rights Reserved.', 'medical-spa' );
    }
    $text .= '</span>';
    $text .= '<span class="by">';
    $text .= esc_html__( 'Medical Spa | Developed By ', 'medical-spa' );
    $text .= '<a href="' . esc_url( 'https://rarathemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Rara Theme', 'medical-spa' );
    $text .= '</a>';
    $text .= sprintf( esc_html__( ' Powered by: %s', 'medical-spa' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'medical-spa' ) ) .'" target="_blank">WordPress</a>' );
    if ( function_exists( 'the_privacy_policy_link' ) ) {
       $text .= get_the_privacy_policy_link();
    }
    $text .= '</span></div></div>';
    return $text;
}
add_filter( 'spa_and_salon_footer_text', 'medical_spa_footer_text' );

function spa_and_salon_customizer_theme_info( $wp_customize ) {
    
    $wp_customize->add_section( 'theme_info' , array(
        'title'       => __( 'Information Links' , 'medical-spa' ),
        'priority'    => 6,
        ));

    $wp_customize->add_setting('theme_info_theme',array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
        ));
    
    $theme_info = '';
    $theme_info .= '<h3 class="sticky_title">' . __( 'Need help?', 'medical-spa' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View demo', 'medical-spa' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/previews/?theme=medical-spa' ) . '" target="_blank">' . __( 'here', 'medical-spa' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View documentation', 'medical-spa' ) . ': </label><a href="' . esc_url( 'https://docs.rarathemes.com/docs/medical-spa/' ) . '" target="_blank">' . __( 'here', 'medical-spa' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Themes info', 'medical-spa' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/wordpress-themes/medical-spa/' ) . '" target="_blnak">' . __( 'here', 'medical-spa' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support ticket', 'medical-spa' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/support-ticket/' ) . '" target="_blnak">' . __( 'here', 'medical-spa' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Rate this theme', 'medical-spa' ) . ': </label><a href="' . esc_url( 'https://wordpress.org/support/theme/medical-spa/reviews/' ) . '" target="_blnak">' . __( 'here', 'medical-spa' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="more-detail row-element">' . __( 'More WordPress Themes' ,'medical-spa' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/wordpress-themes/' ) . '" target="_blank">' . __( 'here', 'medical-spa' ) . '</a></span><br />';
    

    $wp_customize->add_control( new Spa_and_Salon_Theme_Info( $wp_customize ,'theme_info_theme',
        array(
            'label'       => __( 'About Medical Spa' , 'medical-spa' ),
            'section'     => 'theme_info',
            'description' => $theme_info
        )));

    $wp_customize->add_setting('theme_info_more_theme',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ));

}
add_action( 'customize_register', 'spa_and_salon_customizer_theme_info',11 );


function medical_spa_call_to_action_section( $wp_customize ) {

    /** CTA Section */
    
    $wp_customize->add_section(
        'medical_spa_homepage_cta',
        array(
            'title'    => __( 'Call to Action Section', 'medical-spa' ),
            'priority' => 40,
            'panel'    => 'spa_and_salon_home_page_settings',
        )
    );
    
    $wp_customize->add_setting(
        'spa_and_salon_ed_cta_section',
        array(
            'default'           => true,
            'sanitize_callback' => 'spa_and_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'spa_and_salon_ed_cta_section',
        array(
            'label'   => esc_html__( 'Enable CTA Section', 'medical-spa' ),
            'section' => 'medical_spa_homepage_cta',
            'type'    => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'medical_spa_call_to_action_section_title',
        array(
            'default'           => esc_html__( 'Spa and Salon Pro Theme', 'medical-spa' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'medical_spa_call_to_action_section_title', array(
            'selector'            => '.cta-section h2',
            'render_callback'     => 'medical_spa_call_to_action_section_title_selective_refresh',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
        ) );
    }

    $wp_customize->add_control(
        'medical_spa_call_to_action_section_title',
        array(
            'label'   => esc_html__( 'Call To Action Title', 'medical-spa' ),
            'section' => 'medical_spa_homepage_cta',
            'type'    => 'text',
        )
    ); 

     $wp_customize->add_setting(
        'medical_spa_call_to_action_section_desc',
        array(
            'default'           => __( 'Spa and Salon is a beautifully designed theme with lots of solid featured.','medical-spa'),
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'medical_spa_call_to_action_section_desc', array(
            'selector'            => '.cta-section p',
            'render_callback'     => 'medical_spa_call_to_action_section_desc_selective_refresh',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
        ) );
    }

    $wp_customize->add_control(
        'medical_spa_call_to_action_section_desc',
        array(
            'label'   => esc_html__( 'Call To Action Description', 'medical-spa' ),
            'section' => 'medical_spa_homepage_cta',
            'type'    => 'text',
        )
    );  

    $wp_customize->add_setting(
        'medical_spa_call_to_action_button_label',
        array(
            'default'           => esc_html__( 'View Pro Theme Features', 'medical-spa' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'medical_spa_call_to_action_button_label', array(
            'selector'            => '.cta-section .btn-spa',
            'render_callback'     => 'medical_spa_call_to_action_button_label_selective_refresh',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
        ) );
    }

    $wp_customize->add_control(
        'medical_spa_call_to_action_button_label',
        array(
            'label'   => esc_html__( 'Button Label', 'medical-spa' ),
            'section' => 'medical_spa_homepage_cta',
            'type'    => 'text',
        )
    ); 

    $wp_customize->add_setting(
        'medical_spa_call_to_action_button_link',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'medical_spa_call_to_action_button_link',
        array(
            'label'   => esc_html__( 'Buttom URL', 'medical-spa' ),
            'section' => 'medical_spa_homepage_cta',
            'type'    => 'text',
        )
    );  
    /** Homepage CTA Banner */      
   }
add_action( 'customize_register', 'medical_spa_call_to_action_section',11 );


function spa_and_salon_get_sections(){
    
    $spa_and_salon_sections = array(
        'banner-section' => array(
            'class' => 'banner-section',
            'id' => 'banner'
        ),
        'featured-section' => array(
            'class' => 'promotional-block',
            'id' => 'featured'
        ), 
        'about-section' => array(
            'class' => 'welcome-note',
            'id' => 'about'
        ),
        'service-section' => array(
            'class' => 'services',
            'id' => 'service'
        ),
        'cta-section' => array(
            'class' => 'cta-section',
            'id' => 'cta'
        ),
        'testimonial-section' => array(
            'class' => 'testimonial',
            'id' => 'testimonial'
        )              
    );
    
    $spa_and_salon_enabled_section = array();
    foreach ( $spa_and_salon_sections as $spa_and_salon_section ) {
        
        if ( esc_attr( get_theme_mod( 'spa_and_salon_ed_' . $spa_and_salon_section['id'] . '_section' ) ) == 1 ){
            $spa_and_salon_enabled_section[] = array(
                'id' => $spa_and_salon_section['id'],
                'class' => $spa_and_salon_section['class']
            );
        }
    }
    return $spa_and_salon_enabled_section;
 }

if ( ! function_exists( 'medical_spa_call_to_action_section_title_selective_refresh' ) ) :
    /**
     * CTA Title selective refresh.
     *
     */
    function medical_spa_call_to_action_section_title_selective_refresh() {
        $cta_title = get_theme_mod( 'medical_spa_call_to_action_section_title', esc_html__( 'Spa and Salon Pro Theme', 'medical-spa' ) );
        if ( $cta_title ) {
            return esc_html( $cta_title );
        } else {
            return false;
        }
    }
endif;
 
if ( ! function_exists( 'medical_spa_call_to_action_section_desc_selective_refresh' ) ) :
    /**
     * CTA Desc selective refresh.
     *
     */
    function medical_spa_call_to_action_section_desc_selective_refresh() {
        $cta_desc = get_theme_mod( 'medical_spa_call_to_action_section_desc' );
        if ( $cta_desc ) {
            return wp_kses_post( $cta_desc );
        } else {
            return false;
        }
    }
endif;
 
if ( ! function_exists( 'medical_spa_call_to_action_button_label_selective_refresh' ) ) :
    /**
     * Button Label selective refresh.
     *
     */
    function medical_spa_call_to_action_button_label_selective_refresh() {
        $button_label = get_theme_mod( 'medical_spa_call_to_action_button_label', esc_html__( 'View Pro Theme Features', 'medical-spa' ) );
        if ( $button_label ) {
            return esc_html( $button_label );
        } else {
            return false;
        }
    }
endif;