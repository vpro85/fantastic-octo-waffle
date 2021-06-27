<?php
/* @var $this yii\web\View */

use common\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Product Description | $product->name";
$mainImg = $product->getImage();
$gallery = $product->getImages();
?>
<h2 class="text-center">Product Details</h2>
<div class="product-details">
    <div class="col-sm-5">
        <div class="view-product">
            <?= Html::img($mainImg->getUrl(), ['alt' => $product->name, 'width' => '100%']) ?>
        </div>
        <div class="carousel-inner">
            <?php $count = count($gallery); $i=0; foreach ($gallery as $img): ?>
                <?php if ($i % 3 == 0): ?>
                    <div class="item<?php if ($i == 0) echo (" active") ?>">
                <?php endif; ?>
                <a href=""><?= Html::img($img->getUrl('84x85')) ?></a>
                <?php  $i++; if ($i % 3 == 0 || $i == $count): ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <h2><?= $product->name ?></h2>
            <h4><?= Category::findOne($product->category_id)['name'] ?></h4>
            <span>
                <span>US $<?= $product->price; ?></span>
                <label>Quantity:</label>
                <input type="text" value="1" id="qty"/>
                <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-fefault add-to-cart cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </a>
            </span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Description:</b> <?= $product->description ?></p>
            <p></p>
            <?= $product->content ?>
        </div><!--/product-information-->
    </div>
</div>
