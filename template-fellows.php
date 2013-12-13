<?php
/*
Template Name: Fellows Directory
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section>
		<h2>Current Fellows</h2>
		<section class="row" id="fields_container">
		<div id="fields_search" class="twelve columns">
			<form action="#">
				<fieldset class="radius10">
					<div class="row">		
						<input type="submit" class="icon-search" placeholder="Search by name, division, major, or keyword" value="&#xe004;" />
						<input type="text" name="search" id="id_search"  /> 
					</div>
				</fieldset>
			</form>	
		</div>
		<ul class="twelve columns" id="directory">

		<?php $fellows = get_cimyFieldValue(false, 'MEMBERSHIP_TYPE', 'Current Fellow');
		
		//Add the last name to the arrays and create temp array for sorting
		$tmp = Array();
			foreach ($fellows as $fellow) {
				$user_id = $fellow['user_id']; 
				$sorter = get_the_author_meta( 'last_name', $user_id );
				$fellow['last_name'] = $sorter;
				$tmp[] = $sorter;
			}
		
		//Sort full array by temp last name array			
			array_multisort($tmp, $fellows);			
			
			foreach ($fellows as $fellow) {
				$user_id = $fellow['user_id']; 
				$photo = get_cimyFieldValue($user_id, 'USER_PHOTO');
				$majors = get_cimyFieldValue($user_id, 'MAJORS');
				$phone = get_cimyFieldValue($user_id, 'PHONE');
				$website = get_cimyFieldValue($user_id, 'WEBSITE');
				$division = get_cimyFieldValue($user_id, 'DIVISION');
				$subject = get_cimyFieldValue($user_id, 'SUBJECT');
?>
				<li class="person">
					<div class="row">
						<div class="twelve columns">
						<a href="<?php echo get_author_posts_url($user_id);?>">
							<?php if(empty($photo) == false) { ?>
							    <img src="<?php echo $photo; ?>" class="floatleft padding-five floatleft hide-for-small" />
							<?php } ?>
							<h4><?php echo get_the_author_meta( 'first_name', $user_id ) . ' ' . get_the_author_meta( 'last_name', $user_id ); ?></h4>
							<h6><?php if(empty($majors) == false) { echo $majors; } if(empty($division) == false) { echo ', ' . $division; ?></h6><?php } ?>
							<?php if(empty($subject) == false) { echo '<p><b>Subject:</b> ' . $subject . '</p>'; } ?>
						</a>
							<p class="contact no-margin">
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
		</section>
		</section>
	</div>	<!-- End main content (left) section -->
</div> 
<?php get_footer(); ?> 