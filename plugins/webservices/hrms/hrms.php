<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Webservices.Hrms
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Router\ApiRouter;
/**
 * Web Services adapter for com_hrms.
 *
 * @since  4.0.0
 */
class PlgWebservicesHrms extends CMSPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  4.0.0
	 */
	protected $autoloadLanguage = true;
	/**
	 * Registers com_hrms's API's routes in the application
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
			'v1/hrms/hrms',
			'hrms',
			['component' => 'com_hrms']
		);
        $router->createCRUDRoutes(
			'v1/hrms/cauhois',
			'cauhois',
			['component' => 'com_hrms']
		);
         $router->createCRUDRoutes(
			'v1/hrms/lichhops',
			'lichhops',
			['component' => 'com_hrms']
		);
         $router->createCRUDRoutes(
			'v1/hrms/todos',
			'todos',
			['component' => 'com_hrms']
		);
        $router->createCRUDRoutes(
			'v1/hrms/tinnhans',
			'tinnhans',
			['component' => 'com_hrms']
		);       
         $router->createCRUDRoutes(
			'v1/hrms/caidats',
			'caidats',
			['component' => 'com_hrms']
		);
         $router->createCRUDRoutes(
			'v1/hrms/thumucs',
			'thumucs',
			['component' => 'com_hrms']
		); 
           $router->createCRUDRoutes(
			'v1/hrms/tailieus',
			'tailieus',
			['component' => 'com_hrms']
		);     
        $router->createCRUDRoutes(
			'v1/hrms/lotrinhs',
			'lotrinhs',
			['component' => 'com_hrms']
		);          
        $router->createCRUDRoutes(
			'v1/hrms/kehoachs',
			'kehoachs',
			['component' => 'com_hrms']
		);     
        $router->createCRUDRoutes(
			'v1/hrms/gtodos',
			'gtodos',
			['component' => 'com_hrms']
		);  
          $router->createCRUDRoutes(
			'v1/hrms/chudes',
			'chudes',
			['component' => 'com_hrms']
		);   
         $router->createCRUDRoutes(
			'v1/hrms/tailieunguons',
			'tailieunguons',
			['component' => 'com_hrms']
		); 
         $router->createCRUDRoutes(
			'v1/hrms/nganhangcauhois',
			'nganhangcauhois',
			['component' => 'com_hrms']
		);      
        $router->createCRUDRoutes(
			'v1/hrms/nhomnguoidungs',
			'nhomnguoidungs',
			['component' => 'com_hrms']
		); 
        $router->createCRUDRoutes(
			'v1/hrms/dethis',
			'dethis',
			['component' => 'com_hrms']
		);   
        $router->createCRUDRoutes(
			'v1/hrms/lophocs',
			'lophocs',
			['component' => 'com_hrms']
		);    
        $router->createCRUDRoutes(
			'v1/hrms/thongbaos',
			'thongbaos',
			['component' => 'com_hrms']
		);     
        $router->createCRUDRoutes(
			'v1/hrms/kiemtras',
			'kiemtras',
			['component' => 'com_hrms']
		);      
        $router->createCRUDRoutes(
			'v1/hrms/baihocs',
			'baihocs',
			['component' => 'com_hrms']
		);    
        $router->createCRUDRoutes(
			'v1/hrms/kythis',
			'kythis',
			['component' => 'com_hrms']
		);      
        $router->createCRUDRoutes(
			'v1/hrms/yeucaudaotaos',
			'yeucaudaotaos',
			['component' => 'com_hrms']
		);      
         $router->createCRUDRoutes(
			'v1/hrms/fixbugs',
			'fixbugs',
			['component' => 'com_hrms']
		);        
        $router->createCRUDRoutes(
			'v1/hrms/quytrinhdaotaos',
			'quytrinhdaotaos',
			['component' => 'com_hrms']
		); 
        $router->createCRUDRoutes(
			'v1/hrms/logins',
			'logins',
			['component' => 'com_hrms']
		);   
		$router->createCRUDRoutes(
			'v1/hrms/categories',
			'categories',
			['component' => 'com_categories', 'extension' => 'com_hrms']
		);
	}
}
