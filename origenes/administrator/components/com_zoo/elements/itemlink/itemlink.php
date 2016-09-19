<?php
/**
* @package   ZOO Component
* @file      itemlink.php
* @version   2.0.1 May 2010
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

/*
	Class: ElementItemLink
		The item link element class
*/
class ElementItemLink extends Element {

	/*
		Function: hasValue
			Checks if the element's value is set.

	   Parameters:
			$params - render parameter

		Returns:
			Boolean - true, on success
	*/
	public function hasValue($params = array()) {
		return true;
	}
	
	/*
	   Function: edit
	       Renders the edit form field.

	   Returns:
	       String - html
	*/
	public function edit() {
		return null;
	}
		
	/*
		Function: render
			Renders the element.

	   Parameters:
            $params - render parameter

		Returns:
			String - html
	*/
	public function render($params = array()) {
		if (!empty($this->_item)) {
			$params    = new YArray($params);
			$menu_item = $params->get('menu_item');
			$itemid	   = $menu_item ? '&Itemid='.$menu_item : '';
			$url	   = 'index.php?option=com_zoo&task=item&item_id='.$this->getItem()->id.$itemid;
			
			return '<a href="' . JRoute::_($url). '">' . JText::_('Read more') . '</a>';
		}
	}
	
}