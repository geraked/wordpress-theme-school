<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package WordPress
 */

get_template_part('template-parts/posts', null, [
    'title' => __('Search Results for', 'ger-school') . ' "' . esc_html(stripslashes($_GET['s']), true) . '"',
]);
