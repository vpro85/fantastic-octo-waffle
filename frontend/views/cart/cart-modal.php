<?php use yii\helpers\Html;

if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
            <tr>
                <td><?= Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'height' => 50]); ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Total quantity:</td>
                <td><?= $session['cart.qty'] ?></td>
            </tr>
            <tr>
                <td colspan="4">Total sum:</td>
                <td><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h2>Your Cart is empty!</h2>
<?php endif; ?>
