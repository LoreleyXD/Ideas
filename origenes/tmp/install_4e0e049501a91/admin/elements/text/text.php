<?php
/**
* @package   ZOO Component
* @file      text.php
* @version   2.0.1 May 2010
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// register yoo gallery class
JLoader::register('ElementRepeatable', ZOO_ADMIN_PATH.'/elements/repeatable/repeatable.php');

/*
   Class: ElementText
       The text element class
*/
class ElementText extends ElementRepeatable {

	/*
		Function: _getSearchData
			Get repeatable elements search data.
					
		Returns:
			String - Search data
	*/	
	protected function _getSearchData() {
		return $this->_data->get('value');
	}

	/*
	   Function: _edit
	       Renders the repeatable edit form field.

	   Returns:
	       String - html
	*/		
	protected function _edit() {

		// init vars
		$default = $this->_config->get('default');		
		
		// set default, if item is new
		if ($default != '' && $this->_item != null && $this->_item->id == 0) {
			$this->_data->set('value', $default);
		}

		return JHTML::_('control.text', 'elements[' . $this->identifier . '][' . $this->index() . '][value]', $this->_data->get('value'), 'size="60" maxlength="255"');		
		
	}
	
}