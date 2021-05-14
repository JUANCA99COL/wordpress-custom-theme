<?php

get_header (); ?>


<div>
<img class="cover-image" src="<?php bloginfo('stylesheet_directory'); ?>/images/family.jpg" alt=""/>
</div>

<div id="container">


<div class="intro">
    <h1>All In Movement Nz</h1>
    <p>Help our families and change their lives</p>
</div>


<?php

//  tell wordpress we only want to show the post types with the name 'staff'
query_posts( array(
  'post_type' => 'post'
));


// the wordpress loop

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); 
    
?>



<div id="posts">
<h3><a href="<?php the_permalink() ?>">- <?php the_title() ?></a></h3>
<?php the_time('F jS, Y'); ?> 
<br>
<?php the_time(); ?>
<?php the_excerpt() ?>

</div> 


<?php endwhile;

else :
	echo '<p>There are no posts!</p>';
endif; ?>


<section class="home-container">

<div class="intro-two">
<h1>Meet our families</h1>
<p>Everything we do is designed to inspire, encourage, and support the strengthening of your relationships. We make sure it’s fun and entertaining along the way too.</p>
</div>


<div class="row">
<div class="column"">
    <h2>Families</h2>
    <p>by working alongside you to resolve conflicts and strengthen relationships.</p>
  </div>
  <div class="column">
  <img class="image-fam" src="<?php bloginfo('stylesheet_directory'); ?>/images/family-one.jpg" alt="">
  </div>
</div>

<div class="row">
<div class="column"">
    <h2>Children</h2>
    <p>by supporting children and young people to overcome challenges at home or school.</p>
  </div>
  <div class="column">
  <img class="image-fam" src="<?php bloginfo('stylesheet_directory'); ?>/images/anotha-family.jpg" alt="">
  </div>
</div>

</section>



</div>

<?php

get_footer();



?>


<!-- <p>This is the index page template.</p> -->