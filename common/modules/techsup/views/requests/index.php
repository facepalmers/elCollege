<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\modules\techsup\models\Requests;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\techsup\models\RequestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Активные заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'id'],
            'name',
            'email:email',
            //'phone',
            ['attribute' => 'category', 'filter' => Requests::getCategoryList(), 'value' => 'categoryName'],
            'title',
            //'description:ntext',
            'date_create',
            //'date_end',
            //'status_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {done}',
                'buttons' => [
                    'done' => function($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['done', 'id' => $model->id]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
