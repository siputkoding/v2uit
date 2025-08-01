<?php
$bosa_university_blog_instructor_one_ID = get_theme_mod( 'bosa_university_blog_instructor_one','' );
$bosa_university_blog_instructor_two_ID = get_theme_mod( 'bosa_university_blog_instructor_two','' );       
$bosa_university_blog_instructor_three_ID = get_theme_mod( 'bosa_university_blog_instructor_three','' );
$bosa_university_blog_instructor_four_ID = get_theme_mod( 'bosa_university_blog_instructor_four','' );
$bosa_university_blog_instructor_five_ID = get_theme_mod( 'bosa_university_blog_instructor_five','' );
$bosa_university_blog_instructor_six_ID = get_theme_mod( 'bosa_university_blog_instructor_six','' );

$bosa_university_instructor_array = array();
$bosa_university_has_instructor = false;
if( !empty( $bosa_university_blog_instructor_one_ID ) ){
	$bosa_university_blog_instructor_one  = wp_get_attachment_image_src( $bosa_university_blog_instructor_one_ID,'bosa-university-420-300');
 	if ( is_array(  $bosa_university_blog_instructor_one ) ){
 		$bosa_university_has_instructor = true;
   	 	$bosa_university_blog_instructor_one = $bosa_university_blog_instructor_one[0];
   	 	$bosa_university_instructor_array['image_one'] = array(
			'ID' => $bosa_university_blog_instructor_one,
		);	
  	}
}
if( !empty( $bosa_university_blog_instructor_two_ID ) ){
	$bosa_university_blog_instructor_two = wp_get_attachment_image_src( $bosa_university_blog_instructor_two_ID,'bosa-university-420-300');
	if ( is_array(  $bosa_university_blog_instructor_two ) ){
		$bosa_university_has_instructor = true;	
        $bosa_university_blog_instructor_two = $bosa_university_blog_instructor_two[0];
        $bosa_university_instructor_array['image_two'] = array(
			'ID' => $bosa_university_blog_instructor_two,
		);	
  	}
}
if( !empty( $bosa_university_blog_instructor_three_ID ) ){	
	$bosa_university_blog_instructor_three = wp_get_attachment_image_src( $bosa_university_blog_instructor_three_ID,'bosa-university-420-300');
	if ( is_array(  $bosa_university_blog_instructor_three ) ){
		$bosa_university_has_instructor = true;
      	$bosa_university_blog_instructor_three = $bosa_university_blog_instructor_three[0];
      	$bosa_university_instructor_array['image_three'] = array(
			'ID' => $bosa_university_blog_instructor_three,
		);	
  	}
}
if( !empty( $bosa_university_blog_instructor_four_ID ) ){	
	$bosa_university_blog_instructor_four = wp_get_attachment_image_src( $bosa_university_blog_instructor_four_ID,'bosa-university-420-300');
	if ( is_array(  $bosa_university_blog_instructor_four ) ){
		$bosa_university_has_instructor = true;
      	$bosa_university_blog_instructor_four = $bosa_university_blog_instructor_four[0];
      	$bosa_university_instructor_array['image_four'] = array(
			'ID' => $bosa_university_blog_instructor_four,
		);	
  	}
}
if( !empty( $bosa_university_blog_instructor_five_ID ) ){	
	$bosa_university_blog_instructor_five = wp_get_attachment_image_src( $bosa_university_blog_instructor_five_ID,'bosa-university-420-300');
	if ( is_array(  $bosa_university_blog_instructor_five ) ){
		$bosa_university_has_instructor = true;
      	$bosa_university_blog_instructor_five = $bosa_university_blog_instructor_five[0];
      	$bosa_university_instructor_array['image_five'] = array(
			'ID' => $bosa_university_blog_instructor_five,
		);	
  	}
}
if( !empty( $bosa_university_blog_instructor_six_ID ) ){	
	$bosa_university_blog_instructor_six = wp_get_attachment_image_src( $bosa_university_blog_instructor_six_ID,'bosa-university-420-300');
	if ( is_array(  $bosa_university_blog_instructor_six ) ){
		$bosa_university_has_instructor = true;
      	$bosa_university_blog_instructor_six = $bosa_university_blog_instructor_six[0];
      	$bosa_university_instructor_array['image_six'] = array(
			'ID' => $bosa_university_blog_instructor_six,
		);	
  	}
}

if( !get_theme_mod( 'bosa_university_disable_instructors_section', true ) && $bosa_university_has_instructor ) { ?>
	<section class="section-instructor-area">
		<?php if ( !empty( get_theme_mod( 'bosa_university_instructor_title', '' ) ) ) { ?>
		<h2 class="instructor-title">
			<?php echo esc_html( get_theme_mod( 'bosa_university_instructor_title', '' ) ); ?>
		</h2>

		<?php } ?>
		<div class="instructor-content-wrap">
			<div class="row justify-content-center instructor-row">
				<?php foreach( $bosa_university_instructor_array as $bosa_university_each_instructor ){ ?>
					<div class="col-sm-6 col-md-4 instructor-column">
						<figure class= "featured-image">
							<img src="<?php echo esc_url( $bosa_university_each_instructor['ID'] ); ?>">
						</figure>
					</div>
				<?php } ?>
			</div>	
		</div>	
	</section>
<?php }