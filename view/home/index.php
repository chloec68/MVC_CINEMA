<?php ob_start();

?>
<div class="fiveStars">
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
</div>

<div class="home_wrapper">

    <?php
        foreach($bestRating->fetchAll() as $best){ 
    ?>
        <div class="poster_container"><img src="<?=$best['poster']?>"></div>

        
    <?php
    }
    ?>

</div>


<?php

$titre = "Home";
$titre_secondaire = "Best Rated Movies";
$contenu = ob_get_clean();
require "view/template.php";














https://codepen.io/bato-web-agency/pen/OPLxQWx



// <section class="base-template">
// 	<div class="wrapper base-template__wrapper">
// 		<div class="base-template__content">
// 			<div class="emotions-slider">

// 				<!-- Slider Navigation -->

// 				<div class="emotions-slider__nav slider-nav">
// 					<div tabindex="0" class="slider-nav__item slider-nav__item_prev">
// 						<svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg">
// 							<path d="M14 26L2 14L14 2" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
// 						</svg>
// 					</div>
// 					<div tabindex="0" class="slider-nav__item slider-nav__item_next">
// 						<svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg">
// 							<path d="M2 26L14 14L2 2" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
// 						</svg>
// 					</div>
// 				</div>

// 				<!-- Slider Content -->

// 				<div class="emotions-slider__slider swiper">
// 					<div class="emotions-slider__wrapper swiper-wrapper">

// 						<!-- Slider: Slide 1 -->

// 						<div class="emotions-slider__slide swiper-slide">
// 							<div class="emotions-slider__item emotions-slider-item">
// 								<div class="emotions-slider-item__image">
// 									<img src="https://bato-web-agency.github.io/bato-shared/img/slider-1/slide-1.jpg" alt="Winds of Change" />
// 								</div>

// 								<div class="emotions-slider-item__content">
// 									<div class="emotions-slider-item__header">
// 										<div class="emotions-slider-item__header-inner">
// 											<div class="emotions-slider-item__price">$175</div>
// 											<div class="emotions-slider-item__author">
// 												<div class="emotions-slider-item__author-image">
// 													<img src="https://bato-web-agency.github.io/bato-shared/img/slider-1/author-1.jpg" alt="Andrew Kelman" />
// 												</div>
// 												<div class="emotions-slider-item__author-name">
// 													Andrew Kelman
// 												</div>
// 											</div>
// 										</div>
// 									</div>

// 									<div class="emotions-slider-item__info">
// 										<h2 class="emotions-slider-item__title">
// 											Winds of Change
// 										</h2>
// 										<div class="emotions-slider-item__text">
// 											Gentle pink and blue hues remind us of moments when everything changes for the better.
// 										</div>
// 									</div>

// 									<div class="emotions-slider-item__footer">
// 										<a class="emotions-slider-item__btn" href="/" onclick="event.preventDefault();">
// 											<span class="emotions-slider-item__btn-text">View more</span>
// 											<span class="emotions-slider-item__btn-icon"></span>
// 										</a>
// 									</div>
// 								</div>
// 							</div>
// 						</div>


