<?php defined('C5_EXECUTE') or die('Access Denied.');

$al = Core::make('helper/concrete/asset_library');
$color = Core::make('helper/form/color');

if ($fID > 0) {
    $fo = File::getByID($fID);
    if (!is_object($fo)) {
        unset($fo);
    }
}
?>

<style>
.pixel-input-width {
    width: 100px;
}
.message-space {
    margin-top: 10px;
}
.bg-pos-values {
    display: inline-block;
    margin-right: 15px;
}
.padding-well {
    width: 306px;
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
    text-align: center;
}
</style>

<!-- Background Image -->
<div class="form-group">
    <?php echo $form->label('fID', t('Background Image'));?>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('An image must be selected when using this block. If the block is added or saved without an image, it will trigger an error.'); ?>"></i>
    <?php echo $al->image('ccm-background-image', 'fID', t('Select Image'), $fo); ?>
</div>

<!-- Responsive Image Scaling -->
<div class="form-group">
    <?php echo $form->label('bgResponsive', t('Responsive Image Scaling'));?>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('Responsive image scaling will proportionally scale the background image according to the width of the page. If the page is equal to or greater than 1000px wide the image is scaled to a maximum 1600px in width. If the page is between 701px and 999px wide the image is scaled to a maximum 1300px in width. If the page is less than or equal to 700px wide the image is scaled to a maximum 1000px in width.'); ?>"></i>
    <?php echo $form->select('bgResponsive', array( 0 => t('off'), 1 => t('on')), $bgResponsive, array('style' => 'width: 88px;')); ?>
</div>

<!-- Focal Point -->
<div class="form-group">
    <?php echo $form->label('bgFocalPoint', t('Background Image Focal Point'));?>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('An optional focal point can be set using the CSS background-position property. This will allow the focal point of an image to stay visible on different screen sizes. Without a focal point set, the center of the image is the focal point. The first value of the background-position is the X percentage and the second value is the Y percentage.'); ?>"></i>
    <?php echo $form->select('bgFocalPoint', array( 0 => t('off'), 1 => t('on')), $bgFocalPoint, array('style' => 'width: 88px;')); ?>
</div>

<div class="padding-well"><?php echo t('background-position: X% Y%;'); ?></div>

<div class="form-group bg-pos-values">
    <div class="input-group pixel-input-width">
    <span class="input-group-addon"><?php echo t('X'); ?></span>
    <?php echo $form->number('bgFocalPointX', $bgFocalPointX ? $bgFocalPointX : '0', array('style' => 'width: 73px;', 'min' => 0, 'max' => 99))?><span class="input-group-addon">%</span>
    </div>
</div>

<div class="form-group bg-pos-values">
    <div class="input-group pixel-input-width">
    <span class="input-group-addon"><?php echo t('Y'); ?></span>
    <?php echo $form->number('bgFocalPointY', $bgFocalPointY ? $bgFocalPointY : '0', array('style' => 'width: 73px;', 'min' => 0, 'max' => 99))?><span class="input-group-addon">%</span>
    </div>
</div>

<div class="message-space"><?php echo t('FocusPoint Helper Tool:'); ?><i style="color: black;" class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('Use the FocusPoint Helper Tool to get the background-position values for your focal point.'); ?>"></i>
<br>
<a href="<?php echo t('http://jonom.github.io/jquery-focuspoint/demos/helper/index.html'); ?>" target="_blank"><?php echo t('http://jonom.github.io/jquery-focuspoint/demos/helper/index.html'); ?></a></div>
<br>

<!-- Background Overlay Color -->
<div class="form-group">
    <label for="ccm-colorpicker-bgOverlayColor" class="control-label"><?php echo t('Background Overlay Color'); ?></label>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('The selected RGBA color will be layered on top of the background image. The slider under the color palette controls the transparency. Selecting an overlay color is optional.'); ?>"></i>
    <br>
    <?php $color->output('bgOverlayColor', $bgOverlayColor, array('showAlpha' => 'true', 'showPalette' => 'true', 'palette' => array(
        // white, grey, black
        array('rgba(255, 255, 255, 0.7)', 'rgba(124, 124, 124, 0.7)', 'rgba(0, 0, 0, 0.7)'),
        // red
        array('rgba(141, 0, 0, 0.7)', 'rgba(95, 0, 0, 0.7)', 'rgba(58, 0, 0, 0.7)'),
        // orange
        array('rgba(141, 74, 0, 0.7)', 'rgba(97, 51, 0, 0.7)', 'rgba(58, 31, 0, 0.7)'),
        // yellow
        array('rgba(139, 133, 0, 0.7)', 'rgba(95, 91, 0, 0.7)', 'rgba(58, 56, 0, 0.7)'),
        // green
        array('rgba(0, 141, 6, 0.7)', 'rgba(0, 95, 4, 0.7)', 'rgba(0, 58, 3, 0.7)'),
        // lightblue
        array('rgba(0, 90, 141, 0.7)', 'rgba(0, 61, 95, 0.7)', 'rgba(0, 37, 58, 0.7)'),
        // blue
        array('rgba(0, 23, 142, 0.7)', 'rgba(0, 15, 95, 0.7)', 'rgba(0, 9, 58, 0.7)'),
        // purple
        array('rgba(61, 0, 142, 0.7)', 'rgba(41, 0, 95, 0.7)', 'rgba(25, 0, 58, 0.7)'),
        // magenta
        array('rgba(136, 0, 136, 0.7)', 'rgba(95, 0, 95, 0.7)', 'rgba(57, 0, 57, 0.7)'),
        // sepia
        array('rgba(255, 204, 0, 0.13)', 'rgba(95, 76, 0, 0.29)', 'rgba(95, 50, 0, 0.29)')
        )));
    ?>
