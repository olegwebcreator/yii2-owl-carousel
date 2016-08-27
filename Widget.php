<?php
namespace webcreator\owl;

use Yii;
use yii\base\Widget as BaseWidget;
use yii\helpers\Html;
use yii\helpers\Json;

class Widget extends BaseWidget
{
    public $title;
    public $products = [];
    public $options = [];
    public $container;

    public function init()
    {
        parent :: init();
        ob_start();
    }
    public function run()
    {
        $content = ob_get_clean();
        $class = $this -> container ? $this -> container : "Slider";
        $options = Json :: encode( $this -> options );

        echo Html :: beginTag( "div", [ "class" => "row featuredProducts" ] ) . "\n";
            echo Html :: tag( "div", Html :: tag( "div", Html :: tag( "h4", $this -> title ) . "\n",
                    [ "class" => "page-header" ] ) . "\n",
                [ "class" => "col-xs-12" ] ) . "\n";

            echo Html :: beginTag( "div", [ "class" => "col-xs-12" ] ) . "\n";
                echo Html :: beginTag( "div", [ "class" => "owl-carousel {$class}" ] ) . "\n";

                    foreach ( $this -> products as $product )
                    {
                        echo Html :: beginTag( "div", [ "class" => "slide" ] ) . "\n";
                            echo Html :: beginTag( "div", [ "class" => "productImage clearfix" ] ) . "\n" .
                                 Html :: img( $product -> img, [ "alt" => ( $product -> imgTitle
                                        ? $product -> imgTitle : $product -> title ) ] ) . "\n";
                                echo Html :: beginTag( "div", [ "class" => "productMasking" ] ) . "\n";
                                    echo Html :: beginTag( "ul", [
                                            "class" => "list-inline btn-group",
                                            "role" => "group"
                                    ] ) . "\n";
                                        echo Html :: tag ( "li",
                                                Html :: a( Html :: tag( "i", "", [ "class" => "fa fa-heart"] ),
                                                    [ $product -> addToWishlist ],
                                                    [
                                                        "class" => "btn btn-default",
                                                        "data" => [ "toggle" => "modal" ] ] ) ) . "\n";
                                        echo Html :: tag ( "li",
                                                Html :: a( Html :: tag( "i", "", [ "class" => "fa fa-shopping-cart" ] ),
                                                    [ $product -> addToCart ],
                                                    [ "class" => "btn btn-default" ] ) ) . "\n";
                                        echo Html :: tag ( "li",
                                                Html :: a( Html :: tag( "i", "", [ "class" => "fa fa-eye"] ),
                                                    [ $product -> quickView ],
                                                    [
                                                        "class" => "btn btn-default",
                                                        "data" => [ "toggle" => "modal" ] ] ) ) . "\n";
                                    echo Html :: endTag( "ul" ) . "\n";
                                echo Html :: endTag( "div" ) . "\n";
                            echo Html :: endTag( "div" ) . "\n";

                            echo Html :: beginTag( "div", [ "class" => "productCaption clearfix" ] ) . "\n";
                                echo Html :: a( Html :: tag( "h5", $product -> title ), [ $product -> link ] );
                                echo Html :: tag( "h3", "$" . $product -> price ) . "\n";
                            echo Html :: endTag( "div" ) . "\n";
                        echo Html :: endTag( "div" ) . "\n";
                    }
                echo Html :: endTag( "div" ) . "\n";
            echo Html :: endTag( "div" ) . "\n";
            echo $content;
        echo Html :: endTag( "div" ) . "\n";

        $view = $this -> view;
        $view->registerJs("
            jQuery(document).ready(function() {
                var owl = $('.owl-carousel.{$class}');
                owl.owlCarousel({$options});
            });
        ");
        WidgetAsset :: register( $view );
    }
}
