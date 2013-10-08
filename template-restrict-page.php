<?php
/*
Template Name: Restrict Page (Force Login)
*/
?>

<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section>
				<h2><?php the_title();?></h2>
<?php if( is_user_logged_in() == true ) { ?>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="floatleft">
							<?php the_post_thumbnail('full',array('class'	=> "radius-topright")); ?>
						</div>
					<?php } ?>
				<?php the_content(); ?>
<?php } else { echo '<p>You must be logged in to view this content.&nbsp;<b>'; add_modal_login_button( $login_text = 'Click Here to Login', $logout_text = 'Logout', $logout_url = '', $show_admin = true ); echo '</b></p>'; } ?>
		</section>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>	
</div> 
<?php get_footer(); ?> 