

<footer>
        <div class="socialIcons">
            <a href="" class="fa fa-lg fa-facebook"></a>
            <a href="" class="fa fa-lg fa-twitter"></a>
            <a class="fa fa-lg fa-pinterest"></a>
            <a class="fa fa-lg fa-instagram"></a>
        </div>

        <?php wp_footer(); ?>

        <div id="div-id">
            <br><br>
            <h2><a id="site-title" href="<?php echo home_url() ?>"><?php bloginfo('name'); ?></a></h2>
            <h4 id="site-tagline"><?php bloginfo('description'); ?></h4>
            <?php $args = ['theme_location' => 'secondary']; ?>
            <div id="nav"><?php wp_nav_menu($args) ?></div>
            <!-- <hr> -->
        </div>
    </footer>
    </body>
</html>