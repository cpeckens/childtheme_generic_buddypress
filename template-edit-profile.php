 <?php
/*
Template Name: Edit Profile
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section>
		<h2>Edit Profile</h2>
		
			<?php 
				$user_id = get_current_user_id();
			
			if (isset($_REQUEST['action'])) {	
				foreach($_POST as $label => $value) {
					set_cimyFieldValue($user_id, $label, $value);
					
				}
			} 
			
		    if ( !empty( $_POST['EMAIL'] ) ) {
		        update_usermeta( $current_user->id, 'user_email', esc_attr( $_POST['EMAIL'] ) ); }
		    if ( !empty( $_POST['FIRSTNAME'] ) ) {
		        update_usermeta( $current_user->id, 'first_name', esc_attr( $_POST['FIRSTNAME'] ) );}
		    if ( !empty( $_POST['LASTNAME'] ) ) {
		        update_usermeta( $current_user->id, 'first_name', esc_attr( $_POST['LASTNAME'] ) ); }

    
				$firstname = get_the_author_meta( 'first_name', $user_id );
				$lastname = get_the_author_meta( 'last_name', $user_id );
				$email = get_the_author_meta( 'user_email', $user_id );
				$photo = get_cimyFieldValue($user_id, 'USER_PHOTO');
				$year = get_cimyFieldValue($user_id, 'GRADUATION_YEAR');
				$phone = get_cimyFieldValue($user_id, 'PHONE');
				$website = get_cimyFieldValue($user_id, 'WEBSITE');
				$location = get_cimyFieldValue($user_id, 'LOCATION');
				$title = get_cimyFieldValue($user_id, 'TITLE');
				$field = get_cimyFieldValue($user_id, 'FIELD');
				$job_description = get_cimyFieldValue($user_id, 'JOB_DESCRIPTION');
				$education = get_cimyFieldValue($user_id, 'EDUCATION');
				$awards = get_cimyFieldValue($user_id, 'AWARDS');
				$majors = get_cimyFieldValue($user_id, 'MAJORS');
				$mentor = get_cimyFieldValue($user_id, 'MENTOR');
				$mentor_department = get_cimyFieldValue($user_id, 'MENTOR_DEPARTMENT');
				$subject = get_cimyFieldValue($user_id, 'SUBJECT');
				$division = get_cimyFieldValue($user_id, 'DIVISION');
				$description = get_cimyFieldValue($user_id, 'PROJECT_DESCRIPTION');
				$links = get_cimyFieldValue($user_id, 'LINKS');
				$downloads1 = get_cimyFieldValue($user_id, 'DOWNLOAD1_TITLE');
				$downloads2 = get_cimyFieldValue($user_id, 'DOWNLOAD2_TITLE');
				$downloads3 = get_cimyFieldValue($user_id, 'DOWNLOAD3_TITLE');
				$downloads1url = get_cimyFieldValue($user_id, 'DOWNLOAD1_FILE');
				$downloads2url = get_cimyFieldValue($user_id, 'DOWNLOAD2_FILE');
				$downloads3url = get_cimyFieldValue($user_id, 'DOWNLOAD3_FILE');
		?>
			
			<form id="profile_update" method="post" action="<?php echo get_bloginfo('url'); ?>/edit-profile">
			<fieldset>
				<legend>Personal & Contact Information</legend>
				<label for="FIRSTNAME">First Name:</label><input type="text" name="FIRSTNAME" value="<?php echo $firstname; ?>" />
				<label for="LASTNAME">Last Name:</label><input type="text" name="LASTNAME" value="<?php echo $lastname; ?>" />
				<label for="EMAIL">Email:</label><input type="text" name="EMAIL" value="<?php echo $email; ?>" />
				<label for="GRADUATION_YEAR">Graduation Year:</label><input type="text" name="GRADUATION_YEAR" value="<?php echo $year; ?>" />
				<label for="LOCATION">Location:</label><input type="text" name="LOCATION" value="<?php echo $location; ?>" />
				<label for="PHONE">Phone:</label><input type="text" name="PHONE" value="<?php echo $phone; ?>" />
				<label for="WEBSITE">Website</label><input type="text" name="WEBSITE" value="<?php echo $website; ?>" />
			</fieldset>
			
			<fieldset>
				<legend>Employment/Background Information</legend>
				<label for="TITLE">Professional Title:</label><input type="text" name="TITLE" value="<?php echo $tile; ?>" />
				<label for="FIELD">Current Professional/academic field:</label><input type="text" name="FIELD" value="<?php echo $field; ?>" />
				<label for="JOB_DESCRIPTION">Short description of current work:</label><?php wp_editor( $job_description, 'textarea_job_description', $settings = array('media_buttons' => false, 'textarea_name' => 'JOB_DESCRIPTION')); ?>
				<label for="EDUCATION">Degrees/Institutions of study:</label><?php wp_editor( $education, 'textarea_job_description', $settings = array('media_buttons' => false, 'textarea_name' => 'EDUCATION')); ?>
				<label for="AWARDS">Other scholarships, honors, or distinctions received:</label><?php wp_editor( $awards, 'textarea_job_description', $settings = array('media_buttons' => false, 'textarea_name' => 'AWARDS')); ?>
			</fieldset>
			
			<fieldset>
				<legend>Woodrow Wilson Project Information</legend>
				<label for="MENTOR">Mentor's Name:</label><input type="text" name="MENTOR" value="<?php echo $mentor; ?>" />
				<label for="MENTOR_DEPARTMENT">Mentor's Department:</label><input type="text" name="MENTOR_DEPARTMENT" value="<?php echo $mentor_department; ?>" />
				<label for="SUBJECT">Project Subject:</label><input type="text" name="SUBJECT" value="<?php echo $subject; ?>" />
				<label for="DIVISION">Project Division:</label>
					<input type="radio" name="DIVISION" value="Natural Sciences" <?php if($division == 'Natural Sciences') { echo 'checked';} ?> /> Natural Sciences
					<input type="radio" name="DIVISION" value="Social Sciences" <?php if($division == 'Social Sciences') { echo 'checked';} ?> /> Social Sciences
					<input type="radio" name="DIVISION" value="Humanities" <?php if($division == 'Humaninites') { echo 'checked';} ?> /> Humanities
				<label for="PROJECT_DESCRIPTION">Project Description:</label><?php wp_editor( $description, 'textarea_project_description', $settings = array('media_buttons' => false, 'textarea_name' => 'PROJECT_DESCRIPTION')); ?>
			</fieldset>
			
			<fieldset>
				<legend>Additional Materials/Resources</legend>
				<label for="LINKS">Links to articles:</label><?php wp_editor( $links, 'textarea_linka', $settings = array('media_buttons' => false, 'textarea_name' => 'LINKS')); ?>

			
			
				<input type="hidden" name="action" value="save_changes" />
				<input type="submit" value="Save Changes" />
				</form>
			</fieldset>
		</section>
	</div>	<!-- End main content (left) section -->
</div> 
<?php get_footer(); ?> 