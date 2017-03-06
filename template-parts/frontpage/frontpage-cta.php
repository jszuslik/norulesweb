<?php

?>
<!--========== PROMO BLOCK ==========-->
<div class="s-promo-block-v1 g-bg-color--dark-light">
    <div class="container g-padding-y-100--xs">
        <div class="row g-margin-t-30--xs g-margin-t-20--sm">
            <div class="col-lg-6 col-md-6 col-sm-12 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
                    <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white"><?php echo get_bloginfo('description'); ?></h1>
                    <p class="g-font-size-20--xs g-font-size-20--md g-color--white g-margin-b-0--xs">
                        <?php echo get_the_content(); ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-12 g-hor-centered-row__col">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                    <form class="center-block g-width-350--xs g-bg-color--white-opacity-lightest g-box-shadow__light-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4">
                        <div class="g-text-center--xs g-margin-b-40--xs">
                            <h2 class="g-font-size-30--xs g-color--white">Start Investing In Your Digital Future Right Now</h2>
                        </div>
                        <div class="g-margin-b-30--xs">
                            <input type="text" class="form-control s-form-v3__input" placeholder="* Name">
                        </div>
                        <div class="g-margin-b-30--xs">
                            <input type="email" class="form-control s-form-v3__input" placeholder="* Email">
                        </div>
                        <div class="g-margin-b-30--xs">
                            <input type="text" class="form-control s-form-v3__input" placeholder="* Phone">
                        </div>
                        <div class="g-text-center--xs">
                            <button type="submit" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs">Signup</button>
<!--                            <a class="g-color--white g-font-size-13--xs" href="#">Forgot Password?</a>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--========== END PROMO BLOCK ==========-->
