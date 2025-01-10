<?php ob_start();

?>
<div class="fiveStars">
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
</div>


			<div class="emotions-slider">

				<!-- Slider left/right Navigation -->

				<div class="emotions-slider__nav slider-nav">
					<div tabindex="0" class="slider-nav__item slider-nav__item_prev">
                        <svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 26L2 14L14 2" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
					</div>
					<div tabindex="0" class="slider-nav__item slider-nav__item_next">
						<svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M2 26L14 14L2 2" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
				</div>

				<!-- Slider Content -->
				<div class="emotions-slider__slider swiper">
					<div class="emotions-slider__wrapper swiper-wrapper">
                        <?php
                        foreach($bestRating->fetchAll() as $best){ 
                        ?>
                        <div class="swiper-slide">
							<div class="emotions-slider__item emotions-slider-item">
								<div class="emotions-slider-item__image">
                                        <img src="<?=$best['poster']?>">
							    </div>
                 
								<div class="emotions-slider-item__content">
									<div class="emotions-slider-item__info">
										<!-- <h2 class="emotions-slider-item__title">
											MOVIE TITLE
										</h2>
										<div class="emotions-slider-item__text">
											SUMMARY
										</div> -->
									</div>

									<div class="emotions-slider-item__footer">
										<a class="emotions-slider-item__btn" href="index.php?action=movieDetails&id= ">
											<span class="emotions-slider-item__btn-text">View more</span>
											<span class="emotions-slider-item__btn-icon"></span>
										</a>
									</div>
								</div>
							</div>
                        </div>
            
						                      
                        <?php
                        }
                        ?>
                    </div>
                </div>
             

            </div>



<?php

$titre = "Home";
$titre_secondaire = "Best Rated Movies";
$contenu = ob_get_clean();
require "view/template.php";









