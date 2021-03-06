<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

// Browsers support SVG favicons
$this->addHeadLink(HTMLHelper::_('image', 'joomla-favicon.svg', '', [], true, 1), 'icon', 'rel', ['type' => 'image/svg+xml']);
$this->addHeadLink(HTMLHelper::_('image', 'favicon.ico', '', [], true, 1), 'alternate icon', 'rel', ['type' => 'image/vnd.microsoft.icon']);
$this->addHeadLink(HTMLHelper::_('image', 'joomla-favicon-pinned.svg', '', [], true, 1), 'mask-icon', 'rel', ['color' => '#000']);

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu     = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';

// Template path
$templatePath = 'templates/' . $this->template;

// Color Theme
$paramsColorName = $this->params->get('colorName', 'colors_standard');
$assetColorName  = 'theme.' . $paramsColorName;
$wa->registerAndUseStyle($assetColorName, $templatePath . '/css/global/' . $paramsColorName . '.css');
$this->getPreloadManager()->prefetch($wa->getAsset('style', $assetColorName)->getUri(), ['as' => 'style']);

// Use a font scheme if set in the template style options
$paramsFontScheme = $this->params->get('useFontScheme', false);

if ($paramsFontScheme)
{
	// Prefetch the stylesheet for the font scheme, actually we need to prefetch the font(s)
	$assetFontScheme  = 'fontscheme.' . $paramsFontScheme;
	$wa->registerAndUseStyle($assetFontScheme, $templatePath . '/css/global/' . $paramsFontScheme . '.css');
	$this->getPreloadManager()->prefetch($wa->getAsset('style', $assetFontScheme)->getUri(), ['as' => 'style']);
}

// Enable assets
$wa->usePreset('template.cassiopeia.' . ($this->direction === 'rtl' ? 'rtl' : 'ltr'))
	->useStyle('template.active.language')
	->useStyle('template.user')
	->useScript('template.user');

// Override 'template.active' asset to set correct ltr/rtl dependency
$wa->registerStyle('template.active', '', [], [], ['template.cassiopeia.' . ($this->direction === 'rtl' ? 'rtl' : 'ltr')]);

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . Uri::root(true) . '/' . htmlspecialchars($this->params->get('logoFile'), ENT_QUOTES) . '" alt="' . $sitename . '">';
}
elseif ($this->params->get('siteTitle'))
{
	$logo = '<span title="' . $sitename . '">' . htmlspecialchars($this->params->get('siteTitle'), ENT_COMPAT, 'UTF-8') . '</span>';
}
else
{
	$logo = HTMLHelper::_('image', 'logo.svg', $sitename, ['class' => 'logo d-inline-block'], true, 0);
}

$hasClass = '';

if ($this->countModules('sidebar-left', true))
{
	$hasClass .= ' has-sidebar-left';
}

if ($this->countModules('sidebar-right', true))
{
	$hasClass .= ' has-sidebar-right';
}

// Container
$wrapper = $this->params->get('fluidContainer') ? 'wrapper-fluid' : 'wrapper-static';

$this->setMetaData('viewport', 'width=device-width, initial-scale=1');

$stickyHeader = $this->params->get('stickyHeader') ? 'position-sticky sticky-top' : '';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="metas" />
	<jdoc:include type="styles" />
	<jdoc:include type="scripts" />
 
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/et-lineicons.css">
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/flexslider.css">
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/style.css"> 
 
 <style>
