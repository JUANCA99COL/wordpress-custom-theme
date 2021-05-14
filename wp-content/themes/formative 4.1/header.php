<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head()?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body <?php body_class(); ?>>
    <div id="site-header">
        <br><br>
        <!-- <h2><a id="site-title" href="<?php echo home_url() ?>"><?php bloginfo('name'); ?></a></h2> -->
        <!-- <h4 id="site-tagline"><?php bloginfo('description'); ?></h4> -->
        <!-- <?php $args = ['theme_location' => 'primary']; ?> -->
        <div id="nav"><?php wp_nav_menu($args) ?></div>
        
    </div>

    
            
            
     

    