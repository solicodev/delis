// Webpack Imports
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper';

(function () {
	'use strict';
	const swiperInstagram = new Swiper("#instagram-cards", {
		slidesPerView: 3,
		spaceBetween: 30,
		loop: true,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			0: { slidesPerView: 1 },
			768: { slidesPerView: 2 },
			992: { slidesPerView: 3 }
		}
	});
	// Focus input if Searchform is empty
	[].forEach.call(document.querySelectorAll('.search-form'), (el) => {
		el.addEventListener('submit', function (e) {
			var search = el.querySelector('input');
			if (search.value.length < 1) {
				e.preventDefault();
				search.focus();
			}
		});
	});

	// Initialize Popovers: https://getbootstrap.com/docs/5.0/components/popovers
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl, {
			trigger: 'focus',
		});
	});
})();


