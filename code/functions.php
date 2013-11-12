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
$enableGridBottom3Bg = $this->params->get('enableGridBottom3Bg','0');
$addBgImgGridBottom3 = ($enableGridBottom3Bg == '1' ? ' addBgImgGridBottom3' : '' );

function checkImage($img, $default) {
        if ($img == "") {
                $img = $default;
        }
        elseif ($img != "-1") {
                $img = "images/" . $img;
        }

        if ($img != "-1") {
                $img = JPATH_BASE . '/' . $img;
                if (!file_exists($img)) {
                        $img = "-1";
                }
        }

        return $img;
}

$imgGridBottom3Bg = checkImage($this->params->get("imgGridBottom3Bg", ""), "templates/js_civic/images/default-bg-grid-bottom-3.jpg");
$imgGridTop3Bg = checkImage($this->params->get("imgGridTop3Bg", ""), "templates/js_civic/images/default-bg-grid-top-3.jpg");

if ($imgGridBottom3Bg != "-1") $imgGridBottom3Bg = str_replace(JPATH_BASE, '', $imgGridBottom3Bg);
if ($imgGridTop3Bg != "-1") $imgGridTop3Bg = str_replace(JPATH_BASE, '', $imgGridTop3Bg);


$enableFluidContainerGridBottom = $this->params->get('enableFluidContainerGridBottom','0');
$enableFluidContainerGridBottom2 = $this->params->get('enableFluidContainerGridBottom2','0');
$bgColorGridBottom = $this->params->get('bgColorGridBottom','transparent');
$bgColorGridBottom2 = $this->params->get('bgColorGridBottom2','transparent');
$separateGridBottom2 = $this->params->get('separateGridBottom2','1');

$classSeparatorGridBottom2 = ($separateGridBottom2 == '0') ? ' noSeparateGridBottom2' : '' ;


