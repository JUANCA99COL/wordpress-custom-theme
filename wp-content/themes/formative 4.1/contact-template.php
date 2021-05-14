<?php

/** Template Name: contact Page Template */

?>

<?php

get_header (); ?>


<div>
<img class="cover-image" src="<?php bloginfo('stylesheet_directory'); ?>/images/family.jpg" alt=""/>
</div>

<div id="container">

<?php

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


<section class="home-container">



<div class="">
    <h1>CONTACT US</h1>
    <p>All queries about Family Works services, jobs, volunteering opportunities and donations are dealt with by the Presbyterian Support organisation in each region.</p>
</div>

<form class="my-form" action="/action_page.php">
  <label for="fname">First name:</label><br>
  <input class="my-input" type="text" id="fname" name="fname" value=""><br>
  <label for="lname">Last name:</label><br>
  <input class="my-input" type="text" id="lname" name="lname" value=""><br>
  <label for="lname">email:</label><br>
  <input class="my-input" type="text" id="lname" name="lname" value=""><br>
  <label for="lname">message:</label><br>
  <textarea class="my-textarea" id="w3review" name="w3review" rows="4" cols="50">
  
  </textarea>
  <input class="my-button" type="submit" value="Submit">
  <input class="second-button" type="submit" value="Close">
</form> 

<div class="map-div">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000.6757427327943!2d174.79761861597984!3d-41.22883624478713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38ad5f317110c3%3A0x477d085d31f843c9!2sAll%20In%20Movement%20NZ!5e0!3m2!1sen!2snz!4v1620883717065!5m2!1sen!2snz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<div class="my-list"> 

  <div class="footer-info"> 
    <ul>
      <h1>Bussines Hours</h1>
      <li>Mon:	9:30 AM – 2:30 PM</li>
      <li>Tue:	9:30 AM – 2:30 PM</li>
      <li>Wed:	9:30 AM – 2:30 PM</li>
      <li>Thu:	9:30 AM – 2:30 PM</li>
      <li>Fri:	9:30 AM – 2:30 PM</li>
      <li>Sat:	9:30 AM – 1:30 AM</li>
      <li>Sun:	Closed</li>
    </ul>
  </div>


<div class="footer-info">
    <h1>Address</h1>
    <p>2 Fisher Street <br>
        Wellington <br>
        6037 <br>
        New Zealand <br>
    </p>
</div>

<div class="footer-info">
  <h1>Contact</h1>
  <p>022 682 2131</p>
</div>

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