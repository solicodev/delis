// Webpack Imports
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper';
import {Autoplay, Navigation, Pagination} from 'swiper/modules';
import Lenis from 'lenis'
import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";
import imageCompression from 'browser-image-compression';

const landingTimer = document.querySelector('#landing-page .landing-timer');
if (landingTimer) {
    const countdownSection = document.getElementById('landing-countdown');
    const deadline = new Date(landingTimer.dataset.deadline).getTime();
    const daysEl = landingTimer.querySelector('[data-unit="days"]');
    const hoursEl = landingTimer.querySelector('[data-unit="hours"]');
    const minutesEl = landingTimer.querySelector('[data-unit="minutes"]');
    const secondsEl = landingTimer.querySelector('[data-unit="seconds"]');
    function pad(value) {
        return String(Math.max(0, value)).padStart(2, '0');
    }
    function expireLandingTimer() {
        if (countdownSection) {
            countdownSection.classList.add('is-expired');
            const title = countdownSection.querySelector('.landing-count-title');
            const copy = countdownSection.querySelector('.landing-count-copy');
            if (title) {
                title.textContent = 'زمان قرعه‌کشی تمام شد';
            }
            if (copy) {
                copy.hidden = true;
            }
        }
        daysEl.textContent = '00';
        hoursEl.textContent = '00';
        minutesEl.textContent = '00';
        secondsEl.textContent = '00';
    }
    function tickLandingTimer() {
        if (!Number.isFinite(deadline)) {
            expireLandingTimer();
            return false;
        }
        const distance = deadline - Date.now();
        const days = Math.floor(distance / 86400000);
        if (days <= 0) {
            expireLandingTimer();
            return false;
        }
        daysEl.textContent = pad(days);
        hoursEl.textContent = pad(Math.floor((distance % 86400000) / 3600000));
        minutesEl.textContent = pad(Math.floor((distance % 3600000) / 60000));
        secondsEl.textContent = pad(Math.floor((distance % 60000) / 1000));
        return true;
    }
    if (tickLandingTimer()) {
        const timerId = setInterval(function () {
            if (!tickLandingTimer()) {
                clearInterval(timerId);
            }
        }, 1000);
    }
}
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
    if (fullNav && menuButton) {
        menuButton.addEventListener('click', function () {
            fullNav.classList.toggle('open');
            menuButton.classList.toggle('open')
        })
    }
    const landingNav = document.querySelector('.landing-header-nav');
    const landingNavToggle = document.querySelector('.landing-header-toggle');
    if (landingNav && landingNavToggle) {
        const closeLandingNav = () => {
            landingNav.classList.remove('open');
            landingNavToggle.classList.remove('open');
            landingNavToggle.setAttribute('aria-expanded', 'false');
        };
        landingNavToggle.addEventListener('click', function () {
            const isOpen = landingNav.classList.toggle('open');
            landingNavToggle.classList.toggle('open', isOpen);
            landingNavToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
        landingNav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeLandingNav);
        });
    }

    const paintingRoot = document.getElementById('painting-modal') || document.getElementById('landing-form');
    const steps = paintingRoot ? paintingRoot.querySelectorAll(".step") : [];
    const navLinks = paintingRoot ? paintingRoot.querySelectorAll(".steps-nav .nav-link") : [];
    const otpTimerDisplay = document.getElementById('otp-timer');
    const otpResend = document.getElementById('otp-resend')

    let currentStep = 0;
    let otpTimer;
    let timeLeft = 10; // 2 minutes in seconds
    function showStep(index) {
        steps.forEach((step, i) => {
            step.classList.toggle("active", i === index);
            if (navLinks[i]) {
                navLinks[i].classList.toggle("active", i === index);
            }
        });
    }
    navLinks.forEach((link) => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
        });
    });

    const uploadInput = document.getElementById('upload-paint');
    const uploadZone = paintingRoot ? paintingRoot.querySelector('.upload-zone') : null;
    if (uploadInput) {
        var [file] = [];
        uploadInput.addEventListener('change', function (eve) {
            [file] = eve.target.files
            if (file && uploadZone) {
                const hint = uploadZone.querySelector('.upload-hint');
                if (hint) {
                    hint.textContent = file.name;
                }
                if (!document.getElementById('landing-form')) {
                    uploadZone.style.backgroundImage = "url('" + URL.createObjectURL(file) + "')";
                }
            }
        })
    }
    const phoneInput = document.getElementById('phone-input');
    const nameInput = document.getElementById('name-input');
    const birthdateInput = document.getElementById('birthdatae-input');
    const nonce = document.getElementById('phone_auth_nonce');
    const toEnglishDigits = (value) => String(value || '')
        .replace(/[۰-۹]/g, (digit) => String('۰۱۲۳۴۵۶۷۸۹'.indexOf(digit)))
        .replace(/[٠-٩]/g, (digit) => String('٠١٢٣٤٥٦٧٨٩'.indexOf(digit)));
    const resetStepButton = (btn, fallback) => {
        btn.disabled = false;
        btn.textContent = btn.dataset.label || fallback;
    };
    const showPhoneError = (message) => {
        const phoneError = document.getElementById('phone-error');
        if (phoneError) {
            phoneError.innerHTML = message;
        }
        if (phoneInput) {
            phoneInput.classList.add('is-invalid');
        }
    };
    if (phoneInput) {
        phoneInput.addEventListener('input', function () {
            const converted = toEnglishDigits(phoneInput.value);
            if (converted !== phoneInput.value) {
                phoneInput.value = converted;
            }
        });
    }
    document.querySelectorAll(".nextBtn").forEach((btn) => {
        btn.addEventListener("click", function () {
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
            if (btn.id === "register-complete") {
                let digits1 = toEnglishDigits(document.getElementById('digits-1').value);
                let digits2 = toEnglishDigits(document.getElementById('digits-2').value);
                let digits3 = toEnglishDigits(document.getElementById('digits-3').value);
                let digits4 = toEnglishDigits(document.getElementById('digits-4').value);
                let otp = digits1 + digits2 + digits3 + digits4;
                btn.dataset.label = btn.dataset.label || btn.textContent;
                btn.textContent='منتظر باشید...';
                btn.disabled = true;
                let formData = new URLSearchParams({
                    action: 'verify_otp',
                    phone: toEnglishDigits(phoneInput.value),
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
                            resetStepButton(btn, 'تکمیل ثبت نام');
                            if (document.getElementById('landing-form')) {
                                const landingForm = document.getElementById('multiForm');
                                if (landingForm) {
                                    landingForm.dispatchEvent(new Event('submit', {cancelable: true}));
                                }
                                return;
                            }
                            currentStep++;
                            showStep(currentStep);
                        } else {
                            resetStepButton(btn, 'تکمیل ثبت نام');
                            document.getElementById('digits-error').innerText = data.data.message;
                        }
                    })
                    .catch(error => {
                        resetStepButton(btn, 'تکمیل ثبت نام');
                        document.getElementById('digits-error').innerText = 'احراز هویت با خطا مواجه شد. مجدد تلاش کنید.';
                        console.error('Error:', error);
                    });
            }
            if (btn.id === "send-otp-btn-login") {
                if (document.getElementById('landing-form') && (!uploadInput || !uploadInput.files[0])) {
                    alert('لطفاً فایل نقاشی را آپلود کنید');
                    return;
                }
                if (phoneInput) {
                    phoneInput.value = toEnglishDigits(phoneInput.value);
                }
                btn.disabled=true;
                btn.dataset.label = btn.dataset.label || btn.textContent;
                btn.textContent='منتظر باشید...'
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
                            resetStepButton(btn, 'ارسال کد تایید')

                        } else {
                            resetStepButton(btn, 'ارسال کد تایید');
                            showPhoneError(data.data && data.data.message ? data.data.message : 'ارسال کد انجام نشد.');
                        }

                    })
                    .catch(error => {
                        resetStepButton(btn, 'ارسال کد تایید');
                        showPhoneError('ارسال کد انجام نشد. لطفاً دوباره تلاش کنید.');
                        console.error('Error:', error);
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
    const multiform = document.getElementById("multiForm");
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
                                    currentStep++;
                                    showStep(currentStep);
                                    let formDataSuccess = new URLSearchParams({
                                        action: 'success_register',
                                        mobile: phoneInput.value,
                                    });
                                    fetch(delisAjax.ajaxurl, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/x-www-form-urlencoded',
                                        },
                                        body: formDataSuccess
                                    }).then(regData=>{
                                        if (regData.success) {

                                        }
                                    })
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
        timeLeft = 120;
        updateOtpTimerDisplay();
        otpTimer = setInterval(function () {
            timeLeft--;
            updateOtpTimerDisplay();
            if (timeLeft <= 0) {
                clearInterval(otpTimer);
            }
        }, 1000);
    }

    if (otpResend) {
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

    const landingGallerySlider = document.querySelector('#landing-gallery-slider');
    if (landingGallerySlider) {
        const galleryMq = window.matchMedia('(min-width: 768px)');
        let gallerySwiper;

        const createLandingGallerySwiper = () => {
            if (gallerySwiper) {
                gallerySwiper.destroy(true, true);
            }
            const isDesktop = galleryMq.matches;
            gallerySwiper = new Swiper(landingGallerySlider, {
                modules: [Autoplay],
                direction: isDesktop ? 'vertical' : 'horizontal',
                slidesPerView: isDesktop ? 3 : 1.45,
                spaceBetween: 12,
                loop: true,
                speed: 800,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
            });
        };

        createLandingGallerySwiper();
        galleryMq.addEventListener('change', createLandingGallerySwiper);
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
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
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
    const cursor = document.getElementById("cursor");
    const amount = 20;
    const sineDots = Math.floor(amount * 0.3);
    const width = 26;
    const idleTimeout = 150;
    let lastFrame = 0;
    let mousePosition = {x: 0, y: 0};
    let dots = [];
    let timeoutID;
    let idle = false;
    let hoverButton;
    let hoverTL;


    class Dot {
        constructor(index = 0) {
            this.index = index;
            this.anglespeed = 0.05;
            this.x = 0;
            this.y = 0;
            this.scale = 1 - 0.05 * index;
            this.range = width / 2 - width / 2 * this.scale + 2;
            this.limit = width * 0.75 * this.scale;
            this.element = document.createElement("span");
            gsap.set(this.element, {scale: this.scale});
            cursor.appendChild(this.element);
        }

        lock() {
            this.lockX = this.x;
            this.lockY = this.y;
            this.angleX = Math.PI * 2 * Math.random();
            this.angleY = Math.PI * 2 * Math.random();
        }

        draw(delta) {
            if (!idle || this.index <= sineDots) {
                gsap.set(this.element, {x: this.x, y: this.y});
            } else {
                this.angleX += this.anglespeed;
                this.angleY += this.anglespeed;
                this.y = this.lockY + Math.sin(this.angleY) * this.range;
                this.x = this.lockX + Math.sin(this.angleX) * this.range;
                gsap.set(this.element, {x: this.x, y: this.y});
            }
        }
    }


    function init() {
        window.addEventListener("mousemove", onMouseMove);
        window.addEventListener("touchmove", onTouchMove);
        //hoverButton = new HoverButton("button");
        // eslint-disable-next-line no-new
        //new Circle("circle-content");
        lastFrame += new Date();
        buildDots();
        render();
    }

    /*function limit(value, min, max) {
        return Math.min(Math.max(min, value), max);
    }*/

    function startIdleTimer() {
        timeoutID = setTimeout(goInactive, idleTimeout);
        idle = false;
    }

    function resetIdleTimer() {
        clearTimeout(timeoutID);
        startIdleTimer();
    }

    function goInactive() {
        idle = true;
        for (let dot of dots) {
            dot.lock();
        }
    }

    function buildDots() {
        for (let i = 0; i < amount; i++) {
            let dot = new Dot(i);
            dots.push(dot);
        }
    }

    const onMouseMove = event => {
        mousePosition.x = event.clientX - width / 2;
        mousePosition.y = event.clientY - width / 2;
        resetIdleTimer();
    };

    const onTouchMove = () => {
        mousePosition.x = event.touches[0].clientX - width / 2;
        mousePosition.y = event.touches[0].clientY - width / 2;
        resetIdleTimer();
    };

    const render = timestamp => {
        const delta = timestamp - lastFrame;
        positionCursor(delta);
        lastFrame = timestamp;
        requestAnimationFrame(render);
    };

    const positionCursor = delta => {
        let x = mousePosition.x;
        let y = mousePosition.y;
        dots.forEach((dot, index, dots) => {
            let nextDot = dots[index + 1] || dots[0];
            dot.x = x;
            dot.y = y;
            dot.draw(delta);
            if (!idle || index <= sineDots) {
                const dx = (nextDot.x - dot.x) * 0.35;
                const dy = (nextDot.y - dot.y) * 0.35;
                x += dx;
                y += dy;
            }
        });
    };

    init();

    // const b2bModalEl = document.getElementById('b2b-modal');
    // if (b2bModalEl) {
    //     const b2bCookieName = 'delis_b2b_modal_dismissed';
    //
    //     function getB2bCookie(name) {
    //         const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    //         return match ? match[2] : null;
    //     }
    //
    //     function setB2bCookie(name, value, days) {
    //         const expires = new Date(Date.now() + days * 864e5).toUTCString();
    //         document.cookie = name + '=' + value + '; expires=' + expires + '; path=/';
    //     }
    //
    //     if (!getB2bCookie(b2bCookieName)) {
    //         const b2bModal = new bootstrap.Modal(b2bModalEl);
    //         const b2bSteps = b2bModalEl.querySelectorAll('.b2b-modal-step');
    //
    //         function showB2bStep(index) {
    //             b2bSteps.forEach(function (step, i) {
    //                 step.classList.toggle('active', i === index);
    //             });
    //         }
    //
    //         b2bModal.show();
    //
    //         const b2bNextBtn = b2bModalEl.querySelector('[data-b2b-next]');
    //         if (b2bNextBtn) {
    //             b2bNextBtn.addEventListener('click', function () {
    //                 showB2bStep(1);
    //             });
    //         }
    //
    //         b2bModalEl.querySelectorAll('[data-b2b-modal-close]').forEach(function (closeBtn) {
    //             closeBtn.addEventListener('click', function () {
    //                 setB2bCookie(b2bCookieName, '1', 365);
    //                 b2bModal.hide();
    //             });
    //         });
    //     }
    // }

})();


