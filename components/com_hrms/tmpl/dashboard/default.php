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
HTMLHelper::_( 'script', 'https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.3/bootstrap-notify.min.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'https://balkan.app/js/latest/OrgChart.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
HTMLHelper::_( 'script', 'components/com_hrms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
?>
<div ng-app="Site" ng-controller="Site" ng-init="ReadSodo()">
<div class="row">
    <div class="col-sm-4 text-center p-3">
        <div class="card border shadow p-4">
        <div class="card-header">   
            <a class="btn btn-primary" href="/crmtaza">CRM</a>
          </div>
        <div class="card-body">
            <div> Quản trị quan hệ khách hàng</div>
          </div>
      </div>
    </div>
      <div class="col-sm-4 text-center p-3">
        <div class="card border shadow p-4">
        <div class="card-header">   
            <a class="btn btn-primary" href="/hrm">HRM</a>
          </div>
        <div class="card-body">
            <div>Quản trị nguồn nhân lực</div>
          </div>
      </div>
    </div>  
<!--
       <div class="col-4 text-center p-3">
        <div class="card border shadow p-4">
        <div class="card-header">   
            <a class="btn btn-primary" href="/">Tazagroup</a>
          </div>
        <div class="card-body">
            <div>Quản trị nguồn nhân lực</div>
          </div>
      </div>
    </div>
    <div class="col-4 text-center p-3">
        <div class="card border shadow p-4">
        <div class="card-header">   
            <a class="btn btn-primary" href="/">Tazaskin</a>
          </div>
        <div class="card-body">
            <div>Quản trị nguồn nhân lực</div>
          </div>
      </div>
    </div>   
-->
    
    </div> 
</div>
