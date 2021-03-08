<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div class="col-sm-9 padding-right">
    <div class="features_items">
        <h2 class="text-center"><?= $category->name ?></h2>
        <?php foreach ($products as $product): ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <?= Html::img("/images/products/{$product->img}", ['alt' => $product->name]) ?>
                        <h2>$<?= $product->price ?></h2>
                        <p><?= Html::a("$product->name", ['/product/view', 'id' => $product->id]) ?></p>
                        <a href="#" data-id="1" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
        <div class="row text-center">
            <div class="col">
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </div>
        </div>
    </div>
</div>