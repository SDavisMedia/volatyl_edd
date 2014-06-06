<?php
/** edd-options.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * EDD options tab
 *
 * @package Volatyl
 * @since Volatyl 1.4
 */
?>
<h3><?php _e('Easy Digital Downloads Settings', 'volatyl'); ?></h3>
<div class="instructions radius">
	<p>
		<?php 
			printf(__('You must install and activate the %1$s plugin to effectively use these options. %2$s is a well-rounded plugin with its own %3$s and %4$s that you should use to customize your online store. If you are unsure whose support to visit for assistance, please visit the %5$s first.', 'volatyl'),
				'<a href="http://wordpress.org/plugins/easy-digital-downloads/" target="_blank">Easy Digital Downloads</a>',
				'<abbr title="Easy Digital Downloads">EDD</abbr>',
				'<a href="http://easydigitaldownloads.com/documentation/" target="_blank">' . __('documentation', 'volatyl') . '</a>',
				'<a href="http://easydigitaldownloads.com/support/" target="_blank">' . __('support', 'volatyl') . '</a>',
				'<a href="http://support.volatylthemes.com/" target="_blank">Volatyl Themes ' . __('Support', 'volatyl') . '</a>');
		?>
	</p>
</div>

<?php
	/** With the Volatyl EDD settings in an array in the 
	 * $vedd variable, create checkbox and corresponding
	 * label for each option setting.
	 *
	 * Close out the table, display submit button to save
	 * all options and close form.
	 */
	foreach ($vedd as $vd) {
		echo
		(isset($vd['table']) ? $vd['table'] : ''),
		$vd['tr'],
		$vd['th'],
		$vd['td'];
		?>
		<input class="checkbox-space" id="vol_edd_options[<?php echo $vd['title']; ?>]" name="vol_edd_options[<?php echo $vd['title']; ?>]" type="checkbox" value="1" <?php checked('1', $options_edd[$vd['title']], true); ?> />
		<label class="description label-space" for="vol_edd_options[<?php echo $vd['title']; ?>]">
			<?php echo $vd['label']; ?>
		</label>
		<?php
		echo
		(isset($vd['notes']) ? $vd['notes'] : ''),
		$vd['td_end'],
		$vd['tr_end'];
	}
?>
</table>
<hr>
<p><input name="volatyl_edd_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Save EDD Settings', 'volatyl'); ?>" /></p>