<?php
/**
* Template name: Video Template
*/
?>

<?php get_header(); ?>


<video autoplay loop class="bg-vid">
	<source src="<?php echo get_template_directory_uri();?>/video/video.mp4" type="video/mp4">
</video>


<div class="vid-qr" style="height: 100px; width: 100px; background: url('<?php echo get_template_directory_uri() ?>/img/qr.png'); background-color: green; opacity: 0; position: absolute; transition: opacity 200ms;"></div>
<?php get_footer(); ?>