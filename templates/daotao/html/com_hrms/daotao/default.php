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
use Joomla\ CMS\ Router\ Route;
$this->User = Factory::getUser();
$this->idUser = Factory::getUser()->get('id');
$this->id = Factory::getApplication()->input->get('id');
$groups = Factory::getUser()->get('groups');
$admin  = ($groups[8]==8)?'1':'0';

?>
<div ng-init="ReadPQ('<?php echo $this->idUser; ?>');">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary">
  <div class="container position-relative">
    <div class="navbar-collapse collapse w-100" id="navbar-default-primary">
      <ul class="menudaotao navbar-nav navbar-nav-hover align-items-lg-center">
    <li class="nav-item">
        <a href="https://tazagroup.vn/thong-tin-ca-nhan/quan-ly-cong-viec.html#item-215" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">HRM</span>
            </span>
        </a>
    </li>
   <li class="nav-item" ng-if="Quyen.pq17">
        <a href="/dao-tao-dashboard.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Dashboard</span>
            </span>
        </a>
    </li>       
    <li class="nav-item" ng-if="Quyen.pq1">
        <a href="/tai-lieu-nguon.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Tài Liệu Nguồn</span>
            </span>
        </a>
    </li>
    <li class="nav-item" ng-if="Quyen.pq2">
        <a href="/dao-tao-cau-hoi.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Câu hỏi</span>
            </span>
        </a>
    </li>
    <li class="nav-item" ng-if="Quyen.pq3">
        <a href="/dao-tao-de-thi.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Đề Thi</span>
            </span>
        </a>
    </li>
    <li class="nav-item" ng-if="Quyen.pq4">
        <a href="/dao-tao-bai-hoc.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Bài học</span>
            </span>
        </a>
    </li>
     <li class="nav-item" ng-if="Quyen.pq4">
        <a href="/dao-tao-lop-hoc.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Lớp học</span>
            </span>
        </a>
    </li>        
    <li class="nav-item" ng-if="Quyen.pq5">
        <a href="/dao-tao-nhom-nguoi-dung.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Nhóm người</span>
            </span>
        </a>
    </li>
    <li class="nav-item" ng-if="Quyen.pq6">
        <a href="/dao-tao-ky-thi.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Kỳ Thi</span>
            </span>
        </a>
    </li>
    <li class="nav-item" ng-if="Quyen.pq7">
        <a href="/dao-tao-quy-trinh.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Quy Trình</span>
            </span>
        </a>
    </li>   
    <li class="nav-item" ng-if="Quyen.pq7">
        <a href="/dao-tao-yeu-cau.html" class="nav-link">
            <span>
                <span class="sidebar-icon"><i class=""></i></span><span class="sidebar-text">Yêu Cầu</span>
            </span>
        </a>
    </li>
  <?php if($admin=='1') : ?>        
    <li class="nav-item">
<div class="dropdown nav-link">
                  <div class="dropdown-toggle text-white" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                   Cài Đặt 
                  </div>
                  <ul class="dropdown-menu">
                  <li class="p-2" ng-click="SetQuyen(pq.id)" ng-repeat="pq in RNhomnguoidung"><span class="ms-2">{{pq.Tennhom}}</span></li>    
                  </ul>
                </div>
    </li>   
     <?php endif; ?>         
</ul>
<div class="ms-auto">
            <div class="dropdown dropstart">
              <div class="dropdown-toggle text-white" data-bs-toggle="dropdown" data-bs-auto-close="outside"> <span class="badge bg-danger">{{version}}</span> </div>
              <ul class="dropdown-menu" style="width: 50vw;">
                <div class="p-3 d-flex">
                    Cập Nhật <span class="ms-auto"><i class="fas fa-exclamation-circle fs-4 text-danger" data-bs-toggle="modal" data-bs-target="#fixbug"></i></span>
                  </div>
                  <hr/>
                <div class="p-3">
           <div class="row overflow-scroll">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded text-center table-bordered">
            <thead>
                <tr>
                <th scope="col" style="width: 10%">#</th>
                <th scope="col">Nội Dung</th>
                <th scope="col" style="width: 10%">Cấp Độ</th>
              </tr>
              </thead>
            <tbody>
                <tr ng-repeat="x in RAFixbug">
                <td style="width: 10%">
                          {{$index+1}}
                    
                    </td>
                <td><span ng-bind-html="x.Noidung"></span></td>
                <td style="width: 10%" ng-click="UpdateFixbug(x)">
                 <span class="badge" ng-class="x.Trangthai==0?'bg-danger':'bg-info'"> {{x.Level}}</span>
                </div>
                    
                    </td>
              </tr>
              </tbody>
          </table>
          </div>
      </div>
                  </div>
              </ul>
            </div>
          </div> 
    </div>
  </div>
</nav>
<div class="col-12 d-flex align-items-center justify-content-center">
    
 <?php 
   	switch ($this->id) :
		case 0: echo $this->loadTemplate('dashboard'); break;
		case 1: echo $this->loadTemplate('tailieunguon'); break;
		case 2: echo $this->loadTemplate('cauhoi'); break;
		case 3: echo $this->loadTemplate('dethi'); break;
		case 4: echo $this->loadTemplate('baihoc'); break;
		case 5: echo $this->loadTemplate('nhomnguoidung'); break;
		case 6: echo $this->loadTemplate('kythi'); break;
		case 7: echo $this->loadTemplate('quytrinh'); break;
		case 8: echo $this->loadTemplate('baocao'); break;
		case 9: echo $this->loadTemplate('lophoc'); break;
		case 10: echo $this->loadTemplate('lophoc_chitiet'); break;
		case 11: echo $this->loadTemplate('yeucau'); break;
		default:
        echo $this->loadTemplate('dashboard'); break;
	   endswitch; 

    ?>
</div>

<div class="modal fade" id="fixbug" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Fix Lỗi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">
                    <div class="mb-3">
                        Nội DUng
                      <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Fixbug.Noidung" class="form-control text-danger"></textarea>
                    </div>
                    <div class="mb-3">
                     <div class="input-group"> 
                         <span class="input-group-text">Cấp độ</span>
                        <select class="form-control text-danger" ng-model="Fixbug.Level">
                          <option value="1" selected>Cấp độ 1</option>
                          <option value="2">Cấp độ 2</option>
                          <option value="3">Cấp độ 3</option>
                        </select>
                      </div>  
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" class="btn btn-info" ng-click="CreateFixbug(Fixbug)"> Gửi Lỗi</button>
                </div>
              </div>
            </div>
          </div>
</div>
