<?php

namespace cbtech\unsplash\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@cbtech/unsplash';
    public $sourcePath = '@cbtech/unsplash';
    public $css = [
        
    ];
    public $js = [
    		'js/spin.js',
    ];
    public $jsOptions = [
    		"position"=>\yii\web\View::POS_HEAD
    ];
    public $depends = [
//         'yii\web\YiiAsset',
    	'frontend\assets\jQueryAsset',
    ];
}
