<?php
/**
 * @package     Civic
 * @subpackage  Functions
 *
 * @copyright   Copyright (C) 2005 - 2013 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Restrict Access to within Joomla
defined('_JEXEC') or die('Restricted access');

require_once('preg_find.php');

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


function checkImage($img, $default = "-1") {
    if ($img == "") {
        $img = $default;
    }
    elseif ($img != "-1") {
        $img = "images/" . $img;
    }

    if ($img != "-1") {
        if (!file_exists(JPATH_BASE . '/' . $img)) {
            $img = "-1";
        }
    }
    if ($img == "-1")
        return "";
    else
        return JURI::root(true) . "/" . $img;
}

$enableFluidContainerGridBottom = $this->params->get('enableFluidContainerGridBottom','0');
$enableFluidContainerGridBottom2 = $this->params->get('enableFluidContainerGridBottom2','0');

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

$imgGridTopBg = checkImage($this->params->get("imgGridTopBg", ""));
$imgGridTop2Bg = checkImage($this->params->get("imgGridTop2Bg", ""));
$imgGridTop3Bg = checkImage($this->params->get("imgGridTop3Bg", ""));
$imgGridBottomBg = checkImage($this->params->get("imgGridBottomBg", ""));
$imgGridBottom2Bg = checkImage($this->params->get("imgGridBottom2Bg", ""));
$imgGridBottom3Bg = checkImage($this->params->get("imgGridBottom3Bg", ""));
$imgGridBottom4Bg = checkImage($this->params->get("imgGridBottom4Bg", ""));
$imgGridBottom5_6Bg = checkImage($this->params->get("imgGridBottom5_6Bg"));

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
$useSlider = ($this->params->get('useSlider','1') == '1');
$videosFolder = $this->params->get('videosFolder','');
$imagesFolder = $this->params->get('imagesFolder','');

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
}

if (empty($sliderVideos))
    $useSlider = false;

if ($this->countModules('featured') || $useSlider)
    $featuredSpace = true;
else
    $featuredSpace = false;