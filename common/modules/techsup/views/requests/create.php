<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\techsup\models\Requests */

$this->title = 'Отправить заявку';
$this->params['breadcrumbs'][] = $this->title;

$terms = Html::checkbox('agree', false, [
        'label' => 'Я согласен(-сна) c ' . Html::a(
        'условиями обработки персональных данных', ['requests/terms'], [
                'target' => '_blank',
            ]
        ),
]);
?>
<div class="requests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'terms' => $terms,
    ]) ?>

</div>
