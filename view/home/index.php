<?php ob_start();

?>

<!-- Slider main container -->
<div class="swiper mySwiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <?php
        foreach($bestRating->fetchAll() as $best){ 
    ?>
        <div class="swiper-slide"><img src="<?=$best['poster']?>"> </div>

        
    <?php
    }
    ?>

  </div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>



<?php

$titre = "Home";
$titre_secondaire = "Welcome";
$contenu = ob_get_clean();
require "view/template.php";


