<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
if (Configure::read() == 0):
	$this->cakeError('error404');
endif;
?>
<h2><?php echo sprintf(__('Release Notes for CakePHP %s.', true), Configure::version()); ?></h2>
<a href="http://cakephp.lighthouseapp.com/projects/42648/changelog-1-2-6"><?php __('Read the changelog'); ?> </a>
<?php
if (Configure::read() > 0):
	Debugger::checkSessionKey();
endif;
?>
<p>
	<?php
		if (is_writable(TMP)):
			echo '<span class="notice success">';
				__('Your tmp directory is writable.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				__('Your tmp directory is NOT writable.');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$settings = Cache::settings();
		if (!empty($settings)):
			echo '<span class="notice success">';
					echo sprintf(__('The %s is being used for caching. To change the config edit APP/config/core.php ', true), '<em>'. $settings['engine'] . 'Engine</em>');
			echo '</span>';
		else:
			echo '<span class="notice">';
					__('Your cache is NOT working. Please check the settings in APP/config/core.php');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$filePresent = null;
		if (file_exists(CONFIGS.'database.php')):
			echo '<span class="notice success">';
				__('Your database configuration file is present.');
				$filePresent = true;
			echo '</span>';
		else:
			echo '<span class="notice">';
				__('Your database configuration file is NOT present.');
				echo '<br/>';
				__('Rename config/database.php.default to config/database.php');
			echo '</span>';
		endif;
	?>
</p>
<?php
if (isset($filePresent)):
	uses('model' . DS . 'connection_manager');
	$db = ConnectionManager::getInstance();
	@$connected = $db->getDataSource('default');
?>
<p>
	<?php
		if ($connected->isConnected()):
			echo '<span class="notice success">';
	 			__('Cake is able to connect to the database.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				__('Cake is NOT able to connect to the database.');
			echo '</span>';
		endif;
	?>
</p>
<?php endif;?>
<h3><?php __('Editing this Page'); ?></h3>
<p>
<?php
__('To change the content of this page, create: APP/views/pages/home.ctp.<br />
To change its layout, create: APP/views/layouts/default.ctp.<br />
You can also add some CSS styles for your pages at: APP/webroot/css.');
?>
</p>
<h3><?php __('Getting Started'); ?></h3>
<p>
	<a href="http://book.cakephp.org"><strong>new</strong> CakePHP 1.2 Docs</a>
</p>
<p>
	<a href="http://book.cakephp.org/view/219/the-cakephp-blog-tutorial"><?php __('The 15 min Blog Tutorial'); ?></a><br />
</p>
<h3><?php __('More about Cake'); ?></h3>
<p>
<?php __('CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.'); ?>
</p>
<p>
<?php __('Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.'); ?>
</p>
<br />
<ul>
	<li><a href="http://www.cakefoundation.org/"><?php __('Cake Software Foundation'); ?> </a>
	<ul><li><?php __('Promoting development related to CakePHP'); ?></li></ul></li>
	<li><a href="http://www.cakephp.org"><?php __('CakePHP'); ?> </a>
	<ul><li><?php __('The Rapid Development Framework'); ?></li></ul></li>
	<li><a href="http://book.cakephp.org"><?php __('CakePHP Documentation'); ?> </a>
	<ul><li><?php __('Your Rapid Development Cookbook'); ?></li></ul></li>
	<li><a href="http://api.cakephp.org"><?php __('CakePHP API'); ?> </a>
	<ul><li><?php __('Quick Reference'); ?></li></ul></li>
	<li><a href="http://bakery.cakephp.org"><?php __('The Bakery'); ?> </a>
	<ul><li><?php __('Everything CakePHP'); ?></li></ul></li>
	<li><a href="http://live.cakephp.org"><?php __('The Show'); ?> </a>
	<ul><li><?php __('The Show is a live and archived internet radio broadcast CakePHP-related topics and answer questions live via IRC, Skype, and telephone.'); ?></li></ul></li>
	<li><a href="http://groups.google.com/group/cake-php"><?php __('CakePHP Google Group'); ?> </a>
	<ul><li><?php __('Community mailing list'); ?></li></ul></li>
	<li><a href="irc://irc.freenode.net/cakephp">irc.freenode.net #cakephp</a>
	<ul><li><?php __('Live chat about CakePHP'); ?></li></ul></li>
	<li><a href="http://github.com/cakephp/"><?php __('CakePHP Code'); ?> </a>
	<ul><li><?php __('For the Development of CakePHP Git repository, Downloads'); ?></li></ul></li>
	<li><a href="http://cakephp.lighthouseapp.com/"><?php __('CakePHP Lighthouse'); ?> </a>
	<ul><li><?php __('CakePHP Tickets, Wiki pages, Roadmap'); ?></li></ul></li>
	<li><a href="http://www.cakeforge.org"><?php __('CakeForge'); ?> </a>
	<ul><li><?php __('Open Development for CakePHP'); ?></li></ul></li>
	<li><a href="http://astore.amazon.com/cakesoftwaref-20/"><?php __('Book Store'); ?> </a>
	<ul><li><?php __('Recommended Software Books'); ?></li></ul></li>
	<li><a href="http://www.cafepress.com/cakefoundation"><?php __('CakePHP gear'); ?> </a>
	<ul><li><?php __('Get your own CakePHP gear - Doughnate to Cake'); ?></li></ul></li>
</ul>