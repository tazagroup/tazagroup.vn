<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Webservices.Crms
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Router\ApiRouter;
/**
 * Web Services adapter for com_crms.
 *
 * @since  4.0.0
 */
class PlgWebservicesCrms extends CMSPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  4.0.0
	 */
	protected $autoloadLanguage = true;
	/**
	 * Registers com_crms's API's routes in the application
	 *
	 * @param   ApiRouter  &$router  The API Routing object
	 *
	 * @return  void
	 *
	 * @since   4.0.0
	 */
	public function onBeforeApiRoute(&$router)
	{
		$router->createCRUDRoutes(
			'v1/crms/crms',
			'crms',
			['component' => 'com_crms']
		);
        $router->createCRUDRoutes(
			'v1/crms/nhapkhos',
			'nhapkhos',
			['component' => 'com_crms']
		);
		$router->createCRUDRoutes(
			'v1/crms/xuatkhos',
			'xuatkhos',
			['component' => 'com_crms']
		);
		$router->createCRUDRoutes(
			'v1/crms/tonkhos',
			'tonkhos',
			['component' => 'com_crms']
		);
		$router->createCRUDRoutes(
			'v1/crms/nguyenvatlieus',
			'nguyenvatlieus',
			['component' => 'com_crms']
		);
		$router->createCRUDRoutes(
			'v1/crms/orderncc',
			'orderncc',
			['component' => 'com_crms']
		);					
		$router->createCRUDRoutes(
			'v1/crms/chuyenkhos',
			'chuyenkhos',
			['component' => 'com_crms']
		);		
        $router->createCRUDRoutes(
			'v1/crms/chuyenkhocts',
			'chuyenkhocts',
			['component' => 'com_crms']
		);		
		$router->createCRUDRoutes(
			'v1/crms/categories',
			'categories',
			['component' => 'com_categories', 'extension' => 'com_crms']
		);
	}
}
