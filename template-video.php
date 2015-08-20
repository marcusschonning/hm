<?php
/**
* Template name: Video Template
*/
?>

<?php get_header(); ?>


<video autoplay loop class="bg-vid">
	<source src="<?php echo get_template_directory_uri();?>/video/video.mp4" type="video/mp4">
</video>

<?php get_footer(); ?>