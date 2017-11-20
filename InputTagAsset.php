<?php
/**
 * Define Assets of  inout tag widget
 */

namespace aminkt\widgets\inputTag;


use yii\web\View;

class InputTagAsset extends \yii\web\AssetBundle
{
    public $sourcePath = __DIR__."/assets";
    public $css = [
        'jquerytagsinput.css',
        'fa.css',
    ];

    public $js = [
        'jquerytagsinput.js',
    ];

    public $jsOptions = ['position'=>View::POS_END];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}