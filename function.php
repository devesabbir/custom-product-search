function custom_product_search_form() {
    // Get all product categories
    $categories = get_terms(array(
        'taxonomy' => 'product_cat', // For WooCommerce products
        'hide_empty' => false,
    ));

    // Start the form
    $form = '<form role="search" method="get" class="amazon-like-search-form" action="' . esc_url(home_url('/')) . '">
                <div class="search-container">
                    <div class="category-dropdown">
                        <select name="product_cat" id="category">';

    // Add category options (without "All Categories")
    foreach ($categories as $category) {
        $form .= '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
    }

    // Add search input and icon button
    $form .= '</select>
                    </div>
                    <div class="search-input-wrapper">
                        <input type="text" name="s" id="search" placeholder="Enter product name or keyword">
                    </div>
                    <div class="search-button">
                        <button type="submit">
                            <i class="fas fa-search"></i> <!-- FontAwesome search icon -->
                        </button>
                    </div>
                    <input type="hidden" name="post_type" value="product"> <!-- Limit search to products -->
                </div>
            </form>';

    return $form;
}

// Shortcode to display the form
add_shortcode('custom_product_search', 'custom_product_search_form');

function enqueue_fontawesome() {
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_fontawesome');