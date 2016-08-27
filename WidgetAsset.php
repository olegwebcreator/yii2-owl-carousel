<?php
namespace webcreator\OwlCarousel;
use yii\web\AssetBundle;

class WidgetAsset extends AssetBundle
{
    public $sourcePath = '@webcreator/OwlCarousel/assets';
    public $js = [
        'plugins/owl-carousel/owl.carousel.js',
    ];
    public $css = [
        'plugins/owl-carousel/owl.carousel.css',
        'custom.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}