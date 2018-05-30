<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\modules\techsup\models\Requests;

/* @var $this yii\web\View */
/* @var $model common\modules\techsup\models\Requests */

$this->title = $model->title;
if ($model->status_id == 0) {
    $this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Архив', 'url' => ['archive']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить заявку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            [
                'attribute' => 'phone',
                'label' => Requests::attributeLabels()["phone"],
                'visible' => Requests::isPhoneExist($model->phone),
            ],
            [
                'attribute' => 'category',
                'label' => Requests::attributeLabels()["category"],
                'value' => Requests::getCategoryList()[$model->category],
            ],
            'title',
            'description:ntext',
            'date_create:datetime',
            [
                'attribute' => 'date_end',
                'format' => 'datetime',
                'label' => Requests::attributeLabels()["date_end"],
                'visible' => $model->status_id,
            ],
            [
                'attribute' => 'status_id',
                'label' => Requests::attributeLabels()["status_id"],
                'value' => Requests::getStatusList()[$model->status_id],
            ],
        ],
    ]) ?>

</div>
