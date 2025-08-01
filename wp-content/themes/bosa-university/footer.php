<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bosa University
 */

?>
	<?php
		$bosa_university_footer_layout = '';
		if( get_theme_mod( 'bosa_university_footer_layout', 'footer_one' ) == 'footer_one'){
			$bosa_university_footer_layout = 'site-footer-primary';
		}elseif( get_theme_mod( 'bosa_university_footer_layout', 'footer_one' ) == 'footer_two'){
			$bosa_university_footer_layout = 'site-footer-two';
		}elseif( get_theme_mod( 'bosa_university_footer_layout', 'footer_one' ) == 'footer_three'){
			$bosa_university_footer_layout = 'site-footer-three';
		}
		
		$bosa_university_has_footer_bg = '';
		$bosa_university_render_footer_image_size 	= get_theme_mod( 'bosa_university_render_footer_image_size', 'full' );
		$bosa_university_footer_image_id 			= get_theme_mod( 'bosa_university_footer_image', '' );
		$bosa_university_get_footer_image_array 	= wp_get_attachment_image_src( $bosa_university_footer_image_id, $bosa_university_render_footer_image_size );
		if( is_array( $bosa_university_get_footer_image_array ) ){
			$bosa_university_footer_image = $bosa_university_get_footer_image_array[0];
		}else{
			$bosa_university_footer_image = '';
		}
		if ( $bosa_university_footer_image || get_theme_mod( 'bosa_university_top_footer_background_color', '' ) ){
			$bosa_university_has_footer_bg = 'has-footer-bg';
		}
	?>

	<footer id="colophon" class="site-footer <?php echo esc_attr( $bosa_university_footer_layout . ' ' . $bosa_university_has_footer_bg ) ?>">
		<div class="site-footer-inner" style="background-image: url(<?php echo esc_url( $bosa_university_footer_image ) ?>">
			<?php if( !get_theme_mod( 'bosa_university_disable_footer_widget', false ) ):
			 if( bosa_university_is_active_footer_sidebar() ): ?>
				<div class="top-footer">
					<div class="wrap-footer-sidebar">
						<div class="container">
							<div class="footer-widget-wrap">
								<div class="row">
									<?php if( get_theme_mod( 'bosa_university_footer_widget_layout', 'footer_widget_layout_one' ) == '' || get_theme_mod( 'bosa_university_footer_widget_layout', 'footer_widget_layout_one' ) == 'footer_widget_layout_one' ){
										get_template_part( 'template-parts/footer/footer-widget', 'one' );
									}elseif( get_theme_mod( 'bosa_university_footer_widget_layout', 'footer_widget_layout_one' ) == 'footer_widget_layout_two' ){
										get_template_part( 'template-parts/footer/footer-widget', 'two' );
									}elseif( get_theme_mod( 'bosa_university_footer_widget_layout', 'footer_widget_layout_one' ) == 'footer_widget_layout_three' ){
										get_template_part( 'template-parts/footer/footer-widget', 'three' );
									}elseif( get_theme_mod( 'bosa_university_footer_widget_layout', 'footer_widget_layout_one' ) == 'footer_widget_layout_four' ){
										get_template_part( 'template-parts/footer/footer-widget', 'four' );
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
				endif;
			endif;
			?>
			<?php if( !get_theme_mod( 'bosa_university_disable_bottom_footer', false ) ) { ?>
				<?php if( get_theme_mod( 'bosa_university_footer_layout', 'footer_one' ) == '' || get_theme_mod( 'bosa_university_footer_layout', 'footer_one' ) == 'footer_one' ){
					get_template_part( 'template-parts/footer/footer', 'one' );
				}elseif( get_theme_mod( 'bosa_university_footer_layout', 'footer_one' ) == 'footer_two' ){
					get_template_part( 'template-parts/footer/footer', 'two' );
				}elseif( get_theme_mod( 'bosa_university_footer_layout', 'footer_one' ) == 'footer_three' ){
					get_template_part( 'template-parts/footer/footer', 'three' );
				}
			} ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<div id="back-to-top">
    <a href="javascript:void(0)"><i class="fa fa-angle-up"></i></a>
</div>
<!-- #back-to-top -->

</body>
</html>
