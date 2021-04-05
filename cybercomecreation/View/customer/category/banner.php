<?php

$categoryBanner=$this->getCategory()->getBanner();

?>

<section id="aa-catg-head-banner">
   <?php if($categoryBanner): ?>
   <img style='width: 1400px;height: 500px' src="<?php echo($categoryBanner->image); ?>" alt="fashion img">
   <?php endif;?>
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo $this->getCategory()->name; ?></h2>
      </div>
     </div>
   </div>
  </section>

  