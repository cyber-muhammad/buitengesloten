<?php
/**
 * Template Name: Home page
 *
 * Template for displaying a blank page.
 *
 * @package Understrap
 */

// Exit if accessed directly.s
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod('understrap_container_type');
?>
<?php get_template_part( 'global-parts/hero'); ?>

<div class="main">
<?php get_template_part( 'global-parts/content'); ?>
<?php get_template_part('global-parts/services'); ?>
<?php get_template_part('global-parts/regios'); ?>
<?php get_template_part('global-parts/faq'); ?>
<?php get_template_part('global-parts/cta'); ?>

</div>

<?php
get_footer();