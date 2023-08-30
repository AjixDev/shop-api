<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="q-app">
		<div id="page" class="site">

			<a class="skip-link screen-reader-text" href="#content">
				<?php
				/* translators: Hidden accessibility text. */
				esc_html_e('Skip to content', 'shopapi');
				?>
			</a>
			<q-btn id="cart" round color="primary" icon="shopping_cart" class="row justify-end"><?php  ?></q-btn>
			<?php get_template_part('template-parts/header/site-header'); ?>

			<div id="content" class="site-content">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">