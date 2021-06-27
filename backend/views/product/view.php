<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $img = $model->getImage(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'name',
            'content:raw',
            'price',
            'keywords',
            'description',
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl()}'></img>",
                'format' => 'raw',
            ],
//            'hit',
//            'new',
            [
                'attribute' => 'hit',
                'value' => function($data){
                    return !$data->hit ? '<span class="text-danger">No</span>' : '<span class="text-success">Yes</span>';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'new',
                'value' => function($data){
                    return !$data->new ? '<span class="text-danger">No</span>' : '<span class="text-success">Yes</span>';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'sale',
                'value' => function($data){
                    return !$data->sale ? '<span class="text-danger">No</span>' : '<span class="text-success">Yes</span>';
                },
                'format' => 'raw',
            ],
//            'sale',
        ],
    ]) ?>

</div>
