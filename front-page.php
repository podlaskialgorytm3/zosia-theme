<?php get_header()?>
<?php $images_offer_icon_dir = get_template_directory_uri() . '/assets/images/offer-icon'?>
<?php 
    $primary_image = get_field("zdjecie_glowne");
    $secondary_image = get_field("zdjecie_drugorzedne");
    $tetriarity_image1 = get_field("zdjecie_trzeciorzedne_1");
    $tetriarity_image2 = get_field("zdjecie_trzeciorzedne_2");
    ?>
<div class="baner-section">
    <div class="baner-left-section" >
        <img src="<?php echo $primary_image?>" alt="Primary img">
    </div>
    <div class="baner-right-section">
        <div class="wide-block">
            <img src="<?php echo $secondary_image?>" alt="secondary img">
        </div>
        <div class="narrow-block-section">
            <div class="narrow-block first-narrow-block">
                <img src="<?php echo $tetriarity_image1 ?>" alt="tetriary img 1">
            </div>
            <div class="narrow-block second-narrow-block">
                 <img src="<?php echo $tetriarity_image2 ?>" alt="tetriary img 2">
            </div>
        </div>
    </div>
</div>
<div class="offers">
    <div class="delivery offer">
        <img class="icon" src="<?php echo $images_offer_icon_dir . '/delivery.png'?>" alt="delivery">
        <b>Fast Free Shipping</b>
        <p>Around The World</p>
    </div>
    <div class="support offer">
        <img class="icon" src="<?php echo $images_offer_icon_dir . '/support.png'?>" alt="support">
        <b>24/7 Support</b>
        <p>Contact Us 24 Hours</p>
    </div>
    <div class="bank offer">
        <img class="icon" src="<?php echo $images_offer_icon_dir . '/piggy-bank.png'?>" alt="piggy-bank">  
        <b>Easy Money Back</b>
        <p>Gurantee of Money Reurn</p>
    </div>
    <div class="rocket offer">
        <img class="icon" src="<?php echo $images_offer_icon_dir . '/startup.png'?>" alt="startup">  
        <b>Store Search</b>
        <p>Quick Store Search</p>
    </div>
</div>
<div class="line"></div>
<h1>Trending Products</h1>
<div class="products">
    <?php 
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 5,
        );

        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ){
            $loop->the_post();
            get_template_part("template-parts/product");
        }

        wp_reset_query();
    ?>
</div>
<h1>Categories</h1>
<div class="categories">
<?php 
    $product_categories = get_terms( 'product_cat', 'hide_empty=0' );
    if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
        foreach ( $product_categories as $category ) {
            ?>
            <div class="category">
                <h4><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></h4>
                <?php
                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                ?>
                <?php if ( $image ) : ?>
                    <img src="<?php echo esc_url( $image ); ?>" alt="" />
                <?php endif; ?>
            </div>
            <?php
        }
    }

?>
</div>
<?php get_footer()?>