<?php

/** Template Name: members Page Template */

?>

<?php

get_header (); ?>


<div>
<img class="cover-image" src="<?php bloginfo('stylesheet_directory'); ?>/images/family.jpg" alt=""/>
</div>

<div id="container">

<div class="mem-content"> 
    <h1>Members</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos accusamus laborum nisi dolor soluta deleniti qui, expedita reprehenderit neque eligendi placeat, delectus quaerat, obcaecati fuga atque magnam laboriosam illum accusantium.</p>
</div>



<?php

//  tell wordpress we only want to show the post types with the name 'staff'
query_posts( array(
    'post_type' => 'staff'
));

// the wordpress loop
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); 
    
?>

<div class="post-card-full green-background">
    <?php the_post_thumbnail('Medium', ['class' => 'staff-member-photo']); ?>
    <h3><a href="<?php the_permalink() ?>" class="different-color"> <?php the_title() ?> </a></h3>
    <?php the_excerpt() ?>
</div>


</section>

<?php endwhile;

else :
	echo '<p>There are no posts!</p>';
endif; ?>

</div>

<?php

get_footer();



?>


<!-- <p>This is the members page template.</p> -->