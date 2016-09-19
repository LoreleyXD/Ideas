<?php
/**
* @package   ZOO Component
* @file      category.php
* @version   2.0.1 May 2010
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// include assets css/js
if (strtolower(substr($GLOBALS['mainframe']->getTemplate(), 0, 3)) != 'yoo') {
	JHTML::stylesheet('reset.css', 'media/zoo/assets/css/');
}
JHTML::stylesheet('zoo.css.php', $this->template->getURI().'/assets/css/');

// show description only if it has content
if (!$this->category->description) {
	$this->params->set('template.show_description', 0);
}

// show image only if an image is selected
if (!($image = $this->category->getImage('content.image'))) {
	$this->params->set('template.show_image', 0);
}

$css_class = $this->application->getGroup().'-'.$this->template->name;

?>

<div id="yoo-zoo" class="yoo-zoo <?php echo $css_class; ?> <?php echo $css_class.'-'.$this->category->alias; ?>">

	<?php if ($this->params->get('template.show_alpha_index')) : ?>
		<?php echo $this->partial('alphaindex'); ?>
	<?php endif; ?>
	
	<?php if ($this->params->get('template.show_title') || $this->params->get('template.show_description') || $this->params->get('template.show_image')) : ?>
	<div class="details <?php echo 'align-'.$this->params->get('template.alignment'); ?>">
	
		<?php if ($this->params->get('template.show_title')) : ?>
		<h1 class="title"><?php echo $this->category->name; ?></h1>
		<?php endif; ?>

		<?php if ($this->params->get('template.show_description') || $this->params->get('template.show_image')) : ?>
		<div class="description">
			<?php if ($this->params->get('template.show_image')) : ?>
				<img class="image" src="<?php echo $image['src']; ?>" title="<?php echo $this->category->name; ?>" alt="<?php echo $this->category->name; ?>" <?php echo $image['width_height']; ?>/>
			<?php endif; ?>
			<?php if ($this->params->get('template.show_description')) echo $this->category->getText($this->category->description); ?>
		</div>
		<?php endif; ?>
	
	</div>
	<?php endif; ?>		
	
	
	<?php

		// render categories
		$has_categories = false;
		if ($this->category->countChildrensItems()) {
			$has_categories = true;
			echo $this->partial('categories');
		}
		
	?>
	
	<?php

		// render items
		if (count($this->items)) {
			$itemstitle = '';
			$itemstitle = $this->category->getParams()->get('items_title');
			echo $this->partial('items', compact('itemstitle', 'has_categories'));
		}
		
	?>

</div>