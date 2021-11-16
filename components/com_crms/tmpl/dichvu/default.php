<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_hrms
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' )or die;

use Joomla\ CMS\ Factory;
use Joomla\ CMS\ Filter\ OutputFilter;
use Joomla\ CMS\ HTML\ HTMLHelper;
use Joomla\ CMS\ Language\ Text;
use Joomla\ CMS\ Layout\ FileLayout;
HTMLHelper::_( 'script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://kendo.cdn.telerik.com/2021.2.616/js/kendo.all.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_crms/js/qrcode.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_crms/js/html5-qrcode.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_crms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'stylesheet', 'components/com_crms/css/main.css', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
?>
<div class="col-12 d-flex align-items-center justify-content-center mt-3">
    
    </div>
