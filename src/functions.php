<?php
/**
 * @package     Civic
 * @subpackage  Functions
 *
 * @copyright   Copyright (C) 2005 - 2016 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Restrict Access to within Joomla
defined('_JEXEC') or die('Restricted access');

require_once('preg_find.php');

// Featured and Header containers always visible on mobile
$FeauredAlwaysVisible = $this->params->get('FeauredAlwaysVisible','featured-visible-auto');

// get the bootstrap row mode ( row / row-fluid )
$gridMode = $this->params->get('bs_rowmode','row-fluid');
$containerClass = 'container';
if ($gridMode == 'row-fluid') {
    $containerClass = 'container-fluid';
}

$responsivePage = $this->params->get('responsive','1');
$responsive = ' responsive';
if ($responsivePage == 0) {
    $responsive = ' no-responsive';
}

$fullBreadcrumb = false;
if ($this->countModules('grid-top') || $this->countModules('grid-top2')){
	$fullBreadcrumb = true;
}

$enableFluidContainerGridBottom = $this->params->get('enableFluidContainerGridBottom','0');
$enableFluidContainerGridBottom2 = $this->params->get('enableFluidContainerGridBottom2','0');
$enableFluidContainerGridBottom3 = $this->params->get('enableFluidContainerGridBottom3','0');
$enableFluidContainerGridBottom4 = $this->params->get('enableFluidContainerGridBottom4','0');
$enableFluidContainerGridBottom5 = $this->params->get('enableFluidContainerGridBottom5','0');
$enableFluidContainerGridBottom6 = $this->params->get('enableFluidContainerGridBottom6','0');

$separateGridBottom = $this->params->get('separateGridBottom','1');
$separateGridBottom2 = $this->params->get('separateGridBottom2','1');
$separateGridBottom3 = $this->params->get('separateGridBottom3','1');
$separateGridBottom4 = $this->params->get('separateGridBottom4','1');
$separateGridBottom5 = $this->params->get('separateGridBottom5','1');
$separateGridBottom6 = $this->params->get('separateGridBottom6','1');

$classSeparatorGridBottom = ($separateGridBottom == '0') ? ' noSeparateGridBottom' : '' ;
$classSeparatorGridBottom2 = ($separateGridBottom2 == '0') ? ' noSeparateGridBottom' : '' ;
$classSeparatorGridBottom3 = ($separateGridBottom3 == '0') ? ' noSeparateGridBottom' : '' ;
$classSeparatorGridBottom4 = ($separateGridBottom4 == '0') ? ' noSeparateGridBottom' : '' ;
$classSeparatorGridBottom5 = ($separateGridBottom5 == '0') ? ' noSeparateGridBottom' : '' ;
$classSeparatorGridBottom6 = ($separateGridBottom6 == '0') ? ' noSeparateGridBottom' : '' ;

$bgColorGridTop = $this->params->get('bgColorGridTop','tone_color');
$bgColorGridTop2 = $this->params->get('bgColorGridTop2','tone_color');
$bgColorGridTop3 = $this->params->get('bgColorGridTop3','tone_color');
$bgColorGridBottom = $this->params->get('bgColorGridBottom','color_one');
$bgColorGridBottom2 = $this->params->get('bgColorGridBottom2','tone_color');
$bgColorGridBottom3 = $this->params->get('bgColorGridBottom3','tone_color');
$bgColorGridBottom4 = $this->params->get('bgColorGridBottom4','white');
$bgColorGridBottom5_6 = $this->params->get('bgColorGridBottom5_6','tone_inverse_color');

$imgGridTopBg       = $this->params->get("imgGridTopBg", "");
$imgGridTop2Bg      = $this->params->get("imgGridTop2Bg", "");
$imgGridTop3Bg      = $this->params->get("imgGridTop3Bg", "");
$imgGridBottomBg    = $this->params->get("imgGridBottomBg", "");
$imgGridBottom2Bg   = $this->params->get("imgGridBottom2Bg", "");
$imgGridBottom3Bg   = $this->params->get("imgGridBottom3Bg", "");
$imgGridBottom4Bg   = $this->params->get("imgGridBottom4Bg", "");
$imgGridBottom5_6Bg = $this->params->get("imgGridBottom5_6Bg", "");

// templateTone parameter (Light = '-Light' - Dark = '-Dark')
    $user = JFactory::getUser();
    if (!is_null(JRequest::getVar('templateTone', NULL)))
    {
        $Tone = JRequest::getVar('templateTone');
        if ($Tone == '-Light' || $Tone == '-Dark') {
            $user->setParam('templateTone', JRequest::getVar('templateTone'));
            $user->save(true);
        }
    }
    $Tone = ($user->getParam('templateTone',''));
    if ($Tone == '') {
        $Tone =  $this->params->get('Tone','' );
    }
    elseif ($Tone == '-Light')
    {
        $Tone = '';
    }

// Videos folder
$useSlider    = ($this->params->get('useSlider', '1') == '1');
$videosFolder = $this->params->get('videosFolder', '');
$imagesFolder = $this->params->get('imagesFolder', '');
$navSlider    = $this->params->get('navSlider', '1');
$filterSlider = $this->params->get('filterSlider', '1');

if (($videosFolder == '' || $videosFolder == '-1' || $imagesFolder == '' || $imagesFolder == '-1')) {
    $useSlider = false;
}
else {
    $videosFolder = JPATH_BASE . '/images/' . $videosFolder;
    $imagesFolder = JPATH_BASE . '/images/' . $imagesFolder;
}

$sliderVideos = Array();
$sliderImages = Array();

if ($useSlider) {

    // Add CSS class to body tag in order to add
    // important CSS to not overlay the menu/content with the slider
    $sliderStatus = 'slider-status-enabled';

    // looks out for mp4 files in the videos folder, and equivalent file names (.jpg or .png) in the images folder
    $rvideos = preg_find('/\.mp4$/D', $videosFolder, PREG_FIND_SORTKEYS);
    if ($rvideos) {
        foreach ($rvideos as $rvideo) {
            $pinfo = pathinfo($rvideo);
            $bname = $pinfo['filename'];
            $image = $imagesFolder . '/' . $bname . '.jpg';
            if (!file_exists($image)) {
                $image = $imagesFolder . '/' . $bname . '.png';
                if (!file_exists($image))
                    $image = '';
            }
            if ($image != '') {
                $sliderVideos[] = JURI::root(true) . substr($rvideo, strlen(JPATH_BASE));
                $sliderImages[] = JURI::root(true) . substr($image, strlen(JPATH_BASE));
            }
        }
    }
} else {
    $sliderStatus = 'slider-status-disabled';
}

if (empty($sliderVideos))
    $useSlider = false;

if ($this->countModules('featured') || $useSlider)
    $featuredSpace = true;
else
    $featuredSpace = false;

if ($this->countModules('video'))
    $videoPosition = true;
else
    $videoPosition = false;