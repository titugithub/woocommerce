<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

?>


<section class="breadcrumb-section tt set-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php woocommerce_page_title(); ?></h2>
					<div class="breadcrumb__option">
						<a href="<?php echo site_url()?>">Home</a>
						<span><?php woocommerce_page_title(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="shop-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-5">
				<?php do_action('woocommerce_sidebar');?>
			</div>
			<div class="col-lg-9 col-md-7">



			<?php
			if (woocommerce_product_loop()) {

				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();


						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');
					}
				}

				woocommerce_product_loop_end();

				do_action('woocommerce_after_shop_loop');
			} else {
	
				do_action('woocommerce_no_products_found');
			}

			?>
				</div>
			</div>
		</div>
	</section>

<?php




get_footer('shop');
