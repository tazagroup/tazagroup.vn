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
<div ng-app="Site" ng-controller="Site" ng-init="ReadTinnhan(<?php echo $User->get('id'); ?>)"> 
  <div class="message-wrapper border-0 bg-white shadow rounded mb-4">
    <div class="card hover-state border-bottom rounded-0 rounded-top py-3">
        <div class="card-body d-flex align-items-center flex-wrap flex-lg-nowrap py-0">
            <div class="col-1 align-items-center px-0 d-none d-lg-flex">
                <div class="form-check inbox-check me-2 mb-0">
                    <input class="form-check-input" type="checkbox" value="" id="mailCheck1" />
                    <label class="form-check-label" for="mailCheck1"></label>
                </div>
                <svg class="icon icon-sm rating-star d-none d-lg-inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    ></path>
                </svg>
            </div>
            <div class="col-10 col-lg-2 ps-0 ps-lg-3 pe-lg-3">
                <a href="#" class="d-flex align-items-center">
                    <div class="avatar-sm rounded-circle me-3"><i class="fas fa-user-circle"></i></div>
                    <span class="h6 fw-bold mb-0">Admin</span>
                </a>
            </div>
            <div class="col-2 col-lg-2 d-flex align-items-center justify-content-end px-0 order-lg-4">
                <div class="text-muted small d-none d-lg-block">11:01 AM</div>
            </div>
            <div class="col-12 col-lg-7 d-flex align-items-center mt-3 mt-lg-0 ps-0">
                <a href="#" class="fw-normal text-gray-600-900 truncate-text" data-bs-toggle="modal" data-bs-target="#modal-default">
                    <span class="fw-bold ps-lg-5">Thông Báo Cuộc Họp Ngày Mai - </span>
                    <span class="fw-bold d-none d-md-inline">Nội dung cuộc họp triển khai HRM</span>
                </a>
            </div>
        </div>
    </div>
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Tin Nhắn Từ Admin</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<div class="row justify-content-center mt-3 p-4">
    <div class="col-12">
        <div class="card border-0 shadow p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="font-small d-flex">
                    <div class="avatar-sm img-fluid rounded-circle me-2"><i class="fas fa-user-circle"></i></div>
                        <span class="fw-bold">Admin</span>
                    <span class="fw-normal ms-2">March 26, 19:25</span>
                </span>
                <div class="d-none d-sm-block">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <p class="m-0">Xin Chào ! Nhân Viên 1. Ngày mai chúng ta có cuộc họp về phần mềm nha.</p>
        </div>
        <div class="card bg-gray-800 text-white border-0 shadow p-4 ms-md-5 ms-lg-6 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="d-none d-sm-block">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="font-small d-flex">
                    <div class="avatar-sm img-fluid rounded-circle me-2"><i class="fas fa-user-circle"></i></div>
                        <span class="fw-bold">Tên Nhân Viên</span>
                    <span class="fw-normal ms-2">March 26, 19:25</span>
                </span>
            </div>
            <p class="text-gray-300 m-0 text-end">Xin chào admin! Nhân viên 1 nhận thông tin nha.</p>
        </div>
        <div class="card border-0 shadow p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="font-small d-flex">
                    <div class="avatar-sm img-fluid rounded-circle me-2"><i class="fas fa-user-circle"></i></div>
                        <span class="fw-bold">Admin</span>
                    <span class="fw-normal ms-2">March 26, 19:25</span>
                </span>
                <div class="d-none d-sm-block">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <p class="m-0">Nhớ chuẩn bị các tài liệu liên quan để chuẩn bị cho cuộc họp nha</p>
        </div>
        <div class="card border-0 shadow p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="font-small d-flex">
                    <div class="avatar-sm img-fluid rounded-circle me-2"><i class="fas fa-user-circle"></i></div>
                        <span class="fw-bold">Admin</span>
                    <span class="fw-normal ms-2">March 26, 19:25</span>
                </span>
                <div class="d-none d-sm-block">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <p class="m-0">À gửi trước cho tôi xem qua nhé. Cảm ơn</p>
        </div>
        <div class="card bg-gray-800 text-white border-0 shadow p-4 ms-md-5 ms-lg-6 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="d-none d-sm-block">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="font-small d-flex">
                    <div class="avatar-sm img-fluid rounded-circle me-2"><i class="fas fa-user-circle"></i></div>
                        <span class="fw-bold">Tên Nhân Viên</span>
                    <span class="fw-normal ms-2">March 26, 19:25</span>
                </span>
            </div>
            <p class="text-gray-300 m-0 text-end">Vâng ạ</p>
        </div>
        <form action="#" class="mt-4 mb-5">
            <textarea class="form-control border-0 shadow mb-4" id="message" placeholder="Your Message" rows="6" maxlength="1000" required=""></textarea>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="file-field">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex align-items-center">
                            <svg class="icon icon-md text-gray-400 me-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
                            </svg>
                            <input type="file" />
                            <div class="d-block text-left d-sm-block">
                                <div class="fw-normal text-dark mb-lg-1">Đính kèm File</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary d-inline-flex align-items-center text-dark">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                fill-rule="evenodd"
                                d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        Reply
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>    
 
</div>

</div>    
    
