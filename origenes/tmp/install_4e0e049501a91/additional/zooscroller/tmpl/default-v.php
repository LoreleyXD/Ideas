<?php
/**
* @package   ZOO Scroller Module
* @file      default-v.php
* @version   1.5.0 May 2010
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="<?php echo $theme ?>">
	<div id="<?php echo $scroller_id ?>" class="yoo-scroller" style="<?php echo $css_module_width . $css_module_height ?>">

		<div class="panel-container-t" style="<?php echo $css_module_width ?>">
			<div class="panel-container-b">
				<div class="panel-container-l">
					<div class="panel-container-r">
						<div class="panel-container-tl">
							<div class="panel-container-tr">
								<div class="panel-container-bl">
									<div class="panel-container-br">

										<div class="panel" style="<?php echo $css_panel_width . $css_panel_height ?>">
											<?php foreach ($items as $item) : ?>
												<div class="slide" style="<?php echo $css_slide_width . $css_slide_height ?>">
													<div class="item"><?php echo $renderer->render('item.'.$layout, compact('item', 'params')); ?></div>
												</div>
											<?php endforeach; ?>
										</div>
								
										<?php if ($scrollbar) : ?>
										<div class="scrollarea" style="<?php echo $css_scrollarea_width ?>">
											<div class="scrollarea-t">
												<div class="scrollarea-b" style="<?php echo $css_scrollarea_height ?>">
										
													<div class="back"></div>
													<div class="scrollbar" style="<?php echo $css_scrollbar_width . $css_scrollbar_height ?>">
														<div class="scrollknob">
															<div class="scrollknob-b">
																<div class="scrollknob-m scrollknob-size">
																</div>
															</div>
														</div>
													</div>
													<div class="forward"></div>
											
												</div>
											</div>
										</div>
										<?php endif; ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>