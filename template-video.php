<?php
/**
* Template name: Video Template
*/
?>

<?php get_header(); ?>


<video autoplay loop class="bg-vid">
	<source src="<?php echo get_template_directory_uri();?>/video/video.mp4" type="video/mp4">
</video>


<div class="vid-qr" style="height: 100px; width: 100px; background: url('img/qr.png'); background-color: green; visibility: hidden; position: absolute;"></div>
<?php get_footer(); ?>