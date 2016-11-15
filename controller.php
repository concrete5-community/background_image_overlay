<?php
namespace Concrete\Package\BackgroundImageOverlay;

use Package;
use BlockType;

/*
Background Image and Overlay by Karl Dilkington (aka MrKDilkington)
This software is licensed under the terms described in the concrete5.org marketplace.
Please find the add-on there for the latest license copy.
*/

class Controller extends Package
{
	protected $pkgHandle = 'background_image_overlay';
	protected $appVersionRequired = '5.7.3';
	protected $pkgVersion = '0.9.8';

	public function getPackageName()
	{
		return t('Background Image and Overlay');
	}

	public function getPackageDescription()
	{
		return t('Add a full screen background image and overlay on your pages.');
	}

	public function install()
	{
	    $pkg = parent::install();
		$blk = BlockType::getByHandle('background_image_overlay');
		if (!is_object($blk) ) {
			BlockType::installBlockTypeFromPackage('background_image_overlay', $pkg);
		}
	}
}
