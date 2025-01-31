function custom_product_search_form() {
    // Get all product categories
    $categories = get_terms(array(
        'taxonomy' => 'product_cat', // For WooCommerce products
        'hide_empty' => false,
    ));

    // Start the form
    $form = '<form role="search" method="get" class="inline-search-form" action="' . esc_url(home_url('/')) . '">
                <div class="inline-search-container">
                    <div class="inline-search-field category-field">
               
                        <select name="product_cat" id="category">
                            <option value="">All</option>';

    // Add category options
    foreach ($categories as $category) {
        $form .= '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
    }

    // Add search input and button
    $form .= '</select>
                    </div>
                    <div class="inline-search-field input-field">
                      
                        <input type="text" name="s" id="search" placeholder="Enter product name or keyword">
                    </div>
                    <div class="inline-search-field button-field">
                        <input type="hidden" name="post_type" value="product"> <!-- Limit search to products -->
                        <button type="submit">Search</button>
                    </div>
                </div>
            </form>';

    return $form;
}

// Shortcode to display the form
add_shortcode('custom_product_search', 'custom_product_search_form');