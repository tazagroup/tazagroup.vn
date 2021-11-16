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
use Joomla\CMS\Router\Route;
?>
<div ng-init="OninitTailieu();OninitThumuc(<?php echo $this->LoaiTM; ?>)" class="col-12 d-flex align-items-center justify-content-center">
  <div class="bg-white shadow border-0 rounded border-light p-3 w-100">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taothumuc"><i class="fas fa-folder-plus"></i> Tạo Thư Mục </button>
      <?php echo $this->file; ?>
          <div class="modal fade" id="Taothumuc" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> {{Thumuc.Title}} Việc</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Thư Mục </span>
                        <input type="text" class="form-control" placeholder="Tiêu Đề" ng-model="Thumuc.Tieude">
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="input-group"> 
                          <span class="input-group-text">Thư Mục Cha</span>
                        <select class="form-select" ng-model="Thumuc.Parent">
                          <option selected ng-value="0">Chọn Thư Mục Cha</option>
                          <option ng-value={{pr}} ng-repeat="pr in RLthumucs">{{pr.Tieude}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="input-group"> <span class="input-group-text">Mô Tả</span>
                          <textarea class="form-control" ng-model="Thumuc.Mota"></textarea>
                      </div>
                    </div>                    
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" ng-show="Thumuc.CRUD!=1" class="btn btn-primary" ng-click="CreateThumuc(Thumuc)"> Tạo Mới</button>
                  <button type="button" ng-show="Thumuc.CRUD==1" class="btn btn-primary" ng-click="UpdateThumuc(Dauviec)">Cập Nhật</button>
                </div>
              </div>
            </div>
          </div>
  
    
  <div class="row mt-3">  
    <div class="p-2 col-12 border" ng-repeat="dm in Rthumucs | orderBy:'data.path'">
    <div class="row">     
    <div class="p-3 col-sm-9">
        {{dm.data.level|level}} {{dm.data.toc}} {{dm.data.Tieude}} 
        </div>
        <div class="col-sm-3 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Taofile" ng-click="editTailieu(dm.data)"><i class="fas fa-file-upload"></i></button>
        </div>
       <div class="d-flex">
           
<div ng-repeat="file in dm.dulieu">           <button class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#Xempdf" ng-click="XemPDF(file.Link)">
               {{file.TenTailieu}}
<!--               <a ng-href="/tailieu/{{file.Link}}">{{file.TenTailieu}}</a>-->
           </button>
           
         <div class="modal fade" id="Xempdf" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">  
                         <iframe ng-src="{{url}}" style="width:100%; height:500px;" frameborder="0"></iframe>   
                  </div>
                </div>
              </div>
            </div>
          </div> </div> 
        </div>
    </div>
    </div>
  </div>
</div>
 <div class="row">
          <div class="modal fade" id="Taofile" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Thêm Tài Liệu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row p-3">   
                      <form id="UpTailieu" method="post" action="<?php echo Route::_('index.php?option=com_hrms&task=Tailieu.uploadFile');?>" enctype="multipart/form-data">
							<div class="input-group">
                                <input type="hidden" class="address" name="address">
								<input type="file" name="files" class="form-control" required onchange="angular.element(this).scope().loadFile(this.files)">
                                <?php echo HTMLHelper::_('form.token'); ?>
							</div>
                          </span>
						</form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" class="btn btn-primary" ng-click="CreateTailieu()"> Tạo Mới</button>
                </div>
              </div>
            </div>
          </div>
        </div>   
    
    
    </div>
