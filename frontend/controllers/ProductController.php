<?php

namespace frontend\controllers;

use common\models\Product;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionView($id)
    {
        $product = Product::findOne($id);
        return $this->render('view', compact('product'));
    }

}
