</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->


<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="site-name">Shop API</div>

		<div class="powered-by">
			<?php
			printf(
				/* translators: %s: WordPress. */
				esc_html__('Proudly powered by %s.', 'twentytwentyone'),
				'<a href="' . esc_url(__('https://wordpress.org/', 'twentytwentyone')) . '">WordPress</a>'
			);
			?>
		</div><!-- .powered-by -->

	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>