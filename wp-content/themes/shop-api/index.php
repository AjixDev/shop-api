<?php get_header(); ?>

<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>
<form id="category-filter">
	<label for="category">Select Category:</label>
	<select id="category" name="category">
		<option value="all">All Categories</option>
		<?php
		$data = shop_theme_fetch_api_data();
		$categories = $data['categories'];
		foreach ($categories as $category) {
			echo '<option value="' . esc_attr($category) . '">' . esc_html($category) . '</option>';
		}
		?>
	</select>
	<input type="submit" value="Filter">
</form>
<div id="api-results">
	<ul id="products-list">
		<!-- Products will be dynamically added here -->
	</ul>
</div>
<?php
if (have_posts()) {

	// Load posts loop.
	while (have_posts()) {
		the_post();

		get_template_part('template-parts/content/content', get_theme_mod('display_excerpt_or_full_post', 'excerpt'));
	}
} else {

	// If no content, include the "No posts found" template.
	get_template_part('template-parts/content/content-none');
}

get_footer();
