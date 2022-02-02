<?php namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class FullPage
 * @package app\assets
 */
class FullPage extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
       'vendor/fullPage/dist/jquery.fullpage.min.css',
    ];

    public $js = [
        'vendor/fullPage/dist/jquery.fullpage.extensions.min.js',
        'vendor/fullPage/dist/jquery.fullpage.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
