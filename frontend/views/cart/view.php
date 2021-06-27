<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

if(!empty($session['cart'])): ?>
    <div class="table-responsive" id="chkt">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total price</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                    <tr>
                        <td><?= Html::img("{$item['img']}", ['alt' => $item['name'], 'height' => 50]); ?></td>
                        <td><?= Html::a($item['name'], ['product/view', 'id'=>$id]) ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['qty'] * $item['price'] ?></td>
                        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="5">Total quantity:</td>
                        <td><?= $session['cart.qty'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">Total sum:</td>
                        <td><?= $session['cart.sum'] ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
<hr/>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($orders, 'name') ?>
    <?= $form->field($orders, 'email') ?>
    <?= $form->field($orders, 'phone') ?>
    <?= $form->field($orders, 'address') ?>
    <?= Html::submitButton('Order', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>
<?php else: ?>
    <h2>Your Cart is empty</h2>
<?php endif; ?>