.sec-testimonial {background: #ededed;padding: 80px 16px;}
.sec-testimonial .title-wrap {margin-bottom: 56px}
a.polaroid {display: block; color:#4f246b; font-size:16px; font-family:"Times New Roman", Times, serif; font-style:italic; line-height:16px; padding: 10px 10px 0px 10px; width: 260px; background-color: white; z-index: 2; box-shadow: 2px 2px 4px rgba(0,0, 0, 0.3);}

a.polaroid:hover, a.polaroid:focus, a.polaroid:active {z-index: 999;border-color: #6A6A6A;box-shadow: 1px 4px 20px -2px rgba(0,0,0,.4);-webkit-transform: rotate(0deg) scale(1.2);-moz-transform: rotate(0deg) scale(1.2);transform: rotate(0deg) scale(1.2);}

	.polaroid img {margin: 0 0 5px;}
	.photo-album a img {border: none;display: block;}
	.photo-album {position: relative; min-height: 650px;}
	.photo-album .polaroid {position: absolute;}
	.photo-album .small {width: 75px; padding: 6px 6px 12px 6px; font-size: 0.6em;}
	.photo-album .small img {width: 75px; height: 75px;}
	.photo-album .medium {width: 200px; padding: 13px 13px 26px 13px; font-size: 0.8em; }
	.photo-album .medium img {width: 200px; height: 200px;}
	.photo-album .large {width: 300px; padding: 20px 20px 30px 20px; font-size: 1em;}
	.photo-album .large img {width: 300px; height: 300px;}
	.photo-album .img1 {top: 120px; left: 0; -webkit-transform: rotate(-5deg); -moz-transform: rotate(-5deg); transform: rotate(-5deg); }
	.photo-album .img2 {top: 197px; left: 82px; -webkit-transform: rotate(-14deg); -moz-transform: rotate(-14deg); transform: rotate(-14deg); }
	.photo-album .img3 {left: 85px; top: 22px; -webkit-transform: rotate(5deg); -moz-transform: rotate(5deg); transform: rotate(5deg);}
	.photo-album .img4 {top: 45px; left: 240px; -webkit-transform: rotate(-7deg); -moz-transform: rotate(-7deg); transform: rotate(-7deg);}
	.photo-album .img5 {bottom: 0; left: 260px; -webkit-transform: rotate(-7deg); -moz-transform: rotate(-7deg); transform: rotate(-7deg);}
	.photo-album .img6 {top: 140px; left: 290px; -webkit-transform: rotate(10deg); -moz-transform: rotate(10deg); transform: rotate(10deg);}
	.photo-album .img7 {top: 0px; left: 350px; -webkit-transform: rotate(10deg); -moz-transform: rotate(10deg); transform: rotate(10deg);}
	.photo-album .img8 {top:0px; left: 460px; -webkit-transform: rotate(-8deg); -moz-transform: rotate(-8deg); transform: rotate(-8deg);}
	.photo-album .img9 {top:210px; left: 460px; -webkit-transform: rotate(-8deg); -moz-transform: rotate(-8deg); transform: rotate(-8deg);}
	.photo-album .img10 {top:0; left: 560px; -webkit-transform: rotate(-15deg); -moz-transform: rotate(-15deg); transform: rotate(-15deg);}
	.photo-album .img11 {bottom: 0; right: 390px; -webkit-transform: rotate(8deg); -moz-transform: rotate(8deg); transform: rotate(8deg); }
	.photo-album .img12 {top: 0; right: 350px; -webkit-transform: rotate(13deg); -moz-transform: rotate(13deg); transform: rotate(13deg);}
	.photo-album .img13 {bottom:0px; right: 320px; -webkit-transform: rotate(-10deg); -moz-transform: rotate(-10deg); transform: rotate(-10deg);}
	.photo-album .img14 {top: 20px; right: 220px; -webkit-transform: rotate(-5deg); -moz-transform: rotate(-5deg); transform: rotate(-5deg); }
	.photo-album .img15 {bottom:15px; right: 220px; -webkit-transform: rotate(5deg); -moz-transform: rotate(5deg); transform: rotate(5deg);}
	.photo-album .img16 {bottom:70px; right: 0px; -webkit-transform: rotate(15deg); -moz-transform: rotate(15deg); transform: rotate(15deg);}
	.photo-album .img17 {top:0px; right: 70px; -webkit-transform: rotate(-15deg); -moz-transform: rotate(-15deg); transform: rotate(-15deg);}

.photo-album:hover .popup_photo{display:block !important;}
 </style>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">  
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" ng-app="App" ng-controller="trangchu">
    <div id="doro-page">
     <a href="/" class="js-doro-nav-toggle doro-nav-toggle"><i></i></a>
        <!-- Sidebar Section -->
        <aside id="doro-aside">
            <!-- Logo -->
            <div id="doro-logo"> 
             
             <a href="/">
              <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" class="w-50" alt="">
             </a> </div>
            <!-- Menu -->
            <nav id="doro-main-menu">
             
            <jdoc:include type="modules" name="tazagroup-menu" style="xhtml" />    

                <ul>
                 
    <li>
 <a data-toggle="collapse" data-target="#demo">V??? Ch??ng T??i <i class="fas fa-plus"></i></a> 
<ul id="demo" class="collapse">
<li>
 <img src="<?php echo $templatePath; ?>/images/taza-skin-clinic-logo.png" style="width: 30px" />
 <a class="card-link" href="/#vechungtoi">
      Taza Skin Clinic
      </a>
 </li>
<li>
  <img src="<?php echo $templatePath; ?>/images/timona-logo.png" style="width: 30px" />
 <a class="card-link" href="/#vechungtoi">
        Timona Academy
  </a></li>
</ul>
</li>
         <li><a href="#connguoitaza">Con Ng?????i Taza Group</a></li>
                    <li><a href="/#doinoi">?????i N???i</a></li>
                    <li><a href="/#doingoai">?????i Ngo???i</a></li>
                    <li><a href="/#tuyendung">Tuy???n D???ng</a></li> 
                    <li><a href="/#lienhe">Li??n H???</a></li>        
                </ul>
            </nav>
            <!-- Sidebar Footer -->
            <div class="doro-footer">
                <ul>
                    <li><a href="#"><i class="ti-facebook font-14px black-icon"></i></a></li>
                    <li><a href="#"><i class="ti-twitter-alt font-14px black-icon"></i></a></li>
                    <li><a href="#"><i class="ti-instagram font-14px black-icon"></i></a></li>
                    <li><a href="#"><i class="ti-linkedin font-14px black-icon"></i></a></li>
                </ul>
                <p><small>?? 2020 by Tazagroup</a></small></p>
            </div>
        </aside>
        <!-- Main Section -->
        <div id="doro-main">
         	<?php if ($this->countModules('tazagroup-video', true)) : ?>
		<jdoc:include type="modules" name="tazagroup-video" style="xhtml" />

            <div id="home" class="section">
                <div class="doro-hero js-fullheight" style="height: 666px;">
                    <!-- Slider -->
                    <div class="flexslider js-fullheight" style="height: 666px;">
                        <ul class="slides">
                        <li class="flex-active-slide" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                               <div class="overlay-video">
          
                              <video autoplay="" loop="" muted="" width="80%">                                    
                             <source src="<?php echo $templatePath; ?>/images/video.mp4" type="video/mp4">
                                    </video>						

                                </div> 
                                <div class="overlay-color"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 js-fullheight slider-text animated fadeInUp" style="height: 666px;">
                                        <div class="slider-text-inner">
                                            <div class="desc">
                                                <h1>Year End Party 2020</h1></div>
                                            <div class="arrow bounce">
                                                    <a href="#projects" data-scroll-nav="1" class=""> <i class="ti-angle-double-down"></i> </a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url(&quot;images/slider/02.jpg&quot;); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;" data-thumb-alt="">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 js-fullheight slider-text" style="height: 666px;">
                                        <div class="slider-text-inner">
                                            <div class="desc">
                                                <h1>BRANDING DESING</h1>
                                            </div>
                                            <div class="arrow bounce">
                                                    <a href="#projects" data-scroll-nav="1" class=""> <i class="ti-angle-double-down"></i> </a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url(&quot;images/slider/03.jpg&quot;); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;" data-thumb-alt="" class="">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 js-fullheight slider-text" style="height: 666px;">
                                        <div class="slider-text-inner">
                                            <div class="desc">
                                                <h1>TEAM WORK</h1>
                                            </div>
                                            <div class="arrow bounce">
                                                    <a href="#projects" data-scroll-nav="1" class=""> <i class="ti-angle-double-down"></i> </a>
                                                </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        </ul>
                    <ol class="flex-control-nav flex-control-paging"><li><a href="#" class="flex-active">1</a></li><li><a href="#">2</a></li><li><a href="#" class="">3</a></li></ol><ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
                </div>
            </div>
   	<?php endif; ?>      
<?php if (!$this->countModules('tazagroup-video', true)) : ?>
        
<div class="container-fluid">   
    <jdoc:include type="message" />
		<main>
		<jdoc:include type="component" />
		</main> 
            </div>   
       	<?php endif; ?>     
           	<?php if ($this->countModules('tazagroup-vechungtoi', true)) : ?>
            <div id="vechungtoi" class="section">
                <div class="doro-about">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="doro-heading animate-box fadeInLeft animated mb-0" data-animate-effect="fadeInLeft">V??? Ch??ng T??i</h2> 
                         
                         <div class="p-3">Kh??m ph?? nh???ng ??i???u th?? v??? v??? Taza Group</div>
                         </div>
                        </div>
                        <div class="row">
                          <jdoc:include type="modules" name="tazagroup-vechungtoi" style="xhtml" />                               
                        </div>
                    </div>
                </div>
            </div>        
  	<?php endif; ?>        
    
         	<?php if ($this->countModules('tazagroup-connguoitaza', true)) : ?>      
            <div id="connguoitaza" class="section" tabindex="-1">
                <div class="doro-projects">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">Con Ng?????i Taza Group</h2> </div>
                        </div>
                     
           <div class="row">
           <div class="photo-album container my-5">
                    <a href="javascript:;" ng-repeat="ct in Connguoitaza" class="polaroid img{{ct.id}} showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>{{ct.content}}</p><p></p>
                    </a>
            
            
<!--
                    <a href="javascript:;" rel="12697" class="polaroid img1 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"C??? m???i khi da c?? d???u hi???u l??o ho?? hay s???m ??en l?? Nga t???i Lavender By Chang ????? t??t t??t l???i ngay."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12696" class="polaroid img2 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"Lavender By Chang lu??n l?? ?????a ch??? spa ???ru???t??? c???a Trinh. T??? tr??? ho?? da, tr??? n??m, gi???m b??o, tr???ng da??? Trinh ?????u l??m h???t r???i. "</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12695" class="polaroid img3 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"B?? quy???t ????? l??c n??o c??ng t????i tr??? c???a My l?? ch??m ch??? ?????n l??m Thermage v?? Ultherapy t???i Lavender By Chang."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12694" class="polaroid img4 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"N??m n??o ch??? c??ng l??m tr??? ho?? ??? Lavender By Chang, v???a xo?? n???p nh??n v???a n??ng c?? g???n m???t, ch??? r???t h??i l??ng.."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12693" class="polaroid img5 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"L??m tr??? ho?? da ??? Lavender By Chanh r???t tho???i m??i, kh??ng b??? ??au hay kh?? ch???u, d???ch v??? ch??m s??c c??ng r???t chu ????o."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12692" class="polaroid img6 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"Gi???m b??o Cooltech Defines t???i Lavender By Chang gi??p m??nh gi???m m??? theo t???ng v??ng m??nh mong mu???n nh?? b???ng, b???p tay..."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12691" class="polaroid img7 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"Nh??? t???m tr???ng ??? Lavender By Chang m?? m??nh ???? xo?? s??? ??c l??n da ch??y n???ng ??en s???m v?? ??i bi???n."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12690" class="polaroid img8 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"M???i l???n b???ng c?? d???u hi???u t??ch m??? l?? m??nh l???i ?????n gi???m b??o t???i Lavender By Chang, ch??? c???n 1 li???u tr??nh l?? b???ng g???n eo nh??? ngay."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12689" class="polaroid img9 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"M??nh b??? n??m 5 n??m nay cu???i c??ng c??ng ??c ch???a kh???i nh??? Mela Expert. Da c??ng s??ng v?? kho??? h??n."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12688" class="polaroid img10 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"M??nh th??ch nh???t combo tr???ng da t???i Lavender By Chang, gi??p da tr???ng m???n v?? c??ng m?????t h??n."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12687" class="polaroid img11 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"Da ch??? b??? ch???y x???, n???ng m??? nhi???u. L??m tr??? ho?? t???i LVDbC ??c v??i bu???i m?? da ?????p h???n, m???t c??ng thon g???n h??n."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12686" class="polaroid img12 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"Infra Aquasonic gi??p xo?? b??? l??n da ch??y n???ng loang l??? c???a m??nh, l??c t???m tr???ng c???m gi??c th?? gi??n r???t tho???i m??i."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12685" class="polaroid img13 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"Ch??? c??? ngh?? n??m sau sinh th?? kh??ng h???t ???????c, nh??ng m???i l??m 5 bu???i Mela Care m?? n??m ???? gi???m ???????c 80% r???i."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12684" class="polaroid img14 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"M???i l??m Sculpsure ??c v??i l???n m?? v??ng eo c???a m??nh ???? thu g???n ???????c 3cm, c???m gi??c nh??? nh??m h???n."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12683" class="polaroid img15 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"M??nh ???nghi???n??? t???m tr???ng Max Steam, c???m gi??c d??? ch???u, x??? xtress m?? da c??n tr???ng m???n, ???m m?????t."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12682" class="polaroid img16 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"Ch??? kh??ng ng??? l?? ??? ????? tu???i 50 r???i v???n c?? th??? gi??? ???????c da c??ng kho??? nh?? n??y, t???t c???  l?? nh??? Thermage FLX t???i Lavender By Chang."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12681" class="polaroid img17 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"G???t h??m t???i LVDBC ???? thay ?????i ho??n to??n cu???c ?????i Ph????ng Anh, gi??p m??nh t??? tin h??n r???t nhi???u."</p><p></p>
                    </a>
                    <a href="javascript:;" rel="12680" class="polaroid img18 showctdetail">
                        <img src="<?php echo $templatePath; ?>/images/tazagroup-logo.png" alt="">
                        <p></p><p>"PTTM t???i Lavender By Chang ???? l???t x??c ho??n to??n di???n m???o c???a em, b??c s?? m??t tay v?? th???i gian ph???c h???i c??ng r???t nhanh."</p><p></p>
                    </a>
-->
            </div> 
            
            
                     </div>

                    </div>
                </div>
            </div>
  	<?php endif; ?>        
    
         	<?php if ($this->countModules('tazagroup-doingoai', true)) : ?>   
         
            <div id="doingoai" class="section">
                <div class="doro-blog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Ho???t ?????ng ?????i Ngo???i</h2> </div>
                        </div>
                     
                   <jdoc:include type="modules" name="tazagroup-doingoai" style="xhtml" />  
<!--
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="#" class="blog-img"><img src="<?php echo $templatePath; ?>/images/doingoai1.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 27, 2020 |Nh???t Sang</span>
                                        <h3><a href="#">R???n r??ng ng??y h???i H?????ng nghi???p ??? Tuy???n sinh n??m 2020</a></h3>
                                        <p>???n t?????ng ????? l???i c?? l??? l?? nh???ng g????ng m???t r???ng r??? v?? ?????y h??o h???ng c???a c??c em khi ???????c ti???p x??c, l???ng nghe nh???ng chia s??? v??? ngh??? m?? Timona Academy mang l???i.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="#" class="blog-img"><img src="<?php echo $templatePath; ?>/images/doingoai2.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 26, 2020 | Nh???t Sang</span>
                                        <h3><a href="#">H???i th???o: C??ng b??? ph??c ????? ??i???u tr??? - Tr??? h??a da to??n di???n 2020 </a></h3>
                                        <p>200 voucher l??m ?????p v???i ??u ????i d???ch v??? l??n ?????n 90% c??ng h??? th???ng qu?? t???ng h???p d???n ch??a t???ng c?? s??? ???????c g???i ?????n ph??i ?????p Th??? ?????c khi tham gia h???i th???o ???C??ng b??? ph??c ????? ??i???u tr??? - Tr??? h??a da to??n di???n 2020???</p>
                                    </div>
                                </div>
                            </div>
                        </div>
-->
                    </div>
                </div>
            </div>
           	<?php endif; ?>     
   	<?php if ($this->countModules('tazagroup-doinoi', true)) : ?>   

            <div id="doinoi" class="section">
                <div class="doro-blog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Ho???t ?????ng ?????i N???i</h2> </div>
                        </div>
                     
          <jdoc:include type="modules" name="tazagroup-doinoi" style="xhtml" />            
                     
<!--
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="#" class="blog-img"><img src="<?php echo $templatePath; ?>/images/doinoi1.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 27, 2020 |Nh???t Sang</span>
                                        <h3><a href="#">???TAZA GOT???S TALENT??? ??? GALA DINNER 2020 TAZA GROUP</a></h3>
                                        <p>T???m bi???t n??m 2020 v???i nhi???u bi???n c???, Taza Group ???? t??? ch???c m???t b???a ti???c ???m c??ng nh??ng kh??ng k??m ph???n s??i ?????ng t???i Trung T??m H???i Ngh??? & Ti???c C?????i S??n V?????n Le Jardin. Kh??ch m???i, nh??n vi??n v?? ng?????i th??n ???? c?? m???t ????ng ?????, kh??ng khi ng???p tr??n ni???m vui, ni???m h??n hoan kh?? t???.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="#" class="blog-img"><img src="<?php echo $templatePath; ?>/images/doinoi2.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 26, 2020 | Nh???t Sang</span>
                                        <h3><a href="#">Kh??ng kh?? ???m c??ng trong m??a Gi??ng Sinhng???p tr??n Taza Group</a></h3>
                                        <p>Taza Group lu??n mong mu???n mang ?????n cho kh??ch h??ng v?? to??n b??? nh??n vi??n kh??ng gian l??m vi???c ch???t l?????ng, hi???u qu???, h??? tr??? t???i ??a cho s??? ph??t tri???n c???a ????n v??? n??i chung v?? t???ng nh??n vi??n n??i ri??ng.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
-->
                    </div>
                </div>
            </div>
        	<?php endif; ?>        
       
    

            <!-- Services Section -->
        <!--<div id="doingoai" class="section">
                <div class="doro-services">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">Ho???t ?????ng ?????i Ngo???i</h2> </div>
                        </div>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="doro-feature animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="doro-icon"> <span class="et-pricetags font-35px"></span> </div>
                                <div class="doro-text">
                                    <h3>Branding</h3>
                                    <ul class="list-unstyled">
                                        <li>Logos</li>
                                        <li>Corporate Identity</li>
                                        <li>Business Cards</li>
                                        <li>Packaging</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="doro-feature animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="doro-icon"> <span class="et-presentation font-35px"></span> </div>
                                <div class="doro-text">
                                    <h3>Marketing</h3>
                                    <ul class="list-unstyled">
                                        <li>Strategy</li>
                                        <li>SEO</li>
                                        <li>Sales</li>
                                        <li>Email Campaigns</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="doro-feature animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="doro-icon"> <span class="et-lightbulb font-35px"></span> </div>
                                <div class="doro-text">
                                    <h3>Development</h3>
                                    <ul class="list-unstyled">
                                        <li>Websites</li>
                                        <li>Native Apps</li>
                                        <li>WordPress</li>
                                        <li>eCommerce</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="doro-feature animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="doro-icon"> <span class="et-mobile font-35px"></span> </div>
                                <div class="doro-text">
                                    <h3>Product Design</h3>
                                    <ul class="list-unstyled">
                                        <li>UX App Design</li>
                                        <li>Corporate Identity</li>
                                        <li>Business Cards</li>
                                        <li>Packaging</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"> <img src="<?php echo $templatePath; ?>/images/services.jpg" class="img-fluid mb-30 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" alt=""> </div>
                    </div>
                    </div>
                </div>
            </div>-->
         
           	<?php if ($this->countModules('tazagroup-tuyendung', true)) : ?>   
         
            <div id="tuyendung" class="section">
                <div class="doro-blog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box mb-0" data-animate-effect="fadeInLeft">C?? H???I PH??T TRI???N C??NG TAZA GROUP</h2> </div>
<div class="p-3">                         
   Ch??ng t??i lu??n ch??o ????n nh???ng ???ng vi??n quan t??m ?????n c?? h???i ngh??? nghi???p t???i Taza Group.
V???i m??i tr?????ng l??m vi???c n??ng ?????ng, s??ng t???o, th??n thi???n c??ng ch??? ????? ph??c l???i h???p d???n, ch??ng t??i tin r???ng b???n s??? c?? nhi???u c?? h???i ????? ph??t tri???n.</div>                        


                        </div>
  <jdoc:include type="modules" name="tazagroup-tuyendung" style="xhtml" />                      
                     
 <div class="container">
  <table id="example" class="table table-striped" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th>STT</th>
        <th>Ch???c Danh</th>
        <th>N??i L??m Vi???c</th>
        <th>H???n Cu???i Nh???n H??? S??</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>???ng vi??n 1</td>
        <td>ungvien1@gmail.com</td>
        <td>13/04/2021</td>
      </tr>      
     <tr>
        <td>2</td>
        <td>???ng vi??n 2</td>
        <td>ungvien1@gmail.com</td>
        <td>13/04/2021</td>
      </tr>  
     <tr>
        <td>3</td>
        <td>???ng vi??n 3</td>
        <td>ungvien1@gmail.com</td>
        <td>13/04/2021</td>
      </tr>
         <tr>
        <td>1</td>
        <td>???ng vi??n 1</td>
        <td>ungvien1@gmail.com</td>
        <td>13/04/2021</td>
      </tr>      
     <tr>
        <td>2</td>
        <td>???ng vi??n 2</td>
        <td>ungvien1@gmail.com</td>
        <td>13/04/2021</td>
      </tr>  
     <tr>
        <td>3</td>
        <td>???ng vi??n 3</td>
        <td>ungvien1@gmail.com</td>
        <td>13/04/2021</td>
      </tr>  
    </tbody>
  </table>  
</div>
                     
                     
                    </div>
                </div>
            </div>
         
        	<?php endif; ?>        
    
         	<?php if ($this->countModules('tazagroup-lienhe', true)) : ?>  
         
            <div id="lienhe" class="section">
                <div class="doro-contact">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                             <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Li??n H??? TAZA GROUP</h2> </div>
                        </div>
          <jdoc:include type="modules" name="tazagroup-lienhe" style="xhtml" />           
                     
                        <div class="row">
                            <!-- Contact Info -->
                            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInLeft">
                                <p><i class="et-phone"></i> Tel : 1900 2664</p>
                                <p><i class="et-envelope"></i> Email: nhansu@tazagroup.vn</p>
                                <p><i class="et-map-pin"></i> ?????a ch???: 14-16 B??nh L???i, Ph?????ng 13, B??nh Th???nh, TP. HCM</p>
                            </div>
                            <!-- Contact Form -->
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <p><b>LI??N H???</b></p>
                                <form method="post" class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="T??n" required=""> </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email"> </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Th??ng ??i???p"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn" type="submit">G???I</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<?php endif; ?>        
 <div id="doro-footer1" class="section">
                <div class="doro-narrow-content">
             <jdoc:include type="modules" name="tazagroup-diachi" style="xhtml" />    
                    <div class="row">
       <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h3 class="text-center">Taza Group TP.H??? Ch?? Minh</h3> 
                     <div class="widget-footer mt-4">
                                <ul class="footer-list">
                                    <li><a href="#">103 Nguy???n V??n ?????u, P. 5, Q. B??nh Th???nh</a></li>
                                    <li><a href="#">408 Cao Th???ng, P. 12, Qu???n 10</a></li>
                                    <li><a href="#">1090A Ph???m V??n ?????ng (C???u G?? D??a), P. Linh ????ng, Q. Th??? ?????c</a></li>
                                    <li><a href="#">1012-1014 Quang Trung, P. 8, Q. G?? V???p</a></li>
                                </ul>
                            </div>
                     
                     
                     </div>              
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h3 class="text-center">Taza Group ???? N???ng</h3> 
                     <div class="widget-footer mt-4">
                                <ul class="footer-list">
                                    <li><a href="#">69 H??m Nghi, P. Th???c Gi??n, Q. Thanh Kh??, TP. ???? N???ng</a></li>
                                </ul>
                            </div> 
                     </div>
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h3 class="text-center">Taza Group Nha Trang</h3> 
                     <div class="widget-footer mt-4">
                                <ul class="footer-list">
                                    <li><a href="#">STH41.47 ???????ng s??? 4, P. Ph?????c H???i (K??T L?? H???ng Phong 2), Nha Trang</a></li>
                                </ul>
                            </div>
                     
                     
                     </div>
                    </div>
                </div>
            </div>        
         
         
            <div id="doro-footer2" class="section">
                <div class="doro-narrow-content">
                    <div class="row">
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <p class="doro-lead">?? 2020 Tazagroup All rights reserved</p>
                        </div>
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h2 class="text-center">TAZA GROUP</h2> 

                     </div>
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <ul class="social-network">
                                <li><a href="#"><i class="ti-facebook font-14px black-icon"></i></a></li>
                                <li><a href="#"><i class="ti-twitter-alt font-14px black-icon"></i></a></li>
                                <li><a href="#"><i class="ti-instagram font-14px black-icon"></i></a></li>
                                <li><a href="#"><i class="ti-linkedin font-14px black-icon"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Js -->
    <script src="<?php echo $templatePath; ?>/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo $templatePath; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/sticky-kit.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/main.js"></script>
    <script src="<?php echo $templatePath; ?>/js/app.js"></script>
 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
 <script>
$(document).ready(function() {
    $('#example').DataTable(
      {
        "language": {
            "lengthMenu": "Hi???n Th??? _MENU_ ",
            "zeroRecords": "Nothing found - sorry",
            "info": "Trang _PAGE_/_PAGES_",
            "infoEmpty": "Kh??ng c?? d??? li???u",
            "infoFiltered": "(filtered from _MAX_ total records)",
             "search": "T??m Ki???m:",
             "paginate": {
                 "first": "?????u Ti??n",
                 "last": "Cu???i C??ng",
                 "next": "Ti???p",
                 "previous": "Tr?????c"
             },
        }
    } 
     
    );
} );
 </script>
</body>
 
 
 
<!--
<body class="site-grid site <?php echo $option
	. ' ' . $wrapper
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ' ' . $pageclass
	. $hasClass;
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">
	<header class="header container-header full-width <?php echo $stickyHeader; ?>">
		<div class="grid-child">
			<div class="navbar-brand">
				<a class="brand-logo" href="<?php echo $this->baseurl; ?>/">
					<?php echo $logo; ?>
				</a>
				<?php if ($this->params->get('siteDescription')) : ?>
					<div class="site-description"><?php echo htmlspecialchars($this->params->get('siteDescription')); ?></div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($this->countModules('menu', true) || $this->countModules('search', true)) : ?>
			<div class="grid-child container-nav">
				<?php if ($this->countModules('menu', true)) : ?>
					<nav class="navbar navbar-expand-md">
						<?php HTMLHelper::_('bootstrap.collapse', '.navbar-toggler'); ?>
						<button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php echo Text::_('TPL_CASSIOPEIA_TOGGLE'); ?>">
							<span class="icon-menu" aria-hidden="true"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbar">
							<jdoc:include type="modules" name="menu" style="none" />
						</div>
					</nav>
				<?php endif; ?>
				<?php if ($this->countModules('search', true)) : ?>
					<div class="container-search">
						<jdoc:include type="modules" name="search" style="none" />
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</header>

	<?php if ($this->countModules('banner', true)) : ?>
		<div class="container-banner full-width">
			<jdoc:include type="modules" name="banner" style="none" />
		</div>
	<?php endif; ?>

	<?php if ($this->countModules('top-a', true)) : ?>
	<div class="grid-child container-top-a">
		<jdoc:include type="modules" name="top-a" style="card" />
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('top-b', true)) : ?>
	<div class="grid-child container-top-b">
		<jdoc:include type="modules" name="top-b" style="card" />
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('sidebar-left', true)) : ?>
	<div class="grid-child container-sidebar-left">
		<jdoc:include type="modules" name="sidebar-left" style="card" />
	</div>
	<?php endif; ?>

	<div class="grid-child container-component">
		<jdoc:include type="modules" name="breadcrumbs" style="none" />
		<jdoc:include type="modules" name="main-top" style="card" />
		<jdoc:include type="message" />
		<main>
		<jdoc:include type="component" />
		</main>
		<jdoc:include type="modules" name="main-bottom" style="card" />
	</div>

	<?php if ($this->countModules('sidebar-right', true)) : ?>
	<div class="grid-child container-sidebar-right">
		<jdoc:include type="modules" name="sidebar-right" style="card" />
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('bottom-a', true)) : ?>
	<div class="grid-child container-bottom-a">
		<jdoc:include type="modules" name="bottom-a" style="card" />
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('bottom-b', true)) : ?>
	<div class="grid-child container-bottom-b">
		<jdoc:include type="modules" name="bottom-b" style="card" />
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('footer', true)) : ?>
	<footer class="container-footer footer full-width">
		<div class="grid-child">
			<jdoc:include type="modules" name="footer" style="none" />
		</div>
	</footer>
	<?php endif; ?>

	<?php if ($this->params->get('backTop') == 1) : ?>
		<div class="back-to-top-wrapper">
			<a href="#top" id="back-top" class="back-to-top-link" aria-label="<?php echo Text::_('TPL_CASSIOPEIA_BACKTOTOP'); ?>">
				<span class="icon-arrow-up icon-fw" aria-hidden="true"></span>
			</a>
		</div>
	<?php endif; ?>

	<jdoc:include type="modules" name="debug" style="none" />

</body>
-->
</html>
