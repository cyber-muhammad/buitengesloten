<?php
/**
 * Template Name: Pricing page
 *
 * Template for displaying a pricing page.
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
<?php get_template_part( 'global-parts/tarieven'); ?>


</div>

<?php
get_footer();