<?php
/**
 * Template Name: Province Template
 *
 * Template for displaying a province page.
 *
 * @package Understrap
 */

// Exit if accessed directly.s
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod('understrap_container_type');
?>
<?php get_template_part( 'global-parts/hero-page'); ?>

<div class="main">
<?php get_template_part('template-parts/content', 'cities-section'); ?>

</div>

<?php
get_footer();