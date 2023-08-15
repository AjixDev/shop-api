<script>
    var productsData = <?php echo json_encode($data['products']); ?>;
</script>

<script src="<?php echo get_template_directory_uri(); ?>/path/to/vue-quasar-template.js"></script>

<?php wp_footer(); ?>