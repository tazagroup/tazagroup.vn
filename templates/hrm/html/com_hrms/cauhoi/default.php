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
?>
<div ng-init="OninitCauhoi()">
  <div class="modal fade" id="modal-cauhoi">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="h6 modal-title">{{Cauhoi.Title}} Câu Hỏi</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row px-5">
            <div class="mb-3"> Câu Hỏi
              <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Cauhoi" class="form-control text-danger"></textarea>
            </div>
            <div class="mb-3"> Trả Lời
              <textarea ng-disabled="isdisabled" ui-tinymce="tinymceOptions" ng-model="Cauhoi.Traloi" class="form-control text-danger"></textarea>
            </div>
            <div class="input-group mb-3"> <span class="input-group-text">Bộ Phận</span>
              <select ng-model="Cauhoi.idPhongban" class="form-select">
                <option selected value="">Chọn Bộ Phận</option>
                <option value="{{bp.id}}" ng-repeat="bp in Bophan">{{bp.Thuoctinh}}</option>
              </select>
            </div>
            <div class="input-group mb-3"> <span class="input-group-text">Vị Trí</span>
              <select ng-model="Cauhoi.idVitri" class="form-select">
                <option selected value="">Chọn Vị Trí</option>
                <option value="{{vt.id}}" ng-repeat="vt in Vitri">{{vt.Thuoctinh}}</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button ng-click="CreateCauhoi(Cauhoi)" type="button" class="btn btn-primary" ng-show="Cauhoi.CRUD!=1">Tạo Mới</button>
          <button ng-click="UpdateCauhoi(Cauhoi)" type="button" class="btn btn-primary" ng-show="Cauhoi.CRUD==1">Cập Nhật</button>
        </div>
      </div>
    </div>
  </div>
  <!--    modal thêm câu hỏi end--> 
  
  <!--câu hỏi chung begin-->
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100" >
      <div class="mb-2">
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-cauhoi" ng-click="OninitCauhoi()"> <i class="fas fa-plus-circle me-2"></i> Thêm câu hỏi </button>
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-nhapdulieu" ng-click="OninitCauhoi()"> <i class="fas fa-upload"></i> Nhập </button>
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-xuatdulieu"><i class="fas fa-download"></i> Xuất </button>
      </div>
      <div class="my-2">
        <div class="alert alert-warning"> <i class="fas fa-exclamation-triangle"></i> Bảng câu hỏi này giúp mỗi thành viên trong tổ chức thuận lợi khi tìm hiểu, truy xuất các tài liệu liên quan đến chính sách, nội quy, quy định chung của Công ty cũng như liên quan đến bản thân/bộ phận mình (nói riêng). Tuy nhiên, nếu có điều nào về nội dung trong câu trả ở đây lời khác với những chính sách ban hành thì thực hiện theo chính sách ban hành hoặc theo chỉ đạo khác từ Ban Tổng Giám đốc thông qua thông báo từ P.Nhân sự (được hiểu là câu trả lời chưa kịp cập nhật điều chỉnh, bổ sung hoặc thay thế) . </div>
      </div>
      <div class="row">
        <div class="table-responsive-xl">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Câu Hỏi /Trả lời </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <input ng-model="timkiem" type="text" class="form-control col-12" placeholder="Tìm Kiếm">
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần">
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần">
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </th>
              <th scope="col"> <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Bộ Phận </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="w-100" ng-model="custom.idPhongban" ng-options="pb.id as pb.Thuoctinh for pb in Bophan">
                            <option value="" selected>Vui lòng chọn</option>
                          </select>
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần">
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần">
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
          </div>
          
          </th>
          
          <th scope="col">
              <div class="dropdown position-static">
                  <div class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="d-flex justify-content-center"><i class="fas fa-ellipsis-v me-2 my-auto"></i> Vị Trí </div>
                  </div>
                  <ul class="dropdown-menu">
                    <li class="p-2">
                      <div class="mb-3">
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                          <select chosen class="w-100" ng-model="custom.idVitri" ng-options="vt.id as vt.Thuoctinh for vt in Vitri">
                      <option value="" selected>Vui lòng chọn</option>
                    </select>
                        </div>
                        <div class="input-group mb-2"> <span class="input-group-text"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Tăng Dần">
                        </div>
                        <div class="input-group"> <span class="input-group-text"> <i class="fas fa-sort-amount-down"></i> </span>
                          <input disabled class="form-control col-12" placeholder="Giảm Dần">
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
            </th>
            <th scope="col"> Sửa/Xóa </th>
          </tr>
          </thead>
          
          <tbody>
            <tr ng-repeat="lch in ListCauhoi |filter:timkiem|filter:custom |orderBy:'-id'">
              <td align="center" valign="middle">{{$index+1}}</td>
              <td><div class="alert alert-danger font-weight-bold d-flex align-items-center"><i class="fas fa-question-circle text-danger me-2"></i> <div ng-bind-html="lch.Cauhoi"></div> </div>
                <div class="alert alert-success d-flex align-items-center"> <i class="fas fa-reply text-success me-2"></i> <span ng-bind-html="lch.Traloi"></span> </div>
              <td align="center" valign="middle">{{lch.idPhongban|Ftitle:Bophan}}</td>
              <td align="center" valign="middle">{{lch.idVitri|Ftitle:Vitri}}</td>
              <td class="d-flex"><button class="btn btn-info me-2" ng-click="editcauhoi(lch)" data-bs-toggle="modal" data-bs-target="#modal-cauhoi" ><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-XoaCauhoi" ><i class="fas fa-trash-alt"></i></button>
                <div class="modal fade" id="modal-XoaCauhoi" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Xóa Câu Hỏi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row p-3"> Bạn có chắc chắn xóa {{lch.Cauhoi}} </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button class="btn btn-danger" ng-click="DeleteCauhoi(lch)">Đồng ý</button>
                      </div>
                    </div>
                  </div>
                </div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
