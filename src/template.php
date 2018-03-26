<?php
/**
 * @package     Civic
 * @subpackage  Template File
 *
 * @copyright   Copyright (C) 2005 - 2016 Joomlashack. Meritage Assets.
 *              All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * Do not edit this file directly. You can copy it and create a new file called
 * 'custom.php' in the same folder, and it will override this file. That way
 * if you update the template ever, your changes will not be lost.
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<doctype>
<html>
    <head>
        <w:head />
        <style type="text/css">
            <?php if ($sliderVideos) : ?>
            #featured .wrapper {
                width: <?php echo 100*sizeof($sliderVideos); ?>%;
            }
            .screen {
                width: <?php echo round(100/sizeof($sliderVideos),5); ?>%;
            }
            <?php endif; ?>

            <?php if ($imgGridTopBg != '') : ?>
            #grid-top {
                background-image: url('<?php echo $imgGridTopBg ?>');
            }
            <?php endif; ?>
            <?php if ($imgGridTop2Bg != '') : ?>
            #grid-top2 {
                background-image: url('<?php echo $imgGridTop2Bg ?>');
            }
            <?php endif; ?>
            <?php if ($imgGridTop3Bg != '') : ?>
            #grid-top3 {
                background-image: url('<?php echo $imgGridTop3Bg ?>');
            }
            <?php endif; ?>
            <?php if ($imgGridBottomBg != '') : ?>
            #grid-bottom {
                background-image: url('<?php echo $imgGridBottomBg ?>');
            }
            <?php endif; ?>
            <?php if ($imgGridBottom2Bg != '') : ?>
            #grid-bottom2 {
                background-image: url('<?php echo $imgGridBottom2Bg ?>');
            }
            <?php endif; ?>
            <?php if ($imgGridBottom3Bg != '') : ?>
            #grid-bottom3 {
                background-image: url('<?php echo $imgGridBottom3Bg ?>');
            }
            <?php endif; ?>
            <?php if ($imgGridBottom4Bg != '') : ?>
            #grid-bottom4 {
                background-image: url('<?php echo $imgGridBottom4Bg ?>');
            }
            <?php endif; ?>
            <?php if ($imgGridBottom5_6Bg != '') : ?>
            #grid-bottom5_6 {
                background-image: url('<?php echo $imgGridBottom5_6Bg ?>');
            }
            <?php endif; ?>

        </style>
        <!--[if lte IE 8]>
        <style type="text/css">
            <?php if ($imgGridTopBg != '') : ?>
            #grid-top {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridTopBg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
            <?php if ($imgGridTop2Bg != '') : ?>
            #grid-top2 {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridTop2Bg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
            <?php if ($imgGridTop3Bg != '') : ?>
            #grid-top3 {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridTop3Bg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
            <?php if ($imgGridBottomBg != '') : ?>
            #grid-bottom {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridBottomBg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
            <?php if ($imgGridBottom2Bg != '') : ?>
            #grid-bottom2 {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridBottom2Bg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
            <?php if ($imgGridBottom3Bg != '') : ?>
            #grid-bottom3 {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridBottom3Bg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
            <?php if ($imgGridBottom4Bg != '') : ?>
            #grid-bottom4 {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridBottom4Bg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
            <?php if ($imgGridBottom5_6Bg != '') : ?>
            #grid-bottom5_6 {
                -ms-filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo $imgGridBottom5_6Bg ?>,sizingMethod=scale)';
            }
            <?php endif; ?>
        </style>
        <![endif]-->
    </head>
    <body class="<?php echo $responsive . ' Tone' . $Tone . ' ' . $FeauredAlwaysVisible; ?>">
        <?php if ($this->countModules('toolbar')) : ?>
            <!-- toolbar -->
            <w:nav containerClass="<?php echo $containerClass ?>" rowClass="<?php echo $gridMode;?>" wrapClass="navbar-fixed-top navbar-inverse" type="toolbar" name="toolbar" />
        <?php endif; ?>

        <?php if ($featuredSpace) : ?>
            <!-- featured -->
            <div id="featured">

                <?php if ($useSlider) : ?>
                <nav id="prev-btn">
                    <a href="#" class="nav-icon prev-icon"> Previous </a>
                </nav>

                <div class="wrapper">
                    <?php $v = 1; foreach ($sliderVideos as $video) : ?>
                        <div class="screen" id="screen-<?php echo $v ?>" data-video="<?php echo $video ?>">
                            <img src="<?php echo $sliderImages[$v-1] ?>" class="big-image" />
                        </div>
                    <?php $v++; endforeach; ?>
                </div>

                <div class="big-loader visible-desktop">
                    <i class="icon-spinner icon-spin icon-4x"></i>
                    <h4><?php echo JText::_('TPL_JS_CIVIC_LOADING'); ?></h4>
                </div>

                <nav id="next-btn">
                    <a href="#" class="nav-icon next-icon"> Next </a>
                </nav>
                <?php endif; ?>

                <?php if ($this->countModules('featured')) : ?>
                <div class="featured-inner">
                    <w:module type="none" name="featured" />
                </div>
                <?php endif; ?>

                <?php if ($this->countModules('slider') && $useSlider) : ?>
                <div class="slider <?php echo $containerClass; ?>">
                    <w:module type="none" name="slider" />
                </div>
                <?php endif; ?>

                <?php if ($useSlider) : ?>
                <div class="slider-filter"></div>
                <?php endif ?>
            </div>
        <?php endif; ?>

        <div id="container-civic">

            <?php if ($this->countModules('video')) : ?>
                <div id="video">
                    <!-- video -->
                    <w:module type="none" name="video" />
                </div>
            <?php endif; ?>

            <header id="header" class="navbar-inverse">
                <div class="<?php echo $containerClass; ?>">
                    <div class="<?php echo $gridMode; if ($featuredSpace || $videoPosition) { echo ' dropup';} ?>">
                        <w:logo name="menu" />
                    </div>
                </div>
            </header>

            <?php if ($this->countModules('grid-top')) : ?>
            <!-- grid-top -->
            <div id="grid-top" class="<?php echo $bgColorGridTop; ?>">
                <div class="grid-top <?php echo $containerClass; ?>">
                    <w:module type="<?php echo $gridMode; ?>" name="grid-top" chrome="wrightflexgrid" />
                </div>
            </div>
            <?php endif; ?>

            <?php if ($this->countModules('grid-top2')) : ?>
            <!-- grid-top2 -->
            <div id="grid-top2" class="<?php echo $bgColorGridTop2; ?>">
                <div class="grid-top2 <?php echo $containerClass; ?>">
                    <w:module type="<?php echo $gridMode; ?>" name="grid-top2" chrome="wrightflexgrid" />
                </div>
            </div>
            <?php endif; ?>

            <?php if ($this->countModules('grid-top3')) : ?>
            <div id="grid-top3" class="<?php echo $bgColorGridTop3; ?>">
                <div class="grid-top3 <?php echo $containerClass; ?>">
                    <w:module type="<?php echo $gridMode; ?>" name="grid-top3" chrome="wrightflexgrid" />
                </div>
            </div>
            <?php endif; ?>

            <?php if (!$this->countModules('grid-top') || !$this->countModules('grid-top2')) : ?>
            <?php if (!$this->countModules('grid-top3')) : ?>
            <div class="wrapp-breadcrumb">
                <div class="<?php echo $containerClass; ?>">
                    <div class="<?php echo $gridMode; ?>">
                        <div class="span12">
                            <?php if ($this->countModules('breadcrumbs')) : ?>
                            <!-- breadcrumbs -->
                            <div id="breadcrumbs">
                            <w:module type="single" name="breadcrumbs" chrome="none" />
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

            <div class="<?php echo $containerClass ?> wrapp-content">
                <div id="main-content" class="<?php echo $gridMode; ?>">
                    <!-- sidebar1 -->
                    <aside id="sidebar1">
                        <w:module name="sidebar1" />
                    </aside>
                    <!-- main -->
                    <section id="main">
                        <?php if ($this->countModules('above-content')) : ?>
                        <!-- above-content -->
                        <div id="above-content">
                            <w:module type="none" name="above-content" />
                        </div>
                        <?php endif; ?>

                        <?php if ($this->countModules('grid-top') && $this->countModules('grid-top2')) : ?>
                        <?php if ($this->countModules('breadcrumbs')) : ?>
                        <div id="breadcrumbs">
                            <w:module type="single" name="breadcrumbs" chrome="none" />
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>

                        <!-- component -->
                        <w:content />
                        <?php if ($this->countModules('below-content')) : ?>
                        <!-- below-content -->
                        <div id="below-content">
                            <w:module type="none" name="below-content" />
                        </div>
                        <?php endif; ?>
                    </section>
                    <!-- sidebar2 -->
                    <aside id="sidebar2">
                        <w:module name="sidebar2" />
                    </aside>
                </div>

            </div>

            <?php if ($this->countModules('grid-bottom')) : ?>
                <!-- grid-bottom -->
                <div id="grid-bottom" class="<?php echo $bgColorGridBottom . $classSeparatorGridBottom; ?>">
                    <div class="grid-bottom">
                        <?php if ($enableFluidContainerGridBottom == '0') : ?>
                        <div class="<?php echo $containerClass ; ?>">
                            <w:module type="<?php echo $gridMode; ?>" name="grid-bottom" chrome="wrightflexgrid" />
                        </div>
                        <?php else : ?>
                        <div class="container-fluid container-no-padding row-no-margin">
                            <w:module type="row-fluid" name="grid-bottom" chrome="wrightflexgrid" />
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->countModules('grid-bottom2')) : ?>
                <div id="grid-bottom2" class="<?php echo $bgColorGridBottom2 . $classSeparatorGridBottom2; ?>">
                    <div class="grid-bottom2">
                        <?php if ($enableFluidContainerGridBottom2 == '0') : ?>
                        <div class="<?php echo $containerClass ; ?>">
                            <w:module type="<?php echo $gridMode; ?>" name="grid-bottom2" chrome="wrightflexgrid" />
                        </div>
                        <?php else : ?>
                        <div class="container-fluid container-no-padding row-no-margin">
                            <w:module type="row-fluid" name="grid-bottom2" chrome="wrightflexgrid"/>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->countModules('grid-bottom3')) : ?>
                <div id="grid-bottom3" class="<?php echo $bgColorGridBottom3 . $classSeparatorGridBottom3; ?>">
                    <?php if ($enableFluidContainerGridBottom3 == '0') : ?>
                    <div class="<?php echo $containerClass ?>">
                        <w:module type="<?php echo $gridMode; ?>" name="grid-bottom3" chrome="wrightflexgrid" />
                    </div>
                    <?php else : ?>
                    <div class="container-fluid container-no-padding row-no-margin">
                        <w:module type="row-fluid" name="grid-bottom3" chrome="wrightflexgrid" />
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($this->countModules('grid-bottom4')) : ?>
                <div id="grid-bottom4" class="<?php echo $bgColorGridBottom4 . $classSeparatorGridBottom4; ?>">
                    <?php if ($enableFluidContainerGridBottom4 == '0') : ?>
                    <div class="<?php echo $containerClass ?>">
                        <w:module type="<?php echo $gridMode; ?>" name="grid-bottom4" chrome="wrightflexgrid" />
                    </div>
                    <?php else : ?>
                    <div class="container-fluid container-no-padding row-no-margin">
                        <w:module type="row-fluid" name="grid-bottom4" chrome="wrightflexgrid" />
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($this->countModules('grid-bottom5') || $this->countModules('grid-bottom6')) : ?>
                <div id="grid-bottom5_6" class="<?php echo $bgColorGridBottom5_6; ?>">
                    <?php if ($this->countModules('grid-bottom5')) : ?>
                        <div id="grid-bottom5" class="<?php echo $classSeparatorGridBottom5 ?>">
                            <?php if ($enableFluidContainerGridBottom5 == '0') : ?>
                            <div class="<?php echo $containerClass ?>">
                                <w:module type="<?php echo $gridMode; ?>" name="grid-bottom5" chrome="wrightflexgrid" />
                            </div>
                            <?php else : ?>
                            <div class="container-fluid container-no-padding row-no-margin">
                                <w:module type="row-fluid" name="grid-bottom5" chrome="wrightflexgrid" />
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->countModules('grid-bottom6')) : ?>
                        <div id="grid-bottom6" class="<?php echo $classSeparatorGridBottom6 ?>">
                            <?php if ($enableFluidContainerGridBottom6 == '0') : ?>
                            <div class="<?php echo $containerClass ?>">
                                <w:module type="<?php echo $gridMode; ?>" name="grid-bottom6" chrome="wrightflexgrid" />
                            </div>
                            <?php else : ?>
                            <div class="container-fluid container-no-padding row-no-margin">
                                <w:module type="row-fluid" name="grid-bottom6" chrome="wrightflexgrid" />
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- footer -->
        <div class="wrapper-footer">
            <footer id="footer" <?php if ($this->params->get('stickyFooter',1)) : ?> class="sticky"<?php endif;?>>
                <?php if ($this->countModules('bottom-menu')) : ?>
                <!-- bottom-menu -->
                <w:nav containerClass="<?php echo $containerClass ?>" rowClass="<?php echo $gridMode;?>" wrapClass="navbar-inverse" name="bottom-menu" />
                <?php endif; ?>
                 <div class="<?php echo $containerClass ?> footer-content">
                    <?php if ($this->countModules('footer')) : ?>
                    <w:module type="<?php echo $gridMode; ?>" name="footer" chrome="wrightflexgrid" />
                    <?php endif; ?>
                    <w:footer />
                </div>
            </footer>
        </div>

        <w:module type="none" name="debug" chrome="none" />

        <?php if ($useSlider) : ?>
            <script type="text/javascript" src="<?php echo JURI::root(true) ?>/templates/js_civic/js/modernizr-2.7.1.min.js"></script>
            <script type="text/javascript" src="<?php echo JURI::root(true) ?>/templates/js_civic/js/jquery-ui-1.10.3.custom.min.js"></script>
            <script type="text/javascript" src="<?php echo JURI::root(true) ?>/templates/js_civic/js/jquery.imagesloaded.min.js"></script>
            <script type="text/javascript" src="<?php echo JURI::root(true) ?>/templates/js_civic/js/video.js"></script>
            <script type="text/javascript" src="<?php echo JURI::root(true) ?>/templates/js_civic/js/bigvideo.js"></script>
            <script type="text/javascript" src="<?php echo JURI::root(true) ?>/templates/js_civic/js/jquery.transit.min.js"></script>
        <?php endif; ?>
        <script type="text/javascript">
            var civicSlider = <?php echo ($useSlider ? "true" : "false") ?>;
        </script>
        <script type="text/javascript" src="<?php echo JURI::root(true) ?>/templates/js_civic/js/civic.js"></script>

    </body>
</html>
