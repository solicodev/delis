// Webpack Imports
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper';
import {Autoplay, Navigation, Pagination} from 'swiper/modules';
import Lenis from 'lenis'
import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";

(function () {
    'use strict';

    gsap.registerPlugin(ScrollTrigger);
    const lenis = new Lenis();
    let mm = gsap.matchMedia();

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }

    //console.log(hideLoadingScreen())
    requestAnimationFrame(raf);
    lenis.on('scroll', ScrollTrigger.update);
    document.addEventListener('DOMContentLoaded', function () {
        var fullNav=document.querySelector('.fullscreen-menu');
        var menuButton=document.querySelector('.nav-button');
        menuButton.addEventListener('click', function(){
            fullNav.classList.toggle('open');
        })

        const singleProduct = document.getElementsByClassName('single-product');
        if (singleProduct.length > 0) {

            console.log(document.getElementById("product-box").offsetTop - document.querySelector(".product").height)
            //mm.add("(min-width: 600px)", () => {
                let photo = document.querySelector(".product-image-outer");
                let target = document.querySelector("#product-box");
                let lastTarget = document.querySelector("#product-decorative");
                var tl = gsap.timeline({
                    //rotate: 360,
                    scrollTrigger: {
                        trigger: photo,
                        start: "center center",
                        scrub: true,
                        pin: true,
                        anticipatePin: 1,
                        //markers: true,
                        end: () => {
                            let dist = target.getBoundingClientRect().top
                                - photo.getBoundingClientRect().top + 43;
                            return "+=" + dist;
                        }
                    }
                });
                tl.to(photo, {
                    rotate: -10,
                    duration: 1
                })

                    // مرحله ۲: کمی به راست بچرخد
                    .to(photo, {
                        rotate: 10,
                        duration: 1
                    })

                    // مرحله ۳: در انتها صاف شود
                    .to(photo, {
                        rotate: 0,
                        duration: 1
                    })
                gsap.to(".product-image-inner", {
                    scrollTrigger: {
                        trigger: "#product-slogan",
                        start: "center bottom",
                        scrub: true,
                    },
                    rotate: 360,
                    y:()=>{
                        let dist=lastTarget.getBoundingClientRect().top - target.getBoundingClientRect().top
                        return "+=" + dist;
                    } ,
                    duration: 1
                });
                document.querySelectorAll('.next-product').forEach(function (t) {
                    t.addEventListener('click', function (e) {

                        var scaletl = gsap.timeline({})
                            .to('.product', {
                                rotate: 720,
                                duration: 0.5,
                            }).to('.scale-anim', {
                                width: 1000,
                                height: 1000,
                                scale: 5,
                                duration: 0.5,
                            }, '<').to('.shape', {
                                y:100,
                                opacity:0,
                                duration: 0.2,
                            }, '<')
                            .to('.product', {
                                rotate: 0,
                                duration: 0.5,
                            })
                            .to('.scale-anim', {
                                width: 0,
                                height: 0,
                                scale: 1,
                                duration: 0.5,
                            }).to('.shape', {
                                y:0,
                                opacity:1,
                                duration: 0.2,
                                transition:'bounce-in'
                            }, '<')
                    })
                })
                document.querySelectorAll('.prev-product').forEach(function (t) {

                    t.addEventListener('click', function (e) {

                        var scaletl = gsap.timeline({})
                            .to('.product', {
                                rotate: 720,
                                duration: 0.5,
                            }).to('.scale-anim', {
                                width: 1000,
                                height: 1000,
                                scale: 5,
                                duration: 0.5,
                            }, '<').to('.shape', {
                                y:100,
                                opacity:0,
                                duration: 0.2,
                            }, '<')
                            .to('.product', {
                                rotate: 0,
                                duration: 0.5,
                            })
                            .to('.scale-anim', {
                                width: 0,
                                height: 0,
                                scale: 1,
                                duration: 0.5,
                            }).to('.shape', {
                                y:0,
                                opacity:1,
                                duration: 0.2,
                                transition:'bounce-in'
                            }, '<')
                    })
                })
            //})
        }
    })
    const archiveSlider = new Swiper("#archive-slider", {
        slidesPerView: 2,
        spaceBetween: -50,
        loop: true,
        centeredSlides: true,
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
        breakpoints: {
            768: {slidesPerView: 2},
            992: {slidesPerView: 3}
        }
    });
    const swiperInstagram = new Swiper("#instagram-cards", {
        slidesPerView: 1.5,
        spaceBetween: 16,
        loop: true,
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
        breakpoints: {
            768: {slidesPerView: 2},
            992: {slidesPerView: 3}
        }
    });
    const otherProducts = new Swiper("#other-product", {
        slidesPerView: 1.5,
        spaceBetween: 16,
        loop: true,
        //direction:'ltr',
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
        breakpoints: {
            768: {slidesPerView: 2},
            992: {slidesPerView: 4.5},
            1440: {slidesPerView: 5}
        }
    });
    const swiperProduct = new Swiper(".product-swiper", {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        autoplay: false,
        autoHeight: false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const swiperPooding = new Swiper("#swiper-pooding", {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        autoplay: false,
        autoHeight: false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    const swiperabout = new Swiper("#swiper-about", {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1.5,
        spaceBetween: 16,
        loop: true,
        autoplay: false,
        autoHeight: false,
        breakpoints: {
            768: {slidesPerView: 2},
            992: {slidesPerView: 4}
        }

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
        const loader = document.getElementById('product-loader');
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


