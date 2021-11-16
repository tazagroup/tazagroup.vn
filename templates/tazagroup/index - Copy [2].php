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
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
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
                <ul>
                 
    <li>
 <a data-toggle="collapse" data-target="#demo">Về Chúng Tôi <i class="fas fa-plus"></i></a> 
<ul id="demo" class="collapse">
<li>
 <img src="<?php echo $templatePath; ?>/images/taza-skin-clinic-logo.png" style="width: 30px" />
 <a class="card-link" href="#tazaskin">
      Taza Skin Clinic
      </a>
 </li>
<li>
  <img src="<?php echo $templatePath; ?>/images/timona-logo.png" style="width: 30px" />
 <a class="card-link" href="#timona">
        Timona Academy
  </a></li>
</ul>
</li>

                    <li><a href="#connguoitaza">Con Người Taza Group</a></li>
                    <li><a href="#doinoi">Đối Nội</a></li>
                    <li><a href="#doingoai">Đối Ngoại</a></li>
                    <li><a href="#tuyendung">Tuyển Dụng</a></li> 
                    <li><a href="#lienhe">Liên Hệ</a></li>        
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
                <p><small>© 2020 by Tazagroup</a></small></p>
            </div>
        </aside>
        <!-- Main Section -->
        <div id="doro-main">
            <!-- Home Section -->
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
         
             <!-- About Us Section -->
            <div id="about" class="section">
                <div class="doro-about">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="doro-heading animate-box fadeInLeft animated mb-0" data-animate-effect="fadeInLeft">Về Chúng Tôi</h2> 
                         
                         <div class="p-3">Khám phá những điều thú vị về Taza Group</div>
                         </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="tazaskin"> <img src="<?php echo $templatePath; ?>/images/about.jpg" class="img-fluid mb-30 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" alt=""> 
                                 <span class="heading-meta"></span>
                               <h3 class="doro-about-heading">Taza Skin Clinic</h3>
                                <p>Ra đời năm 2014, Taza Skin Clinic nhanh chóng khẳng định vị thế vững chắc trong ngành thẩm mỹ với hơn 25.000 lượt khách hàng mỗi năm và nhận được sự tin tưởng của phần đông phái đẹp</p>
                         
                         </div>
                            <div class="col-md-6 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" id="timona"> 
                             <img src="<?php echo $templatePath; ?>/images/about.jpg" class="img-fluid mb-30 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" alt="">
                             <span class="heading-meta"></span>
                               <h3 class="doro-about-heading">Timona Academy</h3>
                                <p>Suốt hơn 7 năm hoạt động, Timona Academy tự hào là địa chỉ đào tạo chuyên nghiệp nguồn nhân lực chất lượng cao cho ngành thẩm mỹ, làm đẹp với cam kết 100% việc làm cho học viên sau tốt nghiệp.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
         
         
         
            <!-- Projects Section -->
            <div id="connguoitaza" class="section" tabindex="-1">
                <div class="doro-projects">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">Con Người Taza Group</h2> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/projects-single.html" class="desc">
                                    <div class="project"> <img src="<?php echo $templatePath; ?>/images/01.jpg" class="img-fluid" alt="">
                                        <div class="desc">
                                            <div class="con">
                                                <h3>Project 01</h3> <span>Branding Desing</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/projects-single.html" class="desc">
                                    <div class="project"> <img src="<?php echo $templatePath; ?>/images/02.jpg" class="img-fluid" alt="">
                                        <div class="desc">
                                            <div class="con">
                                                <h3>Project 02</h3> <span>Graphic Design</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/projects-single.html" class="desc">
                                    <div class="project"> <img src="<?php echo $templatePath; ?>/images/03.jpg" class="img-fluid" alt="">
                                        <div class="desc">
                                            <div class="con">
                                                <h3>Project 03</h3> <span>Graphic Design</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/projects-single.html" class="desc">
                                    <div class="project"> <img src="<?php echo $templatePath; ?>/images/04.jpg" class="img-fluid" alt="">
                                        <div class="desc">
                                            <div class="con">
                                                <h3>Project 04</h3> <span>Branding Design</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/projects-single.html" class="desc">
                                    <div class="project"> <img src="<?php echo $templatePath; ?>/images/05.jpg" class="img-fluid" alt="">
                                        <div class="desc">
                                            <div class="con">
                                                <h3>Project 05</h3> <span>Adobe InDesign</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/projects-single.html" class="desc">
                                    <div class="project"> <img src="<?php echo $templatePath; ?>/images/08.jpg" class="img-fluid" alt="">
                                        <div class="desc">
                                            <div class="con">
                                                <h3>Project 06</h3> <span>Adobe Illustration</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="doinoi" class="section">
                <div class="doro-blog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Hoạt Động Đối Nội</h2> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html" class="blog-img"><img src="<?php echo $templatePath; ?>/images/blog-05.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 27, 2020 |Nhật Sang</span>
                                        <h3><a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html">“TAZA GOT’S TALENT” – GALA DINNER 2020 TAZA GROUP</a></h3>
                                        <p>Tạm biệt năm 2020 với nhiều biến cố, Taza Group đã tổ chức một bữa tiệc ấm cúng nhưng không kém phần sôi động tại Trung Tâm Hội Nghị & Tiệc Cưới Sân Vườn Le Jardin. Khách mời, nhân viên và người thân đã có mặt đông đủ, không khi ngập tràn niềm vui, niềm hân hoan khó tả.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html" class="blog-img"><img src="<?php echo $templatePath; ?>/images/blog-06.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 26, 2020 | Nhật Sang</span>
                                        <h3><a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html">Không khí ấm cúng trong mùa Giáng Sinhngập tràn Taza Group</a></h3>
                                        <p>Taza Group luôn mong muốn mang đến cho khách hàng và toàn bộ nhân viên không gian làm việc chất lượng, hiệu quả, hỗ trợ tối đa cho sự phát triển của đơn vị nói chung và từng nhân viên nói riêng.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            <div id="doingoai" class="section">
                <div class="doro-blog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Hoạt Động Đối Ngoại</h2> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html" class="blog-img"><img src="<?php echo $templatePath; ?>/images/blog-05.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 27, 2020 |Nhật Sang</span>
                                        <h3><a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html">Rộn ràng ngày hội Hướng nghiệp – Tuyển sinh năm 2020</a></h3>
                                        <p>Ấn tượng để lại có lẽ là những gương mặt rạng rỡ và đầy hào hứng của các em khi được tiếp xúc, lắng nghe những chia sẻ về nghề mà Timona Academy mang lại.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html" class="blog-img"><img src="<?php echo $templatePath; ?>/images/blog-06.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 26, 2020 | Nhật Sang</span>
                                        <h3><a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html">Hội thảo: Công bố phác đồ điều trị - Trẻ hóa da toàn diện 2020 </a></h3>
                                        <p>200 voucher làm đẹp với ưu đãi dịch vụ lên đến 90% cùng hệ thống quà tặng hấp dẫn chưa từng có sẽ được gửi đến phái đẹp Thủ Đức khi tham gia hội thảo “Công bố phác đồ điều trị - Trẻ hóa da toàn diện 2020”</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services Section -->
        <!--<div id="doingoai" class="section">
                <div class="doro-services">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">Hoạt Động Đối Ngoại</h2> </div>
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
            <!-- News Section -->
            <div id="tuyendung" class="section">
                <div class="doro-blog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box mb-0" data-animate-effect="fadeInLeft">CƠ HỘI PHÁT TRIỂN CÙNG TAZA GROUP</h2> </div>
