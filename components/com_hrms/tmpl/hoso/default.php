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
HTMLHelper::_( 'script', 'components/com_hrms/js/main.js', array( 'version' => 'auto' ), array( 'defer' => 'true' ) );
$User = Factory::getUser();
?>
<div ng-app="Site" ng-controller="Site" ng-init="ReadHoso(<?php echo $User->get('id'); ?>)"> 
<div class="row">
  <div class="col-12 col-xl-4">
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card shadow border-0 text-center p-0">
          <div class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg" style="background: url(&quot;../assets/img/profile-cover.jpg&quot;);"></div>
          <div class="card-body pb-5">
             <img ng-src="{{Rhoso.hinhanh}}" class="dropdown-icon text-gray-400 me-2 avatar-xl rounded-circle mx-auto mt-n7 mb-4" ng-show="Rhoso.hinhanh!=null"/>
            <svg ng-show="Rhoso.hinhanh==null" class="dropdown-icon text-gray-400 me-2 avatar-xl rounded-circle mx-auto mt-n7 mb-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
            </svg>
            <h4 class="h3">{{Rhoso.name}}</h4>
            <p class="text-gray mb-0">ID : {{Rhoso.MaNV}}</p>
            <p class="text-gray mb-0">Phòng Ban</p>
            <p class="text-gray mb-0">Vị Trí</p>
            <p class="text-gray mb-0">Chi Nhánh</p>
<!--
            <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="#">
            <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
            </svg>
            Connect </a><a class="btn btn-sm btn-secondary" href="#">Send Message</a>
-->
            </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card card-body border-0 shadow mb-4 profile-social">
          <h2 class="h5 mb-4">Mạng Xã Hội</h2>
          <div class="d-flex align-items-center">
            <div class="me-3"> 
              Facebook : 
              </div>
            <div class="file-field">
              Chưa liên kết
            </div>
          </div>
            <div class="d-flex align-items-center">
            <div class="me-3"> 
              Zalo :
              </div>
            <div class="file-field">
              Chưa liên kết
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="me-3"> 
             Gmail : 
              </div>
            <div class="file-field">
              Chưa liên kết
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
<div class="col-12 col-xl-8">
    <div class="card card-body border-0 shadow mb-4">
      <h2 class="h5 mb-4">Thông Tin Nhân Viên</h2>
            <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Mã Nhân Viên</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.MaNV}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Họ Tên</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.name}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Giới Tính</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.Gioitinh|Gioitinh:Gioitinh}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Ngày Sinh</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.Ngaysinh}}">
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group mb-3"> <span class="input-group-text">Địa Chỉ</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.Diachi}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">SĐT</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.SDT}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Email</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.email}}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3"> <span class="input-group-text">Quốc Tịch</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.Quoctich}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="input-group mb-3"> <span class="input-group-text">Trình Độ</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.Trinhdo}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="input-group mb-3"> <span class="input-group-text">Trường Tốt Nghiệp</span>
                          <input class="form-control" type="text" disabled placeholder="{{Rhoso.TruongTN}}">
                        </div>
                      </div>
                    </div>  
    </div>   
    <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">Thông Tin Công Ty</h2>
        <div class="row">
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Chức Danh</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.Chucdanh}}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Phòng Ban</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.Phongban}}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Mã Số Thuế</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.MST}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Số BHXH</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.SoBHXH}}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Tình Trạng Làm Việc</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.TTLV}}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Tình Trạng Hồ Sơ</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.TTHS}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="input-group mb-3"> <span class="input-group-text">Số KCB</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.SoKCB}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="input-group mb-3"> <span class="input-group-text">Nơi KCB</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.NoiKCB}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Ngày Vào</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.Datein}}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Ngày Nghỉ</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.Dateout}}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group mb-3"> <span class="input-group-text">Thâm Niên</span>
              <input class="form-control" type="text" disabled placeholder="{{Rhoso.Thamnien}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="input-group mb-3"> <span class="input-group-text">Nguyên Nhân Nghỉ</span>
              <textarea class="form-control" disabled placeholder="{{Rhoso.LydoNghi}}"></textarea>
            </div>
          </div>
        </div>
      </div>
  </div>    
</div>
</div>    
    
