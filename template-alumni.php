<?php
/*
Template Name: Alumni Directory
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section>
		<h2>Alumni Network</h2>
		
		<section class="row" id="fields_container">
		<?php if( is_user_logged_in() == true ) { ?>
		<div id="fields_search" class="twelve columns">
			<form action="#">
				<fieldset class="radius10">
					<div class="row">		
						<input type="submit" class="icon-search" placeholder="Search by name, state, field, or keyword" value="&#xe004;" />
						<input type="text" name="search" id="id_search"  /> 
					</div>
				</fieldset>
			</form>	
		</div>
		<ul class="twelve columns" id="directory">

		<?php 
		//Get only the alumni entries
		$fellows = get_cimyFieldValue(false, 'MEMBERSHIP_TYPE', 'Alumni');
		
		//Add the last name to the arrays
		$tmp = Array();
			foreach ($fellows as $fellow) {
				$user_id = $fellow['user_id']; 
				$sorter = get_the_author_meta( 'last_name', $user_id );
				$fellow['last_name'] = $sorter;
				$tmp[] = $sorter;
			}
		
		//Sort full array by temp last name array			
			array_multisort($tmp, $fellows);
			
		//Get appropriate values for display	
			foreach ($fellows as $fellow) {
				$user_id = $fellow['user_id']; 
				$photo = get_cimyFieldValue($user_id, 'USER_PHOTO');
				$year = get_cimyFieldValue($user_id, 'GRADUATION_YEAR');
				$phone = get_cimyFieldValue($user_id, 'PHONE');
				$website = get_cimyFieldValue($user_id, 'WEBSITE');
				$title = get_cimyFieldValue($user_id, 'TITLE');
				$field = get_cimyFieldValue($user_id, 'FIELD');
				$location = get_cimyFieldValue($user_id, 'LOCATION');
				
?>
				<li class="person">
					<div class="row">
						<div class="twelve columns">
						<a href="<?php echo get_author_posts_url($user_id);?>">
							<?php if(empty($photo) == false) { ?>
							    <img src="<?php echo $photo; ?>" class="floatleft padding-five floatleft hide-for-small" />
							<?php } ?>
							<h4><?php echo get_the_author_meta( 'first_name', $user_id ) . ' ' . get_the_author_meta( 'last_name', $user_id ); ?><?php if(empty($year) == false ) { echo ' &#39;' . $year; } ?></h4>
							<h6><?php if(empty($title) == false) { echo $title; } ?></h6>
							<?php if(empty($field) == false) { echo '<p><b>Field:</b> ' . $field . '</p>'; } ?>
							</a>
							<p class="contact no-margin">
								<?php if(empty($location) == false ) { ?>
								<span class="icon-location"></span><?php echo $location; ?>
								<?php } ?>
								<span class="icon-mail"></span><a href="mailto:<?php echo get_the_author_meta( 'user_email', $user_id ); ?>"><?php echo get_the_author_meta( 'user_email', $user_id ); ?></a>
								<?php if(empty($phone) == false ) { ?>
								    <span class="icon-phone"></span><?php echo $phone; ?>
								<?php } ?>
								<?php if(empty($website) == false){ ?>
								    <span class="icon-globe"></span><a href="<?php echo $website ?>">Website</a>
								<?php }  ?>
							</p>
						
						</div>
						
					</div>
				</li>	
		<?php } ?>
		</ul>
		<?php } else { echo '<p>You must be logged in to view this content.&nbsp;<b>'; add_modal_login_button( $login_text = 'Click Here to Login', $logout_text = 'Logout', $logout_url = '', $show_admin = true ); echo '</b></p>'; } ?>
		</section>
		</section>
	</div>	<!-- End main content (left) section -->
</div> 
<?php get_footer(); ?> 