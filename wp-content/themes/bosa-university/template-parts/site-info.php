<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa University
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-university' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		echo esc_html__( '. Powered by', 'bosa-university' );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bosa-university' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'bosa-university' ) );
		?>
	</a>
</div><!-- .site-info -->