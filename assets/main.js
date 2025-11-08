// Webpack Imports
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper';
import {Autoplay, Navigation, Pagination} from 'swiper/modules';

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
            0: {slidesPerView: 1},
            768: {slidesPerView: 2},
            992: {slidesPerView: 3}
        }
    });
    const swiperProduct = new Swiper(".product-swiper", {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        autoplay: false,
        autoHeight:false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    swiperProduct.on('slideChangeTransitionEnd', function () {
        // اول از همه کلاس رو از همه taste-shapes ها حذف می‌کنیم
        document.querySelectorAll('.swiper-slide .taste-shapes').forEach(el => {
            el.classList.remove('move-in');
        });

        // حالا فقط taste-shapes داخل اسلاید فعال رو انتخاب و کلاس اضافه می‌کنیم
        const activeSlide = swiperProduct.slides[swiperProduct.activeIndex];
        const activeTaste = activeSlide.querySelector('.taste-shapes');

        if (activeTaste) {
            activeTaste.classList.add('move-in');
        }
    });
    function fetchProduct(id) {
        const sliderWrapper = document.getElementById('product-wrap')
        //let parent = selector.dataset.id
        let formData = new URLSearchParams({
            action: 'get_product',
            parent: id,
            //nonce:profileNonce.value
        });
        const loader=document.getElementById('product-loader');
        loader.classList.remove('d-none');
        fetch(delisAjax.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: formData.toString()
        })
            .then(response => {

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    loader.classList.add('d-none');
                    sliderWrapper.innerHTML = '';
                    sliderWrapper.innerHTML = data.data;
                    swiperProduct.update()
                    const activeSlide = swiperProduct.slides[swiperProduct.activeIndex];
                    const activeTaste = activeSlide.querySelector('.taste-shapes');

                    if (activeTaste) {
                        activeTaste.classList.add('move-in');
                    }

                } else {
                    //message_alert('error', data.data.message);
                }
            })
            .catch(error => {
                console.log(error);
            });

    }

    const productWrap = document.getElementById('product-slider');
    if (productWrap) {
        document.querySelectorAll('.select-category').forEach(selector => {
            selector.addEventListener('click', e => {
                let parent = selector.dataset.id;
                document.querySelectorAll('.select-category').forEach(el => el.classList.remove('selected'));
                selector.classList.add('selected');
                fetchProduct(parent)
            })
        })

    }


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


