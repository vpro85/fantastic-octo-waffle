<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = "Product Description | $product->name";
?>
<h2 class="text-center">Product Details</h2>
<div class="product-details">
    <div class="col-sm-5">
        <div class="view-product">
            <?= Html::img("/images/products/{$product->img}", ['alt' => $product->name]) ?>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <h2><?= $product->name ?></h2>
            <span>
                <span>US $<?= $product->price; ?></span>
                <label>Quantity:</label>
                <input type="text" value="1" id="qty"/>
                <a href="#" data-id="2" class="btn btn-fefault add-to-cart cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </a>
            </span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Description:</b> <?= $product->description ?></p>
        </div><!--/product-information-->
    </div>
</div>
