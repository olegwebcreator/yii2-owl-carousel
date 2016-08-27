<?php
namespace webcreator\owl\models;
use yii\base\Model;

class Slider extends Model
{
    public $title;
    public $link;
    public $img;
    public $imgTitle;
    public $price;

    public $addToCart;
    public $addToWishlist;
    public $quickView;

    public function __construct( $title, $link, $img, $imgTitle, $price )
    {
        $this -> title = $title;
        $this -> link  = $link;
        $this -> img   = $img;
        $this -> imgTitle = $imgTitle;
        $this -> price = $price;

        $this -> addToWishlist = ".login-modal";
        $this -> addToCart     = "cart-page.html";
        $this -> quickView     = ".quick-view";

        parent :: __construct();
    }

    public function rules()
    {
        return [
            [ [ "title", "link", "img", "imgTitle" ], "string" ],
            [ [ "price" ], "integer" ],
            [ [ "addToWishlist", "addToCart", "quickView" ], "safe" ]
        ];
    }
}