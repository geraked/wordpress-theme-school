<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package WordPress
 */

get_template_part('template-parts/single', null, [
    'sidebar' => true,
    'details' => true
]);