</div>

<!-- Fallback Overlay Color -->
<div class="form-group">
    <?php echo $form->label('bgOverlayColorFallback', t('Fallback Overlay Color'));?>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('Older browsers do not support RGBA colors. A fallback option is provided using semi-transparent PNG files.'); ?>"></i>
    <?php echo $form->select('bgOverlayColorFallback', array(0 => t('off'), 'black' => t('black'), 'red' => t('red'), 'orange' => t('orange'), 'yellow' => t('yellow'), 'green' => t('green'), 'lightblue' => t('lightblue'),
    'blue' => t('blue'), 'purple' => t('purple'), 'magenta' => t('magenta'), 'sepia' => t('sepia')), $bgOverlayColorFallback, array('style' => 'width: 110px;')); ?>
</div>

<!-- Background Fallback Color -->
<div class="form-group">
    <label for="ccm-colorpicker-bgFallbackColor" class="control-label"><?php echo t('Background Fallback Color'); ?></label>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('The placement of the background image relies on CSS that is not supported, or improperly implemented, on older mobile browsers. For these browsers, a fallback color can be chosen to be displayed instead of the image.'); ?>"></i>
    <br>
    <?php $color->output('bgFallbackColor', $bgFallbackColor, array('preferredFormat' => 'hex'));
    ?>
</div>

<!-- Image Vignette Color -->
<div class="form-group">
    <label for="ccm-colorpicker-bgVignetteColor" class="control-label"><?php echo t('Image Vignette Color'); ?></label>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('The selected RGBA color will be used to give the background image an inset box shadow vignette effect. The slider under the color palette controls the transparency. Selecting an vignette color is optional and is not supported in older browsers.'); ?>"></i>
    <br>
    <?php $color->output('bgVignetteColor', $bgVignetteColor, array('showAlpha' => 'true', 'showPalette' => 'true', 'palette' => array(
        // white, grey, black
        array('rgba(255, 255, 255, 0.7)', 'rgba(124, 124, 124, 0.7)', 'rgba(0, 0, 0, 0.7)'),
        // red
        array('rgba(141, 0, 0, 0.7)', 'rgba(95, 0, 0, 0.7)', 'rgba(58, 0, 0, 0.7)'),
        // orange
        array('rgba(141, 74, 0, 0.7)', 'rgba(97, 51, 0, 0.7)', 'rgba(58, 31, 0, 0.7)'),
        // yellow
        array('rgba(139, 133, 0, 0.7)', 'rgba(95, 91, 0, 0.7)', 'rgba(58, 56, 0, 0.7)'),
        // green
        array('rgba(0, 141, 6, 0.7)', 'rgba(0, 95, 4, 0.7)', 'rgba(0, 58, 3, 0.7)'),
        // lightblue
        array('rgba(0, 90, 141, 0.7)', 'rgba(0, 61, 95, 0.7)', 'rgba(0, 37, 58, 0.7)'),
        // blue
        array('rgba(0, 23, 142, 0.7)', 'rgba(0, 15, 95, 0.7)', 'rgba(0, 9, 58, 0.7)'),
        // purple
        array('rgba(61, 0, 142, 0.7)', 'rgba(41, 0, 95, 0.7)', 'rgba(25, 0, 58, 0.7)'),
        // magenta
        array('rgba(136, 0, 136, 0.7)', 'rgba(95, 0, 95, 0.7)', 'rgba(57, 0, 57, 0.7)'),
        // sepia
        array('rgba(255, 204, 0, 0.13)', 'rgba(95, 76, 0, 0.29)', 'rgba(95, 50, 0, 0.29)')
        )));
    ?>
</div>

<!-- Override Elemental Theme Styling -->
<div class="form-group">
    <?php echo $form->label('elementalOverride', t('Override Elemental Theme Styling'));?>
    <i class="fa fa-question-circle launch-tooltip" title="" data-original-title="<?php echo t('Override the default Elemental theme CSS styling that blocks the proper viewing of full screen background images.'); ?>"></i>
    <?php echo $form->select('elementalOverride', array( 0 => t('off'), 1 => t('on')), $elementalOverride, array('style' => 'width: 88px;')); ?>
</div>
