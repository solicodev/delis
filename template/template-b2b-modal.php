<?php
$b2b_image_base = get_template_directory_uri() . '/assets/images/';
?>
<div class="modal fade" id="b2b-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="b2bModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="b2b-modal-step active" data-b2b-step="1">
                <div class="b2b-modal-media">
                    <picture class="b2b-modal-picture">
                        <source media="(min-width: 992px)"
                                srcset="<?php echo esc_url( $b2b_image_base . 'popup-desktop-1.png' ); ?>">
                        <img src="<?php echo esc_url( $b2b_image_base . 'popup-mobile-1.png' ); ?>"
                             alt="" class="b2b-modal-image">
                    </picture>
                    <button type="button" class="delis-btn secondary" data-b2b-next>ادامه</button>
                </div>
            </div>
            <div class="b2b-modal-step" data-b2b-step="2">
                <div class="b2b-modal-media">
                    <picture class="b2b-modal-picture">
                        <source media="(min-width: 992px)"
                                srcset="<?php echo esc_url( $b2b_image_base . 'popup-desktop-2.png' ); ?>">
                        <img src="<?php echo esc_url( $b2b_image_base . 'popup-mobile-2.png' ); ?>"
                             alt="" class="b2b-modal-image">
                    </picture>
                    <button type="button" class="delis-btn secondary" data-b2b-modal-close>بستن</button>
                </div>
            </div>
        </div>
    </div>
</div>
