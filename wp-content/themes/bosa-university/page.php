<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bosa University
 */

get_header();
?>
<?php 
if( !get_theme_mod( 'bosa_university_disable_transparent_header_page', true ) && get_theme_mod( 'bosa_university_header_layout', 'header_one' ) == 'header_two' ){
	bosa_university_page_transparent_banner();
} ?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page">
			<?php if( get_theme_mod( 'bosa_university_disable_transparent_header_page', true ) || get_theme_mod( 'bosa_university_header_layout', 'header_one' ) != 'header_two' ){
				if( get_theme_mod( 'bosa_university_page_title_position', 'above_feature_image' ) == 'above_feature_image' ){
				bosa_university_page_title();
				}
				if( get_theme_mod( 'bosa_university_breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
					bosa_university_breadcrumb_wrap();
				}
			} ?>
			<div class="row">
				<?php
					if( !bosa_university_wooCom_is_cart() && !bosa_university_wooCom_is_checkout() && !bosa_university_wooCom_is_account_page() ){
						$bosa_university_sidebarClass = 'col-lg-8';
						$bosa_university_sidebarColumnClass = 'col-lg-4';
						if ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'right' ){
							if( !is_active_sidebar( 'right-sidebar') ){
								$bosa_university_sidebarClass = "col-12";
							}	
						}elseif ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'left' ){
							if( !is_active_sidebar( 'left-sidebar') ){
								$bosa_university_sidebarClass = "col-12";
							}	
						}elseif ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'right-left' ){
							$bosa_university_sidebarClass = 'col-lg-6';
							$bosa_university_sidebarColumnClass = 'col-lg-3';
							if( !is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
								$bosa_university_sidebarClass = "col-12";
							}
						}
						if ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'bosa_university_disable_sidebar_page', true ) ){
							$bosa_university_sidebarClass = 'col-12';
						}
						if( !get_theme_mod( 'bosa_university_disable_sidebar_page', true ) ){
							if ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'left' ){ 
								if( is_active_sidebar( 'left-sidebar') ){ ?>
									<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $bosa_university_sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'left-sidebar' ); ?>
									</div>
								<?php }
							}elseif ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'right-left' ){
								if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $bosa_university_sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'left-sidebar' ); ?>
									</div>
								<?php
								}
							}
						}
					}else{
						$bosa_university_sidebarClass = 'col-12';
					}
				?>
				<div id="primary" class="content-area <?php echo esc_attr( $bosa_university_sidebarClass ); ?>">
					<main id="main" class="site-main">
						<?php if( get_theme_mod( 'bosa_university_disable_transparent_header_page', true ) || get_theme_mod( 'bosa_university_header_layout', 'header_one' ) != 'header_two' ){
							if( has_post_thumbnail() ){
								if( get_theme_mod( 'bosa_university_page_feature_image', 'show_in_all_pages' ) == 'show_in_all_pages' || !is_front_page() && get_theme_mod( 'bosa_university_page_feature_image', 'show_in_all_pages' ) == 'disable_in_frontpage' || get_theme_mod( 'bosa_university_page_feature_image', 'show_in_all_pages' ) == 'show_in_frontpage' && is_front_page() ){ ?>
								    <figure class="feature-image single-feature-image">
								        <?php 
								        $bosa_university_render_pages_image_size 	= get_theme_mod( 'bosa_university_render_pages_image_size', 'bosa-university-1370-550' );
								        bosa_university_image_size( $bosa_university_render_pages_image_size ); ?>
								    </figure>
								<?php }else{
									// will disable in all pages
									echo '';
								}
							}
							if( get_theme_mod( 'bosa_university_page_title_position', 'above_feature_image' ) == 'below_feature_image' ){
								bosa_university_page_title();
							}
						} ?>
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php
					if( !bosa_university_wooCom_is_cart() && !bosa_university_wooCom_is_checkout() && !bosa_university_wooCom_is_account_page() ){
						if( !get_theme_mod( 'bosa_university_disable_sidebar_page', true ) ){
							if ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'right' ){ 
								if( is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary" class="sidebar right-sidebar <?php echo esc_attr( $bosa_university_sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'right-sidebar' ); ?>
									</div>
								<?php }
							}elseif ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'right-left' ){
								if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary-sidebar" class="sidebar right-sidebar <?php echo esc_attr( $bosa_university_sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'right-sidebar' ); ?>
									</div>
								<?php
								}
							}
						}
					}
				?>
			</div>
		</section>
	</div><!-- #container -->
</div><!-- #content -->	
<?php get_footer();
