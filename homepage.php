<div id="test">
<div class="slider-wrapper theme-default">
    <div class="ribbon"></div><!--End of Ribbon-->
  <div id="slider" class="nivoSlider">
   <?php

  $slider_photos=new Photos();
  $slider_photos->display_slider();
?>    
  
    
  </div><!--End of Nivo Slider-->
</div><!--End of Slider Wrapper-->
</div>
   <div id="main">
     <div id="coloumn1">
         <?php
         $coloumn_post=new Posts();
         $coloumn_post->show_coloumns();
         ?>
          <h2><?php echo $coloumn_post->naslov[0]; ?></h2>
          <?php
         $column_image=new Photos();
         $column_image->show_column_photos();
         echo "<img src=\"img/";
         echo $column_image->name[0];
         echo "\" />";
          ?>
          <p><?php echo $coloumn_post->content[0];?></p>
    </div><!--End of coloumn1-->

     <div id="coloumn2">
          <h2><?php echo $coloumn_post->naslov[1];?></h2>
          <?php
         $column_image=new Photos();
         $column_image->show_column_photos();
         echo "<img src=\"img/";
         echo $column_image->name[1];
         echo "\" />";
          ?>
          <p><?php echo $coloumn_post->content[1];?></p>
    </div><!--End of coloumn 2-->
</div><!--End of main !-->

<div id="middle">
<h1><i class="fa fa-quote-left"></i> This is a middle heading <i class="fa fa-quote-right"></i></h1>
</div><!--end of middle-->
<div id="services">
<div id="services_wrapper">

<?php $settings=new Settings();
      $settings->name="service1";
      echo "<span>";
      $settings->show_services();
?>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</span>
<?php  $settings->name="service2";
       echo "<span>";
       $settings->show_services();

?>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</span>
<?php  $settings->name="service3";
       echo "<span>";
       $settings->show_services();

?>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</span>
</div>
</div>
<div id="bottom">

<div id="bottom-gallery">
<h2>Gallery</h2>

  <?php $home_photos=new Photos();
             $panel=null;
             $home_photos->homepage_gall($panel);
        ?>
  
<script>
$(" '<?php echo $home_photos->name;?>' ").onmouseover(function(){
  $(" '<?php echo $home_photos->name;?>' ").css("background","yellow");
});
</script> 

</div><!--End of bottom-gallery-->
<div id="bottom-list">
<h2>Why choose us?</h2>
<ul>
<li>Lorem ipsum dolor sit amet, consectetur adipisicing</li>
<li>Lorem ipsum dolor sit amet, consectetur adipisicing</li>
<li>Lorem ipsum dolor sit amet, consectetur adipisicing</li>
<li>Lorem ipsum dolor sit amet, consectetur adipisicing</li>
<li>Lorem ipsum dolor sit amet, consectetur adipisicing</li>
<li>Lorem ipsum dolor sit amet, consectetur adipisicing</li>

</ul>
</div><!--End of bottom list-->
</div><!--End of bottom-->


