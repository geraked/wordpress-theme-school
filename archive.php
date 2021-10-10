<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WordPress
 */

get_template_part('template-parts/posts', null, [
    'title' => get_the_archive_title(),
]);
