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
$this->idUser = Factory::getUser()->get('id');
$this->id = Factory::getApplication()->input->get('id');
$groups = Factory::getUser()->get('groups');
$admin  = ($groups[8]==8)?'1':'0';
?>
<div ng-init="idUser='<?php echo $this->idUser;?>'" class="col-12 d-flex align-items-center justify-content-center">
    
 <?php 
   	switch ($this->LoaiTM) :
		case 1: echo $this->loadTemplate('lotrinh'); break;
		case 2: echo $this->loadTemplate('lotrinh'); break;
		case 11: echo $this->loadTemplate('chedo'); break;
		case 3: echo $this->loadTemplate('bienban'); break;
		case 4: echo $this->loadTemplate('daumoi'); break;
		case 12: echo $this->loadTemplate('chucnang'); break;
		case 5: echo $this->loadTemplate('cacphongban'); break;
		case 6: echo $this->loadTemplate('tungphongban'); break;
		case 13: echo $this->loadTemplate('baocao'); break;
		case 14: echo $this->loadTemplate('phaply'); break;
		default:
			echo $this->loadTemplate('lotrinh'); break;
	endswitch; 

    ?>
</div>
