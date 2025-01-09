document.addEventListener("DOMContentLoaded", () => {
	const sliders = document.querySelectorAll(".emotions-slider");

	if (!sliders.length) return;

	const list = [];

	sliders.forEach((element) => {
		const [slider, prevEl, nextEl, pagination] = [
			element.querySelector(".swiper"),
			element.querySelector(".slider-nav__item_prev"),
			element.querySelector(".slider-nav__item_next"),
			element.querySelector(".slider-pagination")
		];

		list.push(
			new Swiper(slider, {
				slidesPerView: 3,
				spaceBetween: 5,
				speed: 800,
				observer: true,
				watchOverflow: true,
				centeredSlides: true,
                loop:true,
				navigation: { nextEl, prevEl, disabledClass: "disabled" },
				breakpoints: {
					768: { spaceBetween: 40 }
				}
			})
		);
	});
});