<div class="p-3">                         
   Chúng tôi luôn chào đón những ứng viên quan tâm đến cơ hội nghề nghiệp tại Taza Group.
Với môi trường làm việc năng động, sáng tạo, thân thiện cùng chế độ phúc lợi hấp dẫn, chúng tôi tin rằng bạn sẽ có nhiều cơ hội để phát triển.</div>                        


                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html" class="blog-img"><img src="<?php echo $templatePath; ?>/images/blog-05.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 27, 2020 | Brand Identity</span>
                                        <h3><a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html">7 Digital Marketing Strategies</a></h3>
                                        <p>Fusce suscipit, ante a hendrerit ullamcorper, risus nisl cursus purus, sit amet viverra ante nulla vel justo. Morbi justo erat, posuere vel libero non, bibendum convallis enim.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html" class="blog-img"><img src="<?php echo $templatePath; ?>/images/blog-06.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 26, 2020 | Media Planing</span>
                                        <h3><a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html">Our customer experiences</a></h3>
                                        <p>Fusce suscipit, ante a hendrerit ullamcorper, risus nisl cursus purus, sit amet viverra ante nulla vel justo. Morbi justo erat, posuere vel libero non, bibendum convallis enim.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                    <a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html" class="blog-img"><img src="<?php echo $templatePath; ?>/images/blog-02.jpg" class="img-fluid" alt=""></a>
                                    <div class="desc"> <span>Sep 25, 2020 | Digital Art</span>
                                        <h3><a href="http://duruthemes.com/demo/html/doro/onepage-lightvideo/post.html">What is customer experience</a></h3>
                                        <p>Fusce suscipit, ante a hendrerit ullamcorper, risus nisl cursus purus, sit amet viverra ante nulla vel justo. Morbi justo erat, posuere vel libero non, bibendum convallis enim.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Section -->
            <div id="lienhe" class="section">
                <div class="doro-contact">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                             <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Liên Hệ TAZA GROUP</h2> </div>
                        </div>
                        <div class="row">
                            <!-- Contact Info -->
                            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInLeft">
                                <p><i class="et-phone"></i> Tel : 1900 2664</p>
                                <p><i class="et-envelope"></i> Email: nhansu@tazagroup.vn</p>
                                <p><i class="et-map-pin"></i> Địa chỉ: 14-16 Bình Lời, Phường 13, Bình Thạnh, TP. HCM2</p>
                            </div>
                            <!-- Contact Form -->
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <p><b>GET IN TOUCH</b></p>
                                <form method="post" class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tên" required=""> </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email"> </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Thông Điệp"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn" type="submit">Say Hello!</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
 <div id="doro-footer1" class="section">
                <div class="doro-narrow-content">
                    <div class="row">
       <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h3 class="text-center">Taza Group TP.Hồ Chí Minh</h3> 
                     <div class="widget-footer mt-4">
                                <ul class="footer-list">
                                    <li><a href="#">103 Nguyễn Văn Đậu, P. 5, Q. Bình Thạnh</a></li>
                                    <li><a href="#">408 Cao Thắng, P. 12, Quận 10</a></li>
                                    <li><a href="#">1090A Phạm Văn Đồng (Cầu Gò Dưa), P. Linh Đông, Q. Thủ Đức</a></li>
                                    <li><a href="#">1012-1014 Quang Trung, P. 8, Q. Gò Vấp</a></li>
                                </ul>
                            </div>
                     
                     
                     </div>              
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h3 class="text-center">Taza Group Đã Nẵng</h3> 
                     <div class="widget-footer mt-4">
                                <ul class="footer-list">
                                    <li><a href="#">69 Hàm Nghi, P. Thạc Gián, Q. Thanh Khê, TP. Đà Nẵng</a></li>
                                </ul>
                            </div> 
                     </div>
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h3 class="text-center">Taza Group Nha Trang</h3> 
                     <div class="widget-footer mt-4">
                                <ul class="footer-list">
                                    <li><a href="#">STH41.47 đường số 4, P. Phước Hải (KĐT Lê Hồng Phong 2), Nha Trang</a></li>
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
                            <p class="doro-lead">© 2020 Tazagroup All rights reserved</p>
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
    <script src="<?php echo $templatePath; ?>/js/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo $templatePath; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/sticky-kit.min.js"></script>
    <script src="<?php echo $templatePath; ?>/js/main.js"></script>

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
