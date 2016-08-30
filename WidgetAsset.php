<?php
namespace webcreator\owl;
use yii\web\AssetBundle;

class WidgetAsset extends AssetBundle
{
    public $sourcePath = "@webcreator/owl/assets";
    public $js = [
        "plugins/owl-carousel/owl.carousel.js",
    ];
    public $css = [
        "plugins/font-awesome/css/font-awesome.min.css",
        "plugins/owl-carousel/owl.carousel.css",
        "custom.css"
    ];
    public $depends = [
        "yii\web\JqueryAsset"
    ];
}