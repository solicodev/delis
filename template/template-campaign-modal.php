<div class="modal" id="painting-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
        <div class="modal-content">
            <a data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="48" viewBox="0 0 23 48" fill="none">
                    <path class="line" d="M22 24L1 46.5M1 24L22 46.5" stroke="#FFCD00" stroke-width="2"
                          stroke-linecap="round"/>
                    <path class="heart"
                          d="M17.4051 1.04384C12.2381 0.508416 11.4519 5.03243 11.4519 6.17166C11.4519 5.03243 10.5323 1.04384 6.31856 1.04384C2.03173 1.04384 1.02335 5.83599 2.9077 8.30826C5.18783 11.2998 11.4519 16 11.4519 16C11.4519 16 18.0527 11.1722 19.9635 8.30826C22.2442 4.89001 20.4791 1.36237 17.4051 1.04384Z"
                          stroke="#FFCD00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <ul class="nav nav-pills mb-4 steps-nav d-flex align-items-center justify-content-between p-0">
                <li class="nav-item"><a class="nav-link active" href="#">1</a></li>
                <li class="separator"></li>
                <li class="nav-item"><a class="nav-link" href="#">2</a></li>
                <li class="separator"></li>
                <li class="nav-item"><a class="nav-link" href="#">3</a></li>
                <li class="separator"></li>
                <li class="nav-item"><a class="nav-link" href="#">4</a></li>
            </ul>

            <form id="multiForm">

                <div class="step active">
                    <p class="mb-5">
                        اول اطلاعاتت رو وارد کن تا بتونی فایل نقاشیت رو آپلود کنی و وارد دنیای دلیس بشی!
                    </p>
                    <div class="form-input">
                        <label for="name-input" class="form-label">نام خالق نقاشی</label>
                        <input id="name-input" type="text" class="form-control" required>
                        <div class="invalid-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M6.54618 1.17241C7.4037 -0.390805 9.5974 -0.390805 10.4538 1.17241L16.7087 12.5747C17.5494 14.108 16.4699 16 14.756 16H2.2451C0.530048 16 -0.549426 14.108 0.291285 12.5747L6.54618 1.17241ZM9.62094 12.5529C9.62094 12.8577 9.50284 13.1501 9.29262 13.3656C9.0824 13.5812 8.79729 13.7023 8.49999 13.7023C8.2027 13.7023 7.91758 13.5812 7.70736 13.3656C7.49714 13.1501 7.37904 12.8577 7.37904 12.5529C7.37904 12.248 7.49714 11.9557 7.70736 11.7401C7.91758 11.5245 8.2027 11.4034 8.49999 11.4034C8.79729 11.4034 9.0824 11.5245 9.29262 11.7401C9.50284 11.9557 9.62094 12.248 9.62094 12.5529ZM8.49999 3.35747C8.2027 3.35747 7.91758 3.47857 7.70736 3.69413C7.49714 3.90969 7.37904 4.20205 7.37904 4.5069V7.95517C7.37904 8.26002 7.49714 8.55238 7.70736 8.76794C7.91758 8.9835 8.2027 9.1046 8.49999 9.1046C8.79729 9.1046 9.0824 8.9835 9.29262 8.76794C9.50284 8.55238 9.62094 8.26002 9.62094 7.95517V4.5069C9.62094 4.20205 9.50284 3.90969 9.29262 3.69413C9.0824 3.47857 8.79729 3.35747 8.49999 3.35747Z"
                                      fill="#D81F25"/>
                            </svg>
                            نام خود را وارد کنید.
                        </div>
                    </div>
                    <div class="form-input">
                        <label class="form-label" for="birthdatae-input">سال تولد</label>
                        <input type="number" class="form-control" id="birthdatae-input" required>
                        <div class="invalid-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M6.54618 1.17241C7.4037 -0.390805 9.5974 -0.390805 10.4538 1.17241L16.7087 12.5747C17.5494 14.108 16.4699 16 14.756 16H2.2451C0.530048 16 -0.549426 14.108 0.291285 12.5747L6.54618 1.17241ZM9.62094 12.5529C9.62094 12.8577 9.50284 13.1501 9.29262 13.3656C9.0824 13.5812 8.79729 13.7023 8.49999 13.7023C8.2027 13.7023 7.91758 13.5812 7.70736 13.3656C7.49714 13.1501 7.37904 12.8577 7.37904 12.5529C7.37904 12.248 7.49714 11.9557 7.70736 11.7401C7.91758 11.5245 8.2027 11.4034 8.49999 11.4034C8.79729 11.4034 9.0824 11.5245 9.29262 11.7401C9.50284 11.9557 9.62094 12.248 9.62094 12.5529ZM8.49999 3.35747C8.2027 3.35747 7.91758 3.47857 7.70736 3.69413C7.49714 3.90969 7.37904 4.20205 7.37904 4.5069V7.95517C7.37904 8.26002 7.49714 8.55238 7.70736 8.76794C7.91758 8.9835 8.2027 9.1046 8.49999 9.1046C8.79729 9.1046 9.0824 8.9835 9.29262 8.76794C9.50284 8.55238 9.62094 8.26002 9.62094 7.95517V4.5069C9.62094 4.20205 9.50284 3.90969 9.29262 3.69413C9.0824 3.47857 8.79729 3.35747 8.49999 3.35747Z"
                                      fill="#D81F25"/>
                            </svg>
                            سال تولد خود را وارد کنید.
                        </div>
                    </div>
                    <div class="form-input">
                        <label class="form-label" for="phone-input">شماره موبایل</label>
                        <input type="text" id="phone-input" class="form-control" required>
                        <div class="invalid-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M6.54618 1.17241C7.4037 -0.390805 9.5974 -0.390805 10.4538 1.17241L16.7087 12.5747C17.5494 14.108 16.4699 16 14.756 16H2.2451C0.530048 16 -0.549426 14.108 0.291285 12.5747L6.54618 1.17241ZM9.62094 12.5529C9.62094 12.8577 9.50284 13.1501 9.29262 13.3656C9.0824 13.5812 8.79729 13.7023 8.49999 13.7023C8.2027 13.7023 7.91758 13.5812 7.70736 13.3656C7.49714 13.1501 7.37904 12.8577 7.37904 12.5529C7.37904 12.248 7.49714 11.9557 7.70736 11.7401C7.91758 11.5245 8.2027 11.4034 8.49999 11.4034C8.79729 11.4034 9.0824 11.5245 9.29262 11.7401C9.50284 11.9557 9.62094 12.248 9.62094 12.5529ZM8.49999 3.35747C8.2027 3.35747 7.91758 3.47857 7.70736 3.69413C7.49714 3.90969 7.37904 4.20205 7.37904 4.5069V7.95517C7.37904 8.26002 7.49714 8.55238 7.70736 8.76794C7.91758 8.9835 8.2027 9.1046 8.49999 9.1046C8.79729 9.1046 9.0824 8.9835 9.29262 8.76794C9.50284 8.55238 9.62094 8.26002 9.62094 7.95517V4.5069C9.62094 4.20205 9.50284 3.90969 9.29262 3.69413C9.0824 3.47857 8.79729 3.35747 8.49999 3.35747Z"
                                      fill="#D81F25"/>
                            </svg>
                            <span id="phone-error">
                            شماره موبایل نادرست است. لطفاً دوباره امتحان کنید.
                                </span>
                        </div>
                    </div>
                    <div class="d-flex gap-3 step-buttons">
                        <button type="button" class="delis-btn prevBtn">بستن</button>
                        <button type="button" id="send-otp-btn-login" class="delis-btn secondary nextBtn">ارسال کد
                            تایید
                        </button>
                    </div>
                </div>

                <div class="step" id="otp-form">
                    <p class="mb-3">کد ارسال شده به شماره <span id="otp-mobile"></span> رو وارد کنید.</p>
                    <div class="digits-group" dir="ltr">
                        <input pattern="[0-9]" maxlength="1" min="0" max="9" type="number"
                               class="form-control input-digits"
                               id="digits-1"
                               name="digits-1" data-next="digits-2">
                        <input pattern="[0-9]" maxlength="1" min="0" max="9" type="number"
                               class="form-control input-digits"
                               id="digits-2"
                               name="digits-2" data-next="digits-3" data-previous="digits-1">
                        <input pattern="[0-9]" maxlength="1" type="number" class="form-control input-digits"
                               id="digits-3"
                               name="digits-3" min="0" max="9" data-next="digits-4" data-previous="digits-2">
                        <input pattern="[0-9]" maxlength="1" min="0" max="9" type="number"
                               class="form-control input-digits"
                               id="digits-4"
                               name="digits-4" data-previous="digits-3">
                    </div>
                    <div class="my-3">
                        <div class="otp-timer d-flex justify-content-between align-items-center flex-row-reverse">
                            <div class="">
                                <span id="otp-timer">02:00</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="28" viewBox="0 0 27 28"
                                     fill="none">
                                    <path d="M13.3333 0C20.6973 0 26.6667 6.23633 26.6667 13.9297C26.6667 21.6231 20.6973 27.8594 13.3333 27.8594C5.96933 27.8594 0 21.6231 0 13.9297C0 6.23633 5.96933 0 13.3333 0ZM13.3333 5.57189C12.9797 5.57189 12.6406 5.71864 12.3905 5.97988C12.1405 6.24111 12 6.59542 12 6.96486V13.9297C12.0001 14.2991 12.1406 14.6534 12.3907 14.9145L16.3907 19.0935C16.6421 19.3472 16.9789 19.4876 17.3285 19.4844C17.6781 19.4813 18.0125 19.3348 18.2598 19.0765C18.507 18.8182 18.6472 18.4688 18.6502 18.1036C18.6533 17.7384 18.5189 17.3865 18.276 17.1238L14.6667 13.353V6.96486C14.6667 6.59542 14.5262 6.24111 14.2761 5.97988C14.0261 5.71864 13.687 5.57189 13.3333 5.57189Z"
                                          fill="#10069F"/>
                                </svg>
                            </div>
                            <a id="otp-resend" style="display: none">ارسال مجدد</a>
                        </div>
                    </div>
                    <div class="my-3">
                        <span id="digits-error"></span>
                    </div>
                    <div class="d-flex gap-3 step-buttons">
                        <?php wp_nonce_field('verify_otp', 'phone_auth_nonce'); ?>
                        <button type="button" class="delis-btn prevBtn">قبلی</button>
                        <button type="button" id="register-complete" class="delis-btn secondary nextBtn">تکمیل ثبت نام
                        </button>
                    </div>
                </div>

                <div class="step">
                    <p class="mb-3">نقاشی را اینجا بارگذاری کنید و در مسابقه شرکت کنید!</p>
                    <div class="mb-3">
                        <div class="upload-zone">
                            <!--                            <svg class="upload-bg" xmlns="http://www.w3.org/2000/svg" width="290" height="290"-->
                            <!--                                 viewBox="0 0 290 290" fill="none">-->
                            <!--                                <path opacity="0.1"-->
                            <!--                                      d="M144.75 144.75L0.75 0.75M144.75 144.75L288.75 0.75M144.75 144.75L0.75 288.75M144.75 144.75L288.75 288.75M0.75 0.75V72.75M0.75 0.75H72.75M288.75 0.75V72.75M288.75 0.75H216.75M0.75 288.75V216.75M0.75 288.75H72.75M288.75 288.75V216.75M288.75 288.75H216.75"-->
                            <!--                                      stroke="#10069F" stroke-width="1.5" stroke-linecap="round"-->
                            <!--                                      stroke-linejoin="round"/>-->
                            <!--                            </svg>-->
                            <label for="upload-paint" id="upload-button">
                                انتخاب از گالری
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29"
                                     fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M11.6 0C8.2708 0 5.82191 0.110844 4.15022 0.230067C2.02356 0.382156 0.382156 2.02291 0.230067 4.15087C0.110844 5.82191 0 8.2708 0 11.6C0 14.9292 0.110844 17.3781 0.230067 19.0498C0.378289 21.121 1.93784 22.7315 3.98396 22.9551C3.9024 21.1045 3.86329 19.2524 3.86667 17.4C3.86667 14.0276 3.9788 11.533 4.10189 9.81296C4.32229 6.72607 6.72607 4.32229 9.81296 4.10189C11.533 3.97944 14.0276 3.86667 17.4 3.86667C19.6233 3.86667 21.4645 3.91564 22.9551 3.98396C22.7315 1.93784 21.121 0.378289 19.0498 0.230067C17.3781 0.110844 14.9292 0 11.6 0ZM17.4 5.8C14.0708 5.8 11.6219 5.91084 9.95022 6.03007C7.82356 6.18216 6.18216 7.82291 6.03007 9.95087C5.91084 11.6219 5.8 14.0708 5.8 17.4C5.8 20.7292 5.91084 23.1781 6.03007 24.8498C6.18216 26.9764 7.82291 28.6178 9.95087 28.7699C11.6219 28.8892 14.0708 29 17.4 29C20.7292 29 23.1781 28.8892 24.8498 28.7699C26.9764 28.6178 28.6178 26.9771 28.7699 24.8491C28.8892 23.1781 29 20.7292 29 17.4C29 14.0708 28.8892 11.6219 28.7699 9.95022C28.6178 7.82356 26.9771 6.18216 24.8491 6.03007C23.1781 5.91084 20.7292 5.8 17.4 5.8ZM19.9778 12.2444C19.9778 11.5608 20.2494 10.9051 20.7328 10.4217C21.2162 9.93825 21.8719 9.66667 22.5556 9.66667C23.2392 9.66667 23.8949 9.93825 24.3783 10.4217C24.8617 10.9051 25.1333 11.5608 25.1333 12.2444C25.1333 12.9281 24.8617 13.5838 24.3783 14.0672C23.8949 14.5506 23.2392 14.8222 22.5556 14.8222C21.8719 14.8222 21.2162 14.5506 20.7328 14.0672C20.2494 13.5838 19.9778 12.9281 19.9778 12.2444ZM27.0132 21.1958C26.3278 20.5697 25.6266 19.9612 24.9104 19.3707C23.9482 18.5832 22.6567 18.4588 21.6005 19.1632C20.9148 19.6208 19.9945 20.3006 18.8107 21.3034C17.012 19.5911 15.756 18.4975 14.9182 17.8118C13.9554 17.0249 12.664 16.8999 11.6077 17.6043C10.7326 18.1882 9.47269 19.1361 7.772 20.6564C7.81453 22.3397 7.88542 23.6827 7.95889 24.7119C8.04267 25.8802 8.9204 26.758 10.0888 26.8411C11.7108 26.9571 14.1133 27.0667 17.4 27.0667C20.6867 27.0667 23.0892 26.9571 24.7119 26.8411C25.8802 26.7573 26.758 25.8802 26.8411 24.7119C26.9068 23.7948 26.97 22.629 27.0132 21.1958Z"
                                          fill="#0A1F8F"/>
                                </svg>
                            </label>
                            <input type="file" accept="image/png,image/jpg,image/jpeg" class="d-none" id="upload-paint"
                                   name="upload-paint">
                            <div>فرمت‌های قابل قبول: JPEG، PNG (حداکثر حجم: ۵۰ مگابایت)</div>
                        </div>
                    </div>
                    <div class="my-4">
                        <div id="statusText" class="mt-2 text-muted"></div>
                        <div class="progress">
                            <div id="progressBar" class="progress-bar" style="width: 0%">0%</div>
                        </div>

                    </div>
                    <div class="d-flex gap-3 step-buttons">
                        <button type="button" class="delis-btn prevBtn">لغو</button>
                        <button type="submit" class="delis-btn secondary">ارسال</button>
                    </div>
                </div>
                <div class="step my-3">
                    <div class="d-flex gap-3 py-5 align-items-center justify-content-center flex-column">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                            <path d="M36 0C28.8799 0 21.9197 2.11136 15.9995 6.06709C10.0793 10.0228 5.46511 15.6453 2.74035 22.2234C0.0155981 28.8015 -0.697322 36.0399 0.691746 43.0232C2.08081 50.0066 5.50948 56.4211 10.5442 61.4558C15.5789 66.4905 21.9934 69.9192 28.9768 71.3083C35.9601 72.6973 43.1985 71.9844 49.7766 69.2597C56.3547 66.5349 61.9772 61.9207 65.9329 56.0005C69.8886 50.0803 72 43.1201 72 36C72 26.4522 68.2072 17.2955 61.4558 10.5442C54.7045 3.79285 45.5478 0 36 0ZM59.5125 23.9175L29.9475 53.46L12.4875 36C11.8908 35.4033 11.5555 34.5939 11.5555 33.75C11.5555 32.9061 11.8908 32.0967 12.4875 31.5C13.0843 30.9033 13.8936 30.568 14.7375 30.568C15.5814 30.568 16.3908 30.9033 16.9875 31.5L29.9925 44.505L55.0575 19.4625C55.353 19.167 55.7038 18.9326 56.0898 18.7727C56.4759 18.6128 56.8896 18.5305 57.3075 18.5305C57.7254 18.5305 58.1391 18.6128 58.5252 18.7727C58.9113 18.9326 59.262 19.167 59.5575 19.4625C59.853 19.758 60.0874 20.1087 60.2473 20.4948C60.4072 20.8809 60.4895 21.2946 60.4895 21.7125C60.4895 22.1304 60.4072 22.5441 60.2473 22.9302C60.0874 23.3162 59.853 23.667 59.5575 23.9625L59.5125 23.9175Z"
                                  fill="#59B03F"/>
                        </svg>
                        <p>نقاشی شما با موفقیت ارسال شد.</p>
                        <div class="d-flex gap-3 step-buttons">
                            <button type="button" data-bs-dismiss="modal" class="delis-btn secondary">بازگشت به سایت</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>