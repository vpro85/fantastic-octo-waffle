<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<div class="features_items">
    <h2 class="text-center"><?= $category->name ?></h2>
    <?php foreach ($products as $product): ?><div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?= Html::img("/images/products/{$product->img}", ['alt' => $product->name]) ?>
                    <h2>$<?= $product->price ?></h2>
                    <p><?= Html::a("$product->name", ['/product/view', 'id' => $product->id]) ?></p>
                    <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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