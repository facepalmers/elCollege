<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\behaviors\TimeStampBehavior;

/* @var $this yii\web\View */
/* @var $model common\modules\techsup\models\Requests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'category')->dropDownList(['Первая категория', 'Вторая категория']) //сделать константы ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
