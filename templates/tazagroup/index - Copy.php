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
 <a class="card-link" data-toggle="collapse" href="#projects">
      Taza Skin Clinic
      </a>
 </li>
<li>
  <img src="<?php echo $templatePath; ?>/images/timona-logo.png" style="width: 30px" />
 <a class="card-link" data-toggle="collapse" href="#about">
        Timona Academy
  </a></li>
</ul>
</li>

                    <li><a href="#services">Con Người Taza Group</a></li>
                    <li><a href="#news">Đối Nội</a></li>
                    <li><a href="#contact">Đối Ngoại</a></li>
                    <li><a href="#contact">Tuyển Dụng</a></li> 
                    <li><a href="#contact">Liên Hệ</a></li>        
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
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">Về Chúng Tôi</h2> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"> <img src="<?php echo $templatePath; ?>/images/about.jpg" class="img-fluid mb-30 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" alt=""> 
                                 <span class="heading-meta"></span>
                               <h3 class="doro-about-heading">Taza Skin Clinic</h3>
                                <p>PHÒNG KHÁM CHUYÊN KHOA DA LIỄU, THẨM MỸ CÔNG NGHỆ CAO</p>
                         
                         </div>
                            <div class="col-md-6 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft"> 
                             <img src="<?php echo $templatePath; ?>/images/about.jpg" class="img-fluid mb-30 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" alt="">
                             <span class="heading-meta"></span>
                               <h3 class="doro-about-heading">Timona Academy</h3>
                                <p>Học viện đào tạo thẩm mỹ quốc tế</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
         
         
         
            <!-- Projects Section -->
            <div id="projects" class="section" tabindex="-1">
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

            <!-- Our Team Section -->
            <div id="references" class="section">
                <div class="doro-references">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">Hoạt Động Đối Nội</h2> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="team"> <img src="<?php echo $templatePath; ?>/images/01(1).jpg" class="img-fluid" alt="">
                                    <div class="desc">
                                        <div class="con">
                                            <h3><a href="">Robert Lee</a></h3> <span>Founder &amp; CEO</span> 
                                            <p class="icon"> 
                                                <span><a href="#"><i class="ti-twitter"></i></a></span> 
                                                <span><a href="#"><i class="ti-instagram"></i></a></span> 
                                                <span><a href="#"><i class="ti-dribbble"></i></a></span> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="team"> <img src="<?php echo $templatePath; ?>/images/02(1).jpg" class="img-fluid" alt="">
                                    <div class="desc">
                                        <div class="con">
                                            <h3><a href="">Emily Sorey</a></h3> <span>RESOLVE |&nbsp;General Manager</span>
                                            <p class="icon"> 
                                                <span><a href="#"><i class="ti-twitter"></i></a></span> 
                                                <span><a href="#"><i class="ti-instagram"></i></a></span> 
                                                <span><a href="#"><i class="ti-dribbble"></i></a></span> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="team"> <img src="<?php echo $templatePath; ?>/images/03(1).jpg" class="img-fluid" alt="">
                                    <div class="desc">
                                        <div class="con">
                                            <h3><a href="">Robert Luca</a></h3> <span>AKB | Software Team Lead</span>
                                            <p class="icon"> 
                                                <span><a href="#"><i class="ti-twitter"></i></a></span> 
                                                <span><a href="#"><i class="ti-instagram"></i></a></span> 
                                                <span><a href="#"><i class="ti-dribbble"></i></a></span> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services Section -->
            <div id="services" class="section">
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
            </div>
            <!-- News Section -->
            <div id="news" class="section">
                <div class="doro-blog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta"></span>
                                <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Tuyển Dụng</h2> </div>
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
            <div id="contact" class="section">
                <div class="doro-contact">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"> <span class="heading-meta">Location</span>
                                <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Liên Hệ</h2> </div>
                        </div>
                        <div class="row">
                            <!-- Contact Info -->
                            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInLeft">
                                <p><b>CONTACT INFO</b>
                                    <br>Qualamy nisl sodales sit amet sapien id, placerat sodales orciter.<br>Vivamus nec magna rhoncus felis, faucibus printy.</p>
                                <p><i class="et-phone"></i> +1 650-444-0000</p>
                                <p><i class="et-envelope"></i> info@doroinc.com</p>
                                <p><i class="et-map-pin"></i> 2 Curiosity Way, San Mateo, CA 94403, US.</p>
                            </div>
                            <!-- Contact Form -->
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <p><b>GET IN TOUCH</b></p>
                                <form method="post" class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" required=""> </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email"> </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
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
            <div id="doro-footer2" class="section">
                <div class="doro-narrow-content">
                    <div class="row">
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <p class="doro-lead">© 2020 Tazagroup All rights reserved</p>
                        </div>
                        <div class="col-md-4 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                            <h2 class="text-center">TAZAGROUP</h2> </div>
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
