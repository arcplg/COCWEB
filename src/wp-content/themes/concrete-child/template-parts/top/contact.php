<?php 
    $idContactForm = (get_locale() == "vi") ? 76 : 48;
    $group_contact = get_field("group_contact");
?>
<section class="p-home_register" id="contact">
    <div class="container">
        <div class="p-home_register_info wow slideInLeft" data-wow-delay="0.5s">
            <?php if( have_rows('group_contact') ): ?>
                <div class="p-home_register_info_thank-you">
                        <p class="thank-you"><?php echo $group_contact['text_thank_you'] ?></p>
                        <p class="introduce-concrete"><?php echo $group_contact['text_introduce_company'] ?></p>
                        <!-- <div class="download-box">
                            <p class="hint-download"><?php echo $group_contact['text_if_you_want_the_document'] ?></p>
                            <button class="download-box_btn"><?php echo $group_contact['download_the_document'] ?></button>
                        </div> -->
                </div>
                <div class="p-home_register_info_hotline">
                    <?php echo $group_contact['hot_line'] ?>: <span class="phone-concrete">(+84) 932 183 178</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="p-home_register_form wow slideInRight" data-wow-delay="0.5s">
            <?php echo do_shortcode('[contact-form-7 id="'.$idContactForm.'" title="Contact form"]'); ?>            
        </div>
    </div>
</section>