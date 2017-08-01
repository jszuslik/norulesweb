<?php
    $page_slug = 'about-no-rules-web';
    $page = get_post(get_page_id_by_slug($page_slug));
    $content = apply_filters('get_the_content', $page->post_content);
    $parent_title = get_the_title($page->post_parent);
    $array = preg_split('/\s+/', get_the_title($page));
?>
<div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-50--sm cf">
    <div class="g-text-center--xs">
        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Welcome to No Rules Web</p>
        <h2 class="g-font-size-32--xs g-font-size-26--md"><?php echo $content; ?></h2>
    </div>
</div>
