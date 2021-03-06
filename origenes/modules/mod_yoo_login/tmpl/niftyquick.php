<?php
/**
* YOOlogin Joomla! Module
*
* @author    yootheme.com
* @copyright Copyright (C) 2007 YOOtheme Ltd. & Co. KG. All rights reserved.
* @license	 GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php if($type == 'logout') : ?>
<form action="index.php" method="post" name="login">
<?php else : ?>
<?php if(JPluginHelper::isEnabled('authentication', 'openid')) :
		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
		$langScript = 	'var JLanguage = {};'.
						' JLanguage.WHAT_IS_OPENID = \''.JText::_( 'WHAT_IS_OPENID' ).'\';'.
						' JLanguage.LOGIN_WITH_OPENID = \''.JText::_( 'LOGIN_WITH_OPENID' ).'\';'.
						' JLanguage.NORMAL_LOGIN = \''.JText::_( 'NORMAL_LOGIN' ).'\';'.
						' var modlogin = 1;';
		$document = &JFactory::getDocument();
		$document->addScriptDeclaration( $langScript );
		JHTML::_('script', 'openid.js');
endif; ?>
<form action="<?php echo JRoute::_( 'index.php', true, $params->get('usesecure')); ?>" method="post" name="login">
<?php endif; ?>

<span class="<?php echo $style ?>" style="display: block;">
	<span class="yoo-login">
	
		<?php if($type == 'logout') : ?>
		<span class="logout">
		
			<?php if ($params->get('greeting')) : ?>
			<span class="greeting"><?php echo JText::sprintf( 'HINAME', $user->get('name') ); ?></span>
			<?php endif; ?>
			
			<span class="logout-button">
				<button value="<?php echo JText::_( 'BUTTON_LOGOUT'); ?>" name="Submit" type="submit" title="<?php echo JText::_('BUTTON_LOGOUT'); ?>"><?php echo JText::_( 'BUTTON_LOGOUT'); ?></button>
			</span>
		
			<input type="hidden" name="option" value="com_user" />
			<input type="hidden" name="task" value="logout" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
			
		</span>
		
		<?php else : ?>
		<span class="login">
		
			<?php echo $params->get('pretext'); ?>
			
			<span class="username">
			
				<input type="text" name="username" size="18" value="<?php echo JText::_( 'Username' ); ?>" onblur="if(this.value=='') this.value='<?php echo JText::_( 'Username' ); ?>';" onfocus="if(this.value=='<?php echo JText::_( 'Username' ); ?>') this.value='';" />
				
			</span>
			
			<span class="password">
			
				<input type="password" name="passwd" size="10" value="<?php echo JText::_( 'Password' ); ?>" onblur="if(this.value=='') this.value='<?php echo JText::_( 'Password' ); ?>';" onfocus="if(this.value=='<?php echo JText::_( 'Password' ); ?>') this.value='';" />
				
			</span>

			<?php if(JPluginHelper::isEnabled('system', 'remember')) : ?>
			<input type="hidden" name="remember" value="yes" />
			<?php endif; ?>
			
			<span class="login-button">
				<button value="<?php echo JText::_( 'BUTTON_LOGIN'); ?>" name="Submit" type="submit" title="<?php echo JText::_('BUTTON_LOGIN'); ?>"><?php echo JText::_( 'BUTTON_LOGIN'); ?></button>
			</span>
			
			<?php if ( $lost_password ) { ?>
			<span class="lostpassword">
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' ); ?>" title="<?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?>"></a>
			</span>
			<?php } ?>
			
			<?php if ( $lost_username ) { ?>
			<span class="lostusername">
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' ); ?>" title="<?php echo JText::_('FORGOT_YOUR_USERNAME'); ?>"></a>
			</span>
			<?php } ?>
			
			<?php
			$usersConfig = &JComponentHelper::getParams( 'com_users' );
			if ($usersConfig->get('allowUserRegistration') && $registration) { ?>
			<span class="registration">
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=register' ); ?>" title="<?php echo JText::_( 'REGISTER'); ?>"></a>
			</span>
			<?php } ?>
			
			<?php echo $params->get('posttext'); ?>
			
			<input type="hidden" name="option" value="com_user" />
			<input type="hidden" name="task" value="login" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
			<?php echo JHTML::_( 'form.token' ); ?>

		</span>
		
		<?php endif; ?>
		
	</span>
</span>
</form>