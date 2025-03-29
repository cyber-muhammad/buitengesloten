<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pro-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php pro_theme_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		$content = get_the_content();
		$paragraphs = explode('</p>', $content);
		$total_paragraphs = count($paragraphs);
		
		// Check if we should display contact cards within content
		$display_contact_cards = false;
		
		// Method 1: Check for specific page IDs
		$contact_card_pages = array(
			// Add your page IDs here, e.g.: 123, 456, 789
		);
		
		if (in_array(get_the_ID(), $contact_card_pages)) {
			$display_contact_cards = true;
		}
		
		// Method 2: Check for ACF field (if you have one)
		if (function_exists('get_field') && get_field('display_contact_cards')) {
			$display_contact_cards = true;
		}
		
		// Method 3: Always display on specific page template
		// Uncomment this line if you want to use a specific template
		// if (is_page_template('template-with-contact-cards.php')) {
		//     $display_contact_cards = true;
		// }
		
		// Display the content with full-width sections after 2nd paragraph
		if ($total_paragraphs >= 2) {
			// Output first 2 paragraphs
			for ($i = 0; $i < 2; $i++) {
				echo $paragraphs[$i] . '</p>';
			}
			
			// Close the current containers to allow full width section
			echo '</div></article></div></div></div></main>';
			
			// Insert cities ACF section if it exists
			get_template_part('template-parts/template-cities-acf');
			
			// Insert contact cards if needed
			if ($display_contact_cards) {
				get_template_part('global-parts/contact-cards');
			}
			
			// Reopen the containers
			$post_classes = get_post_class('', get_the_ID());
			$class_string = implode(' ', $post_classes);
			echo '<main id="primary" class="site-main"><div class="container"><div class="row justify-content-center"><div class="col-xl-12"><article id="post-' . get_the_ID() . '" class="' . esc_attr($class_string) . '"><div class="entry-content">';
			
			// Output remaining paragraphs
			for ($i = 2; $i < $total_paragraphs; $i++) {
				echo $paragraphs[$i] . ($i < $total_paragraphs - 1 ? '</p>' : '');
			}
		} else {
			// Not enough paragraphs, just output the content
			echo $content;
		}
		
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pro-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'pro-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->