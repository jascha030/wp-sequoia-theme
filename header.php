<!DOCTYPE html>
<html lang="<?php echo get_language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen bg-white font-sans'); ?>>
<?php
do_action('after_body');
get_template_part('templates/layout/layout', 'header');
