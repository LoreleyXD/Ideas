<?php
/**
* YOOcarousel Joomla! Module
*
* @author    yootheme.com
* @copyright Copyright (C) 2007 YOOtheme Ltd. & Co. KG. All rights reserved.
* @license	 GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="<?php echo $style ?>">
	<div id="<?php echo $carousel_id ?>" class="yoo-carousel" style="<?php echo $css_module_width . $css_module_height ?>">

		<div class="<?php echo $control_panel ?>">

			<ul class="tabs" style="<?php echo $css_module_width ?>">
				<?php for ($i=0; $i < $items; $i++) : ?>
					<li class="button item<?php echo $i + 1 ?>">
						<a href="javascript:void(0)" title="<?php echo $list[$i]->title ?>">
							<span><?php echo $list[$i]->title ?></span>
						</a>
					</li>
				<?php endfor; ?>
			</ul>
			
			<div class="frame-t1">
				<div class="frame-t2">
					<div class="frame-t3">
					</div>
				</div>
			</div>
	
			<div class="frame" style="<?php echo $css_module_width ?>">
				<div class="frame-container-1">
					<div class="frame-container-2" style="<?php echo $css_panel_height ?>">
							
							<div class="panel" style="<?php echo $css_panel_width ?>">
								<div style="<?php echo $css_total_panel_width ?>">
								<?php for ($i=0; $i < $items; $i++) : ?>
									<div class="slide" style="<?php echo $css_panel_width ?><?php echo $css_slide_position ?>">
										<?php modYOOcarouselHelper::renderItem($list[$i], $params, $access); ?>
									</div>
								<?php endfor; ?>
								</div>
							</div>
							
					</div>
				</div>
			</div>
			
			<div class="frame-b1">
				<div class="frame-b2">
					<div class="frame-b3">
					</div>
				</div>
			</div>
	
		</div>
		
	</div>
</div>