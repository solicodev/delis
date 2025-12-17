// Webpack Imports
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper';
import {Autoplay, Navigation, Pagination} from 'swiper/modules';
import Lenis from 'lenis'
import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";
import imageCompression from 'browser-image-compression';


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
    var fullNav = document.querySelector('.fullscreen-menu');
    var menuButton = document.querySelector('.nav-button');
    menuButton.addEventListener('click', function () {
        fullNav.classList.toggle('open');
        menuButton.classList.toggle('open')
    })

    const paintingModal = document.getElementById('painting-modal');
    const steps = document.querySelectorAll(".step");
    const navLinks = document.querySelectorAll(".steps-nav .nav-link");
    const otpTimerDisplay = document.getElementById('otp-timer');
    const otpResend = document.getElementById('otp-resend')

    let currentStep = 0;
    let otpTimer;
    let timeLeft = 10; // 2 minutes in seconds
    function showStep(index) {
        steps.forEach((step, i) => {
            step.classList.toggle("active", i === index);
            navLinks[i].classList.toggle("active", i === index);
        });
    }

    const uploadInput = document.getElementById('upload-paint');
    if (uploadInput) {
        var [file] = [];
        uploadInput.addEventListener('change', function (eve) {
            [file] = eve.target.files
            if (file) {
                console.log(URL.createObjectURL(file))
                document.querySelector('.upload-zone').style.backgroundImage = "url('" + URL.createObjectURL(file) + "')";
            }
        })
    }
    const phoneInput = document.getElementById('phone-input');
    const nameInput = document.getElementById('name-input');
    const birthdateInput = document.getElementById('birthdatae-input');
    const nonce = document.getElementById('phone_auth_nonce');
    document.querySelectorAll(".nextBtn").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            // Validate current step
            const inputs = steps[currentStep].querySelectorAll("input[required]");
            for (let input of inputs) {
                if (!input.checkValidity()) {
                    input.classList.add("is-invalid");
                    input.reportValidity();
                    return; // stop here if invalid
                } else {
                    input.classList.remove("is-invalid");
                }
            }
            if (e.target.id === "register-complete") {
                let digits1 = document.getElementById('digits-1').value;
                let digits2 = document.getElementById('digits-2').value;
                let digits3 = document.getElementById('digits-3').value;
                let digits4 = document.getElementById('digits-4').value;
                let otp = digits1 + digits2 + digits3 + digits4;
                let formData = new URLSearchParams({
                    action: 'verify_otp',
                    phone: phoneInput.value,
                    otp: otp,
                    name: nameInput.value,
                    phone_auth_nonce: nonce.value
                });
                fetch(delisAjax.ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            currentStep++;
                            showStep(currentStep);
                        } else {
                            document.getElementById('digits-error').innerText = data.data.message;
                        }
                    })
                    .catch(error => {
                        document.getElementById('digits-error').innerText = 'احراز هویت با خطا مواجه شد. مجدد تلاش کنید.';

                        //message_alert('error', 'احراز هویت با خطا مواجه شد. مجدد تلاش کنید.');
                        // verifyOtpBtn.disabled = false;
                        // verifyOtpBtn.textContent = phoneAuth.verifyText;
                        console.error('Error:', error);
                    });
            }
            if (e.target.id === "send-otp-btn-login") {
                btn.disabled = true;
                let formData = new URLSearchParams({
                    action: 'send_otp',
                    phone: phoneInput.value,
                });
                fetch(delisAjax.ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {

                        if (data.success) {
                            if (data.data.debug_otp) {
                                console.log('DEBUG OTP: ' + data.data.debug_otp);
                                // Move to next step

                            }
                            currentStep++;
                            showStep(currentStep);
                            document.getElementById('otp-mobile').innerHTML = data.data.phone
                            startOtpTimer();
                            btn.disabled = false;

                        } else {
                            btn.disabled = false;
                            document.getElementById('phone-error').innerHTML = data.data.message
                        }

                    })
                    .catch(error => {
                        document.getElementById('phone-error').innerHTML = error
                    });
            }

        });

    });
    document.querySelectorAll(".prevBtn").forEach((btn) => {
        btn.addEventListener("click", function () {
            currentStep--;
            showStep(currentStep);
        });
    });

    // Final form submit
    const multiform=document.getElementById("multiForm");
    if (multiform) {
        multiform.addEventListener("submit", function (e) {
            e.preventDefault();

            const fileInput = document.getElementById("upload-paint");
            const file = fileInput.files[0];

            if (!file) {
                alert("لطفاً یک تصویر انتخاب کنید");
                return;
            }

            updateProgress(0, "در حال فشرده‌سازی عکس...");

            imageCompression(file, {
                maxSizeMB: 1,
                maxWidthOrHeight: 1920,
                useWebWorker: true,
                onProgress: function (percent) {
                    updateProgress(percent, "فشرده‌سازی: " + percent + "%");
                }
            }).then(function (compressedFile) {

                /* ===============================
                   🔴 قسمت حیاتی – اینجا مشکل حل می‌شود
                   =============================== */

                const originalName = file.name || `image_${Date.now()}.jpg`;

                const finalFile = new File(
                    [compressedFile],
                    originalName, // ← اسم + پسوند واقعی
                    {type: compressedFile.type || file.type}
                );

                /* =============================== */

                updateProgress(0, "در حال آپلود...");

                const formData = new FormData();
                formData.append("action", "upload_compressed_image");
                formData.append("image", finalFile); // ← فایل درست

                const xhr = new XMLHttpRequest();
                xhr.open("POST", delisAjax.ajaxurl, true);

                xhr.upload.onprogress = function (e) {
                    if (e.lengthComputable) {
                        const percent = Math.round((e.loaded / e.total) * 100);
                        updateProgress(percent, "آپلود: " + percent + "%");
                    }
                };

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        updateProgress(100, "آپلود کامل شد!");
                        let formData = new URLSearchParams({
                            action: 'add_paint',
                            mobile: phoneInput.value,
                            name: nameInput.value,
                            birthdate: birthdateInput.value,
                            image: JSON.parse(xhr.responseText).data.url,
                        });
                        fetch(delisAjax.ajaxurl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: formData
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(`HTTP error! status: ${response.status}`);
                                }
                                return response.json();
                            })
                            .then(data => {

                                if (data.success) {
                                    if (data.data.debug_otp) {
                                        console.log('DEBUG OTP: ' + data.data.debug_otp);
                                        // Move to next step

                                    }
                                    currentStep++;
                                    showStep(currentStep);
                                    //startOtpTimer();

                                } else {
                                    //message_alert('error', data.data.message);
                                }

                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        console.log("Server response:", JSON.parse(xhr.responseText));
                    } else {
                        updateProgress(0, "خطا در آپلود فایل!");
                    }
                };

                xhr.onerror = function () {
                    updateProgress(0, "خطای شبکه در آپلود");
                };

                xhr.send(formData);

            }).catch(function (err) {
                console.error(err);
                updateProgress(0, "خطا در فشرده‌سازی تصویر");
            });
        });
    }

    function startOtpTimer() {
        clearInterval(otpTimer);
        timeLeft = 10;
        updateOtpTimerDisplay();
        otpTimer = setInterval(function () {
            timeLeft--;
            updateOtpTimerDisplay();
            if (timeLeft <= 0) {
                clearInterval(otpTimer);
            }
        }, 1000);
    }
    if(otpResend){
        otpResend.addEventListener('click', function (e) {
            e.preventDefault();
            const phone = phoneInput.value.trim();
            let formData = new URLSearchParams({
                action: 'process_resend_otp',
                phone: phone,
            });
            fetch(delisAjax.ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {

                    if (data.success) {
                        //message_alert('success', data.data.message);
                        if (data.data.debug_otp) {
                            console.log('DEBUG OTP: ' + data.data.debug_otp);
                        }

                        otpResend.style.display = 'none';
                        // Start OTP timer
                        startOtpTimer();
                    } else {
                        //console.log(data)
                        // message_alert('error', data.data.message);
                        document.getElementById('digits-error').innerHTML = data.data.message
                    }
                    // sendOtpBtnRegister.disabled = false;
                    // sendOtpBtnRegister.textContent = phoneAuth.resendText;
                })
                .catch(error => {
                    //message_alert('error', 'ارسال کد انجام نشد لطفا مجدد تلاش کنید.');
                    //sendOtpBtnRegister.disabled = false;
                    //sendOtpBtnRegister.textContent = 'ارسال کد';
                    console.error('Error:', error);
                    document.getElementById('digits-error').innerHTML = error
                });
        })
    }

    function updateOtpTimerDisplay() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        otpTimerDisplay.textContent =
            (minutes < 10 ? '0' + minutes : minutes) + ':' +
            (seconds < 10 ? '0' + seconds : seconds);

        if (timeLeft <= 0) {
            otpResend.style.display = 'block';
        }
    }

    function updateProgress(percent, text) {
        progressBar.style.width = percent + "%";
        progressBar.innerText = percent + "%";
        statusText.innerText = text;
    }

    document.querySelectorAll('.digits-group input').forEach(function (input) {
        input.addEventListener('keyup', function (e) {
            var parent = document.getElementById('otp-form');
            if (e.keyCode === 8 || e.keyCode === 37) {
                // Backspace or Left Arrow
                var prevId = input.dataset.previous;
                if (prevId) {
                    var prev = parent.querySelector('input#' + prevId);
                    if (prev) {
                        prev.select();
                    }
                }
            } else if (
                (e.keyCode >= 48 && e.keyCode <= 57) ||   // numbers
                (e.keyCode >= 65 && e.keyCode <= 90) ||   // letters
                (e.keyCode >= 96 && e.keyCode <= 105) ||  // numpad
                e.keyCode === 39                          // right arrow
            ) {
                var nextId = input.dataset.next;
                if (nextId) {
                    var next = parent.querySelector('input#' + nextId);
                    if (next) {
                        next.select();
                    }
                } else {
                    if (parent.dataset.autosubmit) {
                        document.getElementById('otp-submit')?.click();
                    }
                }
            }
        });
    });
    const singleProduct = document.getElementsByClassName('single-product');
    if (singleProduct.length > 0) {

        console.log(document.getElementById("product-box").offsetTop - document.querySelector(".product").height)
        //mm.add("(min-width: 600px)", () => {
        let photo = document.querySelector(".product-image-outer");
        let target = document.querySelector("#product-box");
        let targetHeight = target.getBoundingClientRect().height;
        let photoHeight = photo.getBoundingClientRect().height;
        let diff = targetHeight - photoHeight;
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
                        - photo.getBoundingClientRect().top + (diff / 2);
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
            y: () => {
                let dist = lastTarget.getBoundingClientRect().top - target.getBoundingClientRect().top
                return "+=" + dist;
            },
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
                        y: 100,
                        opacity: 0,
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
                        y: 0,
                        opacity: 1,
                        duration: 0.2,
                        transition: 'bounce-in'
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
                        y: 100,
                        opacity: 0,
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
                        y: 0,
                        opacity: 1,
                        duration: 0.2,
                        transition: 'bounce-in'
                    }, '<')
            })
        })
        //})
    }

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
            992: {slidesPerView: 3, spaceBetween: 94}
        }
    });
    const otherProducts = new Swiper("#other-product", {
        slidesPerView: 2.5,
        spaceBetween: 16,
        loop: true,
        centeredSlides: true,
        //direction:'ltr',
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
        breakpoints: {
            992: {slidesPerView: 4.5, centeredSlides: false},
            1440: {slidesPerView: 5, centeredSlides: false}
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
        var defaultCat = document.querySelector('.select-category.selected').dataset.id;
        fetchProduct(defaultCat);
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


