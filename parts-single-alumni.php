<?php
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		$user_id = $curauth->ID; 
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
				$phone = get_cimyFieldValue($user_id, 'PHONE');
				$website = get_cimyFieldValue($user_id, 'WEBSITE');
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

<div class="row">
	<div class="four columns">
		<?php if(empty($photo) == false) { ?>
			<img src="<?php echo $photo; ?>" class="floatleft padding-five floatleft hide-for-small" />
		<?php } ?>
		<h4><?php echo get_the_author_meta( 'first_name', $user_id ) . ' ' . get_the_author_meta( 'last_name', $user_id ); ?><?php if(empty($year) == false ) { echo ' &#39;' . $year; } ?></h4>
			<?php if(empty($title) == false) { echo '<h6>' . $title . '</h6>'; } ?>
		<p class="listing">
			<?php if(empty($location) == false ) { ?>
				<span class="icon-location"></span><?php echo $location; ?><br>
			<?php } ?>

			<span class="icon-mail"></span><a href="mailto:<?php echo get_the_author_meta( 'user_email', $user_id ); ?>"><?php echo get_the_author_meta( 'user_email', $user_id ); ?></a>

			<?php if(empty($phone) == false ) { ?>
				<br><span class="icon-phone"></span><?php echo $phone; ?>
			<?php } ?>
			<?php if(empty($website) == false){ ?>
				<br><span class="icon-globe"></span><a href="<?php echo $website ?>">Website</a>
			<?php }  ?>
		</p>
	</div>
	<div class="eight columns">
	<h4>Background</h4>
	<p><?php if(empty($title) == false) { echo '<b>Professional Title:</b> ' . $title; } ?>
	<?php if(empty($field) == false) { echo '</br><b>Field:</b> ' . $field; } ?></p>
	<?php if(empty($job_description) == false) { echo wpautop($description); } ?>
	<?php if(empty($education) == false) { echo '<h4>Education</h4>';  echo wpautop($education); } ?>
	<?php if(empty($awards) == false) { echo '<h4>Awards, Honors, and Distinctions</h4>'; echo wpautop($awards); } ?>
	<h4>Project Information</h4>
	<p><?php if(empty($majors) == false) { echo '<b>Majors/Minors:</b> ' . $majors; } ?>
	<?php if(empty($subject) == false) { echo '</br><b>Subject:</b> ' . $subject; } ?>
	<?php if(empty($mentor) == false) { echo '</br><b>Mentor:</b> ' . $mentor; } if(empty($mentor_department) == false) { echo ' (' . $mentor_department . ')'; } ?></p>
	<?php if(empty($description) == false) {  echo wpautop($description); } ?>
	<?php if(empty($links) == false) { echo '<h4>Links and Other Information</h4>';  echo wpautop($links); } ?>
	<?php if(empty($downloads1) == false || empty($downloads2) == false || empty($downloads3) == false) { echo '<h4>Downloads</h4><ul>'; } ?>
	<?php if(empty($downloads1) == false ) { echo '<li><a href="' . $downloads1url . '">' . $downloads1 . '</a></li>'; } ?>
	<?php if(empty($downloads2) == false ) { echo '<li><a href="' . $downloads2url . '">' . $downloads2 . '</a></li>'; } ?>
	<?php if(empty($downloads3) == false ) { echo '<li><a href="' . $downloads3url . '">' . $downloads3 . '</a></li>'; } ?>
	<?php if(empty($downloads1) == false || empty($downloads2) == false || empty($downloads3) == false) { echo '</ul>'; } ?>

	</div>