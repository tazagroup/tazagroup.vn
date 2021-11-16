<?php
namespace Joomla\Component\Hrms\Site\Controller;
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\AdminController;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Filesystem\Path;	 
use Joomla\CMS\Uri\Uri;
class TailieuController extends AdminController
{
    function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
	public function uploadFile() {      
	$upload   = $this->input->files->get('file'); 
    $name = $this->convert_name($upload['name']);        
    $fileName = File::makeSafe($name);  
    $str = str_replace(' ','_',$fileName);
    $today = date("Y_m_d_h_i");
   // $today = str_replace('/','_',$today);    
    $link = '/tailieu/'.$today.'_'. $str;
    $result = File::upload($upload['tmp_name'], Path::clean(JPATH_ROOT.$link));
     print_r($link);   
    }
    
  	public function uploadFileEditor() {    
        
	$upload   = $this->input->files->get('file'); 
    $name = $this->convert_name($upload['name']);        
    $fileName = File::makeSafe($name);  
    $str = str_replace(' ','_',$fileName);
    $today = date("Y_m_d_h_i");
   // $today = str_replace('/','_',$today);    
    $link = '/hinhanh/'.$today.'_'. $str;
    $result = File::upload($upload['tmp_name'], Path::clean(JPATH_ROOT.$link));
     print_r($link);  
        
        
    }
    
    
    
   	public function uploadMultiFile() {     
	$upload   = $this->input->files->get('file'); 
    $name = $this->convert_name($upload['name']);        
    $fileName = File::makeSafe($name);  
    $str = str_replace(' ','_',$fileName);
    $today = date("Y-m-d");
   // $today = str_replace('/','_',$today);    
    $link = '/multifile/'.$today.'_'. $str;
    $data = new \stdClass;     
    $data->name =  str_replace('-',' ',pathinfo($str,PATHINFO_FILENAME));
    $data->flink =  $link;
    $result = File::upload($upload['tmp_name'], Path::clean(JPATH_ROOT.$link)); 
        //print_r($link);  
    print_r(json_encode((array)$data));      
    } 
    
   	public function RemoveUpload() { 
    $data = json_decode(file_get_contents('php://input'));   
    $file =  $data->flink; 
    File::delete(Path::clean(JPATH_ROOT.$file)); 
    }     
    
    
    public function uploadhrm() {     
	$upload   = $this->input->files->get('file'); 
	$thumuc   = $this->input->get('data'); 
    $name = $this->convert_name($upload['name']);        
    $fileName = File::makeSafe($name);  
    $str = str_replace(' ','_',$fileName);
    $today = date("Y-m-d");
   // $today = str_replace('/','_',$today);    
    $link = '/multifile/'.$thumuc.'/'.$today.'_'. $str;
    $data = new \stdClass;     
    $data->name =  str_replace('-',' ',pathinfo($str,PATHINFO_FILENAME));
    $data->flink =  $link;
    $data->flink =  $link; 
    $result = File::upload($upload['tmp_name'], Path::clean(JPATH_ROOT.$link)); 
     //print_r($link);  
    print_r(json_encode((array)$data));         
    } 
	
}