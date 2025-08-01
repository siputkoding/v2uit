<?php
$bosa_university_info_one_title 	  = get_theme_mod( 'bosa_university_info_one_title', '' );
$bosa_university_info_one_content   = get_theme_mod( 'bosa_university_info_one_content', '' );

$bosa_university_info_two_title 	  = get_theme_mod( 'bosa_university_info_two_title', '' );
$bosa_university_info_two_content   = get_theme_mod( 'bosa_university_info_two_content', '' );

$bosa_university_info_three_title   = get_theme_mod( 'bosa_university_info_three_title', '' );
$bosa_university_info_three_content = get_theme_mod( 'bosa_university_info_three_content', '' );

$bosa_university_info_four_title    = get_theme_mod( 'bosa_university_info_four_title', '' );
$bosa_university_info_four_content  = get_theme_mod( 'bosa_university_info_four_content', '' );


$bosa_university_info_array = array();
$has_bosa_university_info = false;
if( !empty( $bosa_university_info_one_title) || !empty($bosa_university_info_one_content ) ){
	$has_bosa_university_info = true;
	$bosa_university_info_array['bosa_university_info_one'] = array(
		'title' => $bosa_university_info_one_title,
		'content' => $bosa_university_info_one_content,
	);
}
if( !empty($bosa_university_info_two_title) || !empty($bosa_university_info_two_content ) ){
	$has_bosa_university_info = true;
	$bosa_university_info_array['bosa_university_info_two'] = array(
		'title' => $bosa_university_info_two_title,
		'content' => $bosa_university_info_two_content,
	);
}
if( !empty( $bosa_university_info_three_title) || !empty($bosa_university_info_three_content) ){
	$has_bosa_university_info = true;
	$bosa_university_info_array['bosa_university_info_three'] = array(
		'title' => $bosa_university_info_three_title,
		'content' => $bosa_university_info_three_content,
	);
}
if( !empty( $bosa_university_info_four_title) || !empty($bosa_university_info_four_content) ){
	$has_bosa_university_info = true;
	$bosa_university_info_array['bosa_university_info_four'] = array(
		'title' => $bosa_university_info_four_title,
		'content' => $bosa_university_info_four_content,
	);
}

if( !get_theme_mod( 'bosa_university_disable_program_info_section', true ) && $has_bosa_university_info ){ ?>
	<section class="section-program-info-area">
		<div class="content-wrap">
			<div class="row justify-content-center">
				<?php foreach( $bosa_university_info_array as $each_bosa_university_info ){ ?>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<article class="info-content-wrap">					
							<div class="entry-content">
								<header class="entry-header">
									<h3 class="entry-title">
										<?php echo esc_html( $each_bosa_university_info['title'] ); ?>
									</h3>
									<p>
										<?php echo esc_html( $each_bosa_university_info['content'] ); ?>
									</p>
								</header>
							</div>
						</article>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } 