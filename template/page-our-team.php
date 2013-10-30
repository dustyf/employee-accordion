<?php
/**
 * Template Name: Our Team Page
 *
 * This is a default template you can use to display the employee accordion
 */

get_header(); ?>

		<div id="container" class="one-column">
			<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				
			<?php endwhile; // end of the loop. ?>
			
			
			<?php if(get_field('br_team_members')): ?>
				<div id="va-accordion" class="va-container">
					<div class="va-wrapper">
						<?php while(has_sub_field('br_team_members')): ?>
							<?php if (get_sub_field('br_team_photo')) { ?>
								<?php 
									$image = get_sub_field('br_team_photo');
									/* $imgurl = wp_get_attachment_image_src( $attachment_id, 'our-team' ) */;
								?>
								<!-- <?php print_r($image); ?> -->
								<div class="va-slice" style="background:url(<?php echo $image['sizes']['our-team']; ?>) no-repeat left center;">
							<?php } else { ?>
								<div class="va-slice">
							<?php } ?>
									<h3 class="va-title"><?php the_sub_field('br_team_name'); ?></h3>
									<div class="va-content">
										<?php the_sub_field('br_team_bio'); ?>
									</div>
								</div>
												
						<?php endwhile; ?>
						<?php 
								$rows = get_field('br_team_members'); 
								foreach($rows as $row): $count++;
								endforeach;
								
								//Declare the image height
								$sliceheight = 150;
								$accordianheight = $sliceheight * $count;
							?>
							<script type="text/javascript">
								jQuery(function() {
									jQuery('#va-accordion').vaccordion({
										accordionW      : jQuery('#va-accordion').width(),
										accordionH      : <?php echo $accordianheight ?>,
										visibleSlices   : <?php echo $count; ?>
									});
								});
							</script>
					</div>
				</div>
 
			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>
