<?php get_header(); ?>

<body>
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
    <div id="q-app">
        <product-list :products="filteredProducts"></product-list>
        <quasar-vue-component :products="products"></quasar-vue-component>
        <?php
        // Check if the shortcode function exists
        if (function_exists('render_quasar_vue_shortcode')) {
            echo do_shortcode('[quasar_vue_shortcode]');
        }
        ?>
    </div>

    <script>
        // Handle category filter form submission
        document.getElementById('category-filter').addEventListener('submit', function(event) {
            event.preventDefault();

            var selectedCategory = document.getElementById('category').value;

            // Make an AJAX request to your WordPress plugin's API endpoint
            fetch('<?php echo esc_url(admin_url("admin-ajax.php")); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=filter_products&category=' + selectedCategory,
                })
                .then(response => response.json())
                .then(data => {
                    // Update the UI with filtered products using Vue.js
                    app.products = data.products;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        const app = Vue.createApp({
            data() {
                return {
                    products: [], // Initialize an empty array for products
                };
            },
        });

        // Include Quasar JavaScript components
        app.use(window.Quasar);

        app.mount('#q-app');
    </script>