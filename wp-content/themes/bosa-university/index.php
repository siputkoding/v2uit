<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bosa University
 */

get_header();
?>
	<?php
	if( is_home() && !get_theme_mod( 'bosa_university_disable_main_slider', false ) ){
		if ( get_theme_mod( 'bosa_university_main_slider_controls', 'slider' ) == 'slider' ){
			if ( get_theme_mod( 'bosa_university_display_main_slider_on', 'below_header' ) == 'below_header' ){
				?>
				<section class="section-banner">
					<?php 
						get_template_part( 'template-parts/slider/slider', '' ); 
					?>
				</section>
				<?php
			}
		}elseif( get_theme_mod( 'bosa_university_main_slider_controls', 'slider' ) == 'banner' ){
			if ( get_theme_mod( 'bosa_university_display_banner_on', 'below_header' ) == 'below_header' ){
				bosa_university_banner();
			}
		}
	} ?>
	<div id="content" class="site-content">
		<div class="container">
			<?php
			//Feature Posts Section
			if( get_theme_mod( 'bosa_university_feature_posts_section_layouts', 'feature_one' ) == '' || get_theme_mod( 'bosa_university_feature_posts_section_layouts', 'feature_one' ) == 'feature_one' ){
				get_template_part( 'template-parts/feature-posts/feature-posts', 'one' );
			} ?>

			<?php
			if( is_home() && !get_theme_mod( 'bosa_university_disable_main_slider', false ) ){
				if ( get_theme_mod( 'bosa_university_main_slider_controls', 'slider' ) == 'slider' ){
					if ( get_theme_mod( 'bosa_university_display_main_slider_on', 'below_header' ) == 'below_featured_posts' ){
						?>
						<section class="section-banner">
							<?php 
								get_template_part( 'template-parts/slider/slider', '' ); 
							?>
						</section>
						<?php
					}
				}elseif( get_theme_mod( 'bosa_university_main_slider_controls', 'slider' ) == 'banner' ){
					if ( get_theme_mod( 'bosa_university_display_banner_on', 'below_header' ) == 'below_featured_posts' ){
						bosa_university_banner();
					}
				}
			} ?>

			<!--Blog Instructor-->
			<?php get_template_part( 'template-parts/instructors/instructors' ); ?>

			<!--Blog Program Info-->
			<?php get_template_part( 'template-parts/program_info/program_info' ); ?>

			<!--Blog Testimonials-->
			<?php get_template_part( 'template-parts/testimonials/testimonials' ); ?>

			<!-- Latest Posts Section -->
			<?php 
				$bosa_university_latest_posts_category = get_theme_mod( 'bosa_university_latest_posts_category', '' );
				$bosa_university_archive_post_per_page = get_theme_mod( 'bosa_university_archive_post_per_page', 10 );
				$bosa_university_query = new WP_Query( apply_filters( 'bosa_university_blog_args', array(
					'post_type'           => 'post',
					'post_status'         => 'publish',
					'cat'                 => $bosa_university_latest_posts_category,
					'paged'          	  => get_query_var( 'paged', 1 ), 
					'posts_per_page'      => $bosa_university_archive_post_per_page,
				)));
				$bosa_university_posts_array = $bosa_university_query->get_posts();
				$bosa_university_show_latest_posts = count( $bosa_university_posts_array ) > 0;
				if( !get_theme_mod( 'bosa_university_disable_latest_posts_section', false ) && $bosa_university_show_latest_posts ){
					$bosa_university_latest_title_desc_align = get_theme_mod( 'bosa_university_latest_posts_section_title_desc_alignment', 'left' );
				if ( $bosa_university_latest_title_desc_align == 'left' ){
					$bosa_university_latest_title_desc_align = 'text-left';
				}else if ( $bosa_university_latest_title_desc_align == 'center' ){
					$bosa_university_latest_title_desc_align = 'text-center';
				}else{
					$bosa_university_latest_title_desc_align = 'text-right';
				} ?>
				<section class="section-post-area">
					<div class="row">
						<?php
							$bosa_university_sidebarClass = 'col-lg-8';
							$bosa_university_sidebarColumnClass = 'col-lg-4';
							$bosa_university_masonry_class = '';

							if( get_theme_mod( 'bosa_university_archive_post_layout', 'list' ) == 'grid'){
								$bosa_university_masonry_class = 'masonry-wrapper';
							}
							if( get_theme_mod( 'bosa_university_archive_post_layout', 'list' ) == 'grid' ){
								$bosa_university_layout_class = 'grid-post-wrap';
							}elseif( get_theme_mod( 'bosa_university_archive_post_layout', 'list' ) == 'single' ){
								$bosa_university_layout_class = 'single-post';
							}
							if ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'right' ){
								if( get_theme_mod( 'bosa_university_archive_post_layout', 'list' ) == 'grid'){
									if( !is_active_sidebar( 'right-sidebar') ){
										$bosa_university_sidebarClass = "col-12";
									}	
								}else{
									if( !is_active_sidebar( 'right-sidebar') ){
										$bosa_university_sidebarClass = "col-lg-8 offset-lg-2";
									}
								}
							}elseif ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'left' ){
								if( get_theme_mod( 'bosa_university_archive_post_layout', 'list' ) == 'grid'){
									if( !is_active_sidebar( 'left-sidebar') ){
										$bosa_university_sidebarClass = "col-12";
									}	
								}else{
									if( !is_active_sidebar( 'left-sidebar') ){
										$bosa_university_sidebarClass = "col-lg-8 offset-lg-2";
									}
								}
							}elseif ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'right-left' ){
								$bosa_university_sidebarClass = 'col-lg-6';
								$bosa_university_sidebarColumnClass = 'col-lg-3';
								if( get_theme_mod( 'bosa_university_archive_post_layout', 'list' ) == 'grid'){
									if( !is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
										$bosa_university_sidebarClass = "col-12";
									}	
								}else{
									if(!is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
										$bosa_university_sidebarClass = "col-lg-8 offset-lg-2";
									}
								}
							}
							if ( get_theme_mod( 'bosa_university_sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'bosa_university_disable_sidebar_blog_page', false ) ){
								if( get_theme_mod( 'bosa_university_archive_post_layout', 'list' ) == 'grid'){
									$bosa_university_sidebarClass = "col-12";	
								}else{
									$bosa_university_sidebarClass = 'col-lg-8 offset-lg-2';
								}
							}
							if( !get_theme_mod( 'bosa_university_disable_sidebar_blog_page', false ) ){
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
							} ?>
						
						<div id="primary" class="content-area <?php echo esc_attr( $bosa_university_sidebarClass ); ?>">
							<?php if( ( !get_theme_mod( 'bosa_university_disable_latest_posts_section_title', true ) && get_theme_mod( 'bosa_university_latest_posts_section_title', '' ) ) || ( !get_theme_mod( 'bosa_university_disable_latest_posts_section_description', true ) && get_theme_mod( 'bosa_university_latest_posts_section_description', '' ) ) ){ ?>
								<div class="section-title-wrap <?php echo esc_attr( $bosa_university_latest_title_desc_align ); ?>">
									<?php if( !get_theme_mod( 'bosa_university_disable_latest_posts_section_title', true ) && get_theme_mod( 'bosa_university_latest_posts_section_title', '' ) ){ ?>
										<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'bosa_university_latest_posts_section_title', '' ) ); ?></h2>
									<?php } 
									if( !get_theme_mod( 'bosa_university_disable_latest_posts_section_description', true ) && get_theme_mod( 'bosa_university_latest_posts_section_description', '' ) ){ ?>
										<p><?php echo esc_html( get_theme_mod( 'bosa_university_latest_posts_section_description', '' ) ); ?></p>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="row <?php echo esc_attr( $bosa_university_masonry_class ); ?>">
							<?php
							if ( $bosa_university_query->have_posts() ) :

								if ( is_home() && !is_front_page() ) :
									?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
									<?php
								endif;

								/* Start the Loop */
								while ( $bosa_university_query->have_posts() ) :
									$bosa_university_query->the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

							elseif ( !is_sticky() && ! $bosa_university_query->have_posts() ):
								get_template_part( 'template-parts/content', 'none' );
							endif;
							?>
							</div><!-- #main -->
							<?php
								if( !get_theme_mod( 'bosa_university_disable_pagination', false ) ):
									the_posts_pagination( array(
										'total'        => $bosa_university_query->max_num_pages,
										'next_text' => '<span>'.esc_html__( 'Next', 'bosa-university' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Next page', 'bosa-university' ) . '</span>',
										'prev_text' => '<span>'.esc_html__( 'Prev', 'bosa-university' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'bosa-university' ) . '</span>',
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'bosa-university' ) . ' </span>',
									));
								endif;
								wp_reset_postdata();
							?>
						</div><!-- #primary -->
						<?php
							if( !get_theme_mod( 'bosa_university_disable_sidebar_blog_page', false ) ){
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
						?>
					</div>
				</section>
			<?php } ?>

			<?php 
			//Highlight Posts Section
			if( get_theme_mod( 'bosa_university_highlight_posts_section_layouts', 'highlighted_one' ) == '' || get_theme_mod( 'bosa_university_highlight_posts_section_layouts', 'highlighted_one' ) == 'highlighted_one' ){ 
				get_template_part( 'template-parts/highlight-posts/highlight-posts', 'one' ); 
			}elseif( get_theme_mod( 'bosa_university_highlight_posts_section_layouts', 'highlighted_one' ) == 'highlighted_two' ){
				get_template_part( 'template-parts/highlight-posts/highlight-posts', 'two' ); 
			} ?>
		</div><!-- #container -->
	</div><!-- #content -->
<?php
get_footer();