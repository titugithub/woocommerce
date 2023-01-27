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
						<a href="<?php echo site_url() ?>">Home</a>
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
				<?php do_action('woocommerce_sidebar'); ?>
			</div>
			<div class="col-lg-9 col-md-7">

				<div class="product__discount">
					<div class="section-title product__discount__title">
						<h2>Sale Off</h2>
					</div>
					<div class="row">
						<div class="product__discount__slider owl-carousel">
							<?php
							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'meta_query'     => array(
									array(
										'key'           => '_sale_price',
									)
								)
							);
							$query = new WP_Query($args);
							while ($query->have_posts()) {
								$query->the_post();
								?>
								<div class="col-lg-4">
									<?php wc_get_template_part('content', 'product'); ?>
								</div>
							<?php
							}
							?>

							<div class="col-lg-4">
								<div class="product__discount__item">
									<div class="product__discount__item__pic set-bg" data-setbg="img/product/discount/pd-5.jpg">
										<div class="product__discount__percent">-20%</div>
										<ul class="product__item__pic__hover">
											<li><a href="#"><i class="fa fa-heart"></i></a></li>
											<li><a href="#"><i class="fa fa-retweet"></i></a></li>
											<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
										</ul>
									</div>
									<div class="product__discount__item__text">
										<span>Dried Fruit</span>
										<h5><a href="#">Raisin’n’nuts</a></h5>
										<div class="product__item__price">$30.00 <span>$36.00</span></div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="product__discount__item">
									<div class="product__discount__item__pic set-bg" data-setbg="img/product/discount/pd-6.jpg">
										<div class="product__discount__percent">-20%</div>
										<ul class="product__item__pic__hover">
											<li><a href="#"><i class="fa fa-heart"></i></a></li>
											<li><a href="#"><i class="fa fa-retweet"></i></a></li>
											<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
										</ul>
									</div>
									<div class="product__discount__item__text">
										<span>Dried Fruit</span>
										<h5><a href="#">Raisin’n’nuts</a></h5>
										<div class="product__item__price">$30.00 <span>$36.00</span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

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
