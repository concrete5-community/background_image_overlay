<?php  defined('C5_EXECUTE') or die('Access Denied.');

$urlHelper = Core::make('helper/concrete/urls');
$blockType = BlockType::getByHandle('background_image_overlay');
$localPath = $urlHelper->getBlockTypeAssetsURL($blockType);
?>

<?php
$imageHelper = Core::make('helper/image');
$file = File::getByID($fID);
if (is_object($file)) {
    $bgLarge = $imageHelper->getThumbnail($file, 1600, 999, false);
    $bgMedium = $imageHelper->getThumbnail($file, 1300, 999, false);
    $bgSmall = $imageHelper->getThumbnail($file, 1000, 999, false);
}
?>

<?php if (Page::getCurrentPage()->isEditMode()) { ?>
    <div style="background: white; border: 1px solid black; padding: 10px; display: inline-block;"><i class="fa fa-picture-o" style="margin-right: 7px;"></i><?php echo t('Edit Background Image and Overlay'); ?></div>
<?php } ?>

<style>
<?php
if ($bgFallbackColor) {
    echo "body{background:{$bgFallbackColor};}";
}
?>

<?php if ($bgOverlayColor || $bgOverlayColorFallback || $bgVignetteColor) { ?>
.bg-color-overlay {
    height: 100%;
    width: 100%;
    margin: 0px;
    padding: 0px;
    position: fixed;
    left: 0px;
    top: 0px;
    z-index: -1;

    <?php
    switch ($bgOverlayColorFallback) {
        case 'black';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2NkYGDYDAAAvQC1UcyxoAAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'red';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2N04uPbDAACCwETn+n9kAAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'orange';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2O0lGPYDAAB+wEMLEUH4gAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'yellow';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2O0tGDYDAACSQEmL+/O5AAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'green';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2PkcxLYDAAB2wEV99oSpgAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'lightblue';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2NkULHcDAABmwESlNB53gAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'blue';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2PkE3DaDAABqQEV+Z2Z0wAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'purple';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2OUYLDcDAABjwEGZ/Lq2gAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'magenta';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2O0ZLDcDAACEwEn35ZGIgAAAABJRU5ErkJggg==) repeat;';
            break;
        case 'sepia';
            echo 'background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2OMNWDwAgACWADZykAZJAAAAABJRU5ErkJggg==) repeat;';
            break;
    }

    if ($bgOverlayColor) {
        echo "background: none, {$bgOverlayColor};";
    }

    if ($bgVignetteColor) {
        echo "box-shadow: 0 0 200px {$bgVignetteColor} inset;";
    }
    ?>
}
<?php } ?>

.vegas-background {
    -ms-interpolation-mode: bicubic;
    image-rendering: optimizeQuality;
    max-width: none !important;
    z-index: -2;
}
.vegas-overlay,
.vegas-background {
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

<?php if ($elementalOverride) { ?>
div.ccm-page header {
    background-color: transparent;
    border-bottom: none;
}
div.ccm-page main {
    background-color: transparent;
}
footer#concrete5-brand {
    background-color:transparent;
}
footer#footer-theme section:first-child {
    background-color: transparent;
}
footer#footer-theme section {
    border-top: none;
}
<?php } ?>
</style>

<script src="<?php echo $localPath; ?>/files/jquery.vegas.min.js"></script>
<script>
$(document).ready(function() {
    var is_webkit = navigator.userAgent.match(/(AppleWebKit)/gi) !== null;
    var webkit_string = navigator.userAgent.match(/(AppleWebKit\/\d\d\d)/gi);
    var webkit_version = false;

    if (is_webkit) {
        webkit_version = parseInt(webkit_string[0].match(/(\d\d\d)/gi));
    }

    var is_stock_android_browser = navigator.userAgent.match(/(Android)/gi) !== null
                            && navigator.userAgent.match(/(Chrome)/gi) === null
                            && navigator.userAgent.match(/(AppleWebKit)/gi) !== null
                            && webkit_version < 537;

    var is_operamini = navigator.userAgent.match(/(Opera Mini)/gi) !== null;

    var is_mobilesafari = navigator.userAgent.match(/(iPhone)/gi) !== null || navigator.userAgent.match(/(iPad)/gi) !== null;
    var ios_string = navigator.userAgent.match(/(OS \d_\d)/gi);
    var ios_version;
    var is_mobilesafari_sub5_1 = false;

    if (is_mobilesafari) {
        ios_version = ios_string[0].match(/(\d_\d)/gi);
        ios_version = parseFloat(ios_version[0].replace('_', '.'));
        if (ios_version < 5.1) {
            is_mobilesafari_sub5_1 = true;
        }
    }

    var bgImg;
    var pageWidth = $(window).width();

    <?php if ($bgResponsive) { ?>
    if (pageWidth >= 1000) {
        bgImg = '<?php if ($bgLarge) { echo $bgLarge->src; } ?>';
    } else if (pageWidth < 1000 && pageWidth > 700) {
        bgImg = '<?php if ($bgMedium) { echo $bgMedium->src; } ?>';
    } else if (pageWidth <= 700) {
        bgImg = '<?php if ($bgSmall) { echo $bgSmall->src; } ?>';
    }
    <?php } else { ?>
        bgImg = '<?php if ($bgLarge) { echo $bgLarge->src; } ?>';
    <?php } ?>

    if (!is_operamini && !is_stock_android_browser && !is_mobilesafari_sub5_1) {
        <?php if ($bgOverlayColor || $bgOverlayColorFallback || $bgVignetteColor) { ?>
        $('<div class="bg-color-overlay"></div>').prependTo('body');
        <?php } ?>

        $.vegas({
            src: bgImg,
            <?php if ($bgFocalPoint) { ?>
            align: '<?php if ($bgFocalPointX || $bgFocalPointX == 0) { echo $bgFocalPointX . '%'; } ?>',
            valign: '<?php if ($bgFocalPointY || $bgFocalPointY == 0) { echo $bgFocalPointY . '%'; } ?>'
            <?php } ?>
        });
    }
});
</script>

