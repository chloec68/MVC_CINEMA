<?php ob_start();

?>
	<!--
<div class="searchBarContainer">
	<form action="index.php?action=searchByName" method="POST">
		<input type="text" name="movieTitle" class="searchBar" required>
		<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
	</form>
</div> -->
	

<div class="fiveStars">
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <h3>Best Rated Movies</h3>
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
	<div class="emotions-slider__slider  swiper">
		<div class="emotions-slider__wrapper swiper-wrapper">
			<?php
			foreach($bestRating->fetchAll() as $best){ 
			?>
			<div class="swiper-slide">
				<div class="emotions-slider__item emotions-slider-item">
					<div class="emotions-slider-item__image">
							<a href="index.php?action=detailFilm&id=<?= $best['id_movie']?>"><img src="<?=$best['poster']?>"></a>
					</div>
		
					<div class="emotions-slider-item__content">
						<div class="emotions-slider-item__info"></div>
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
$titre_secondaire = "Home";
$contenu = ob_get_clean();
require "view/template.php";









