<?php


namespace frontend\controllers;

use common\models\OrderItems;
use common\models\Orders;
use frontend\models\Cart;
use Yii;
use common\models\Product;


class CartController extends AppController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->renderAjax('cart-modal', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderAjax('cart-modal', compact('session'));
    }

    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        return $this->renderAjax('cart-modal', compact('session'));
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderAjax('cart-modal', compact('session'));
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Your Cart');
        $orders = new Orders();
        if ($orders->load(Yii::$app->request->post())) {
            $orders->qty = $session['cart.qty'];
            $orders->sum = $session['cart.sum'];
            if ($orders->save())
            {
                $this->saveOrderItems($session['cart'], $orders->id);
                Yii::$app->session->setFlash('success', "Your order accepted! Our manager will contact you.");
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }
            else {
                Yii::$app->session->setFlash('error', 'There is an erroe while making order');
            }
        }
        return $this->render('view', compact('session', 'orders'));
    }

    protected function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item)
        {
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['price'] * $item['qty'];
            $order_items->save();
        }
    }
}