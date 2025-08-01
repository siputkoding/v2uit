<?php
$bosa_university_page_one 	= get_theme_mod( 'bosa_university_testimonials_one', '' );
$bosa_university_page_two 	= get_theme_mod( 'bosa_university_testimonials_two', '' );
$bosa_university_page_three = get_theme_mod( 'bosa_university_testimonials_three', '' ); 
$bosa_university_page_four  = get_theme_mod( 'bosa_university_testimonials_four', '' ); 

$bosa_university_page_array = array();
$bosa_university_has_page = false;
if( !empty( $bosa_university_page_one ) ){
	$bosa_university_has_page = true;
	$bosa_university_page_array['page_one'] = array(
		'ID' => $bosa_university_page_one,
	);
}
if( !empty( $bosa_university_page_two ) ){
	$bosa_university_has_page = true;
	$bosa_university_page_array['page_two'] = array(
		'ID' => $bosa_university_page_two,
	);
}
if( !empty( $bosa_university_page_three ) ){
	$bosa_university_has_page = true;
	$bosa_university_page_array['page_three'] = array(
		'ID' => $bosa_university_page_three,
	);
}
if( !empty( $bosa_university_page_four ) ){
	$bosa_university_has_page = true;
	$bosa_university_page_array['page_four'] = array(
		'ID' => $bosa_university_page_four,
	);
}

if( !get_theme_mod( 'bosa_university_disable_testimonials_section', true ) && $bosa_university_has_page ){ ?>
	<section class="section-testimonial-area">
		<div class="row justify-content-center">
			<?php foreach( $bosa_university_page_array as $bosa_university_each_page ){ ?>
				<div class="col-sm-12 col-md-6">
					<article class="testimonial-item">
						<figure class= "featured-image">
							<?php echo get_the_post_thumbnail( $bosa_university_each_page[ 'ID' ], 'bosa-university-420-300' ); ?>
						</figure>
						<div class="entry-content">
							<h3 class="entry-title">
								<a href="<?php echo esc_url( get_permalink( $bosa_university_each_page[ 'ID' ] ) ); ?>">
									<?php echo esc_html( get_the_title( $bosa_university_each_page[ 'ID' ] ) ); ?>
								</a>
							</h3>		
							<div class="entry-text">
								<p>
									<?php 
									$bosa_university_excerpt = get_the_excerpt( $bosa_university_each_page[ 'ID' ] );
									$bosa_university_result  = wp_trim_words( $bosa_university_excerpt, 20, '' );
									echo esc_html( $bosa_university_result );
									?>
								</p>
								<span class="testimonial-quote-icon">
									<i class="fas fa-quote-right"></i>
								</span>
							</div>
						</div>
					</article>
				</div>
			<?php } ?>	
		</div>
	</section>
<?php } ?>