<?php
/** content-store-front.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * The Store Front template uses this to output Store Front content. 
 * To override this template in a child theme, copy this file into the 
 * root/templates folder of your child theme and make ADJUSTMENTS there. 
 * Use this file as a starting point so you don't lose any variables, 
 * constants, etc.
 *
 * @package Volatyl
 * @since Volatyl 1.2.2
 */

// HTML structure flexibility
if ($options_structure['wide'] == 1) : 
	echo "<div id=\"main-content\" class=\"store-front full clearfix\"><div class=\"main\">";
else :
	echo "<div id=\"main-content\" class=\"store-front clearfix\">";
endif; ?>

<div class="products inner">
	<div class="products-container clearfix">
	<?php if ($products->have_posts()) : $i = 1; ?>
		<?php while ($products->have_posts()) : $products->the_post(); ?>
			<div class="product-box product<?php if($i % 4 == 0) { echo ' last'; } ?> border-box">
				<a class="product-title" href="<?php the_permalink(); ?>">
					<h2><?php the_title(); ?></h2>
				</a>
				<div class="product-image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('product-image'); ?>
					</a>
					<?php if(function_exists('edd_price')) { ?>
						<div class="product-price">
							<?php	
							if (edd_has_variable_prices(get_the_ID())) {
	
								// if the download has variable prices,
								// show the first one as a starting price
								_e($item_info['starting_price'] . ' ', 'volatyl'); 
								edd_price(get_the_ID());
							} elseif ('0' != edd_get_download_price(get_the_ID()) && !edd_has_variable_prices( get_the_ID())) {
								_e($item_info['price'] . ' ', 'volatyl'); 
								edd_price(get_the_ID()); 
							} else {
								_e($item_info['free'] . ' ','volatyl');
							} ?>
						</div>
					<?php } ?>
				</div>
				<?php if(function_exists('edd_price')) { ?>
					<div class="product-buttons">
						<?php if(!edd_has_variable_prices(get_the_ID())) { ?>
							<?php echo edd_get_purchase_link(get_the_ID(), __('Add to Cart', 'volatyl'), 'button'); ?>
						<?php } else { ?>
							<a href="<?php the_permalink(); ?>"><?php _e('View Details', 'volatyl'); ?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<?php $i+=1; ?>
		<?php endwhile; ?>
	</div>		
	<div class="product-pagination">
		<?php 			
			// need an unlikely integer		
			$big = 999999999;				
			echo paginate_links(array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'current' => max(1, $current_page),
				'total' => $products->max_num_pages
			));
		?>
	</div>
	<?php else : ?>
		<div class="no-results-found">
			<h2><?php _e('Not Found', 'volatyl'); ?></h2>
			<p><?php _e('Sorry, but you are looking for something that isn\'t here. Try searching.', 'volatyl'); ?></p>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div>

<?php
// HTML structure flexibility
echo (($options_structure['wide'] == 1) ? '</div>' : '');
echo "</div>";