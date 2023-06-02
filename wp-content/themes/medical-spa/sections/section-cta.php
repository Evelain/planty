<?php
/**
 * Call To Action Section
 * 
 * @package medical_spa
 */

$ed_cta_section = get_theme_mod( 'spa_and_salon_ed_cta_section',true ); 
$cta_text       = get_theme_mod( 'medical_spa_call_to_action_section_title',esc_html__( 'Spa and Salon Pro Theme', 'medical-spa' ) ); 
$cta_desc       = get_theme_mod( 'medical_spa_call_to_action_section_desc', __( 'Spa and Salon is a beautifully designed theme with lots of solid featured.','medical-spa') ); 
$cta_btn_text   = get_theme_mod( 'medical_spa_call_to_action_button_label',esc_html__( 'View Pro Theme Features', 'medical-spa' ) ); 
$cta_btn_url    = get_theme_mod( 'medical_spa_call_to_action_button_link','#' ); 

if( $ed_cta_section && ( $cta_text || $cta_desc ) && ( $cta_btn_text || $cta_btn_url ) ) { ?>
    <div class="container">
        <div class="text">
            <?php if( $cta_text ) { ?>
                <h2><?php echo esc_html( $cta_text ); ?></h2>
            <?php }  
            if($cta_desc) {
              echo wpautop( wp_kses_post( $cta_desc ) );  
            } if( $cta_btn_text && $cta_btn_url ) { ?>                                        
                <a href="<?php echo esc_url( $cta_btn_url ); ?>" class="btn-spa"><?php echo esc_html( $cta_btn_text ); ?></a>
            <?php } ?>                                                            
        </div>
    </div>
<?php }