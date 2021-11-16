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
HTMLHelper::_( 'script', 'components/com_hrms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
?>
<div ng-app="Site" ng-controller="Site" ng-init="ReadCauhoi()">
     <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
  <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
    <input ng-model="timkiem" type="text" class="form-control w-100 fmxw-300" id="exampleInputIconLeft" placeholder="Tìm Câu Hỏi" aria-label="Search" aria-describedby="basic-addon3">
    
  </div>

</div>
<div class="task-wrapper border bg-white shadow border-0 rounded">
  <div class="card hover-state border-bottom rounded-0 rounded-top py-3" ng-repeat="lch in ListCauhoi |filter:timkiem">
    <div class="card-body d-sm-flex align-items-center flex-wrap flex-lg-nowrap py-0">
      <div class="px-0 mb-4 mb-md-0">
        <div class="mb-2">
          <h3 class="h5 text-danger">{{$index+1}}. {{lch.attributes.Cauhoi}}</h3>     
        </div>
        <div class="card p-3 bg-success text-white">{{lch.attributes.Traloi}}</div>
      </div> 
    </div>
  </div>
<!--
  <div class="row p-4">
    <div class="col-7 mt-1">Showing 1 - 20 of 289</div>
    <div class="col-5">
      <div class="btn-group float-end"><a href="#" class="btn btn-gray-100">
        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
        </a><a href="#" class="btn btn-gray-800">
        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
        </svg>
        </a></div>
    </div>
  </div>
-->
</div>
</div>
