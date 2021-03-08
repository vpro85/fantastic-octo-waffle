<?php


namespace frontend\controllers;

use Yii;
use common\models\Product;


class CartController extends AppController
{
    public function actionAdd()
    {
        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->renderAjax('cart-modal');
    }

    public function actionShow()
    {
        return $this->renderAjax('cart-modal');
    }
}