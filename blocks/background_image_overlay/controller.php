<?php
namespace Concrete\Package\BackgroundImageOverlay\Block\BackgroundImageOverlay;

use Concrete\Core\Block\BlockController;
use Core;

class Controller extends BlockController
{
    protected $btInterfaceHeight = 650;
    protected $btInterfaceWidth = 485;
    protected $btCacheBlockOutput = true;
    protected $btExportFileColumns = array('fID');
    protected $btIgnorePageThemeGridFrameworkContainer = true;
    protected $btTable = 'btBackgroundImageOverlay';
    protected $btDefaultSet = 'multimedia';

    public function getBlockTypeDescription()
    {
        return t('Add a full screen background image and overlay on your pages.');
    }

    public function getBlockTypeName()
    {
        return t('Background Image and Overlay');
    }

    public function registerViewAssets($outputContent = '')
    {
        $this->requireAsset('javascript', 'jquery');
    }

    public function validate($args)
    {
        $error = Core::make('helper/validation/error');
        $requiredImage = $args['fID'];
        if (!$requiredImage) {
            $error->add(t('Please select an image.'));
        }

        return $error;
    }

    public function save($args)
    {
        $args['fID'] = intval($args['fID']);
        $args['bgResponsive'] = intval($args['bgResponsive']);
        $args['bgFocalPoint'] = intval($args['bgFocalPoint']);
        $args['bgFocalPointX'] = intval($args['bgFocalPointX']);
        $args['bgFocalPointY'] = intval($args['bgFocalPointY']);
        $args['elementalOverride'] = intval($args['elementalOverride']);

        parent::save($args);
    }
}
