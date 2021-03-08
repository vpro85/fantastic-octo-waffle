<?php

namespace frontend\controllers;

use common\models\Product;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionView()
    {

        return $this->render('view');
    }

}
