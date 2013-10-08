<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section>
		<?php 
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		$author_id = $curauth->ID; 
		$membership = get_cimyFieldValue($author_id, 'MEMBERSHIP_TYPE');
			if ($membership == 'Fellow' || $membership == 'Current Fellow') {
				locate_template('parts-single-fellow.php', true, false);
			} elseif ($membership =='Alumni') {
				locate_template('parts-single-alumni.php', true, false);
			} else { ?>
				<h2>No member type assigned</h2>
			<?php }
		?>
		</section>
	</div>	<!-- End main content (left) section -->
</div> 
<?php get_footer(); ?> 