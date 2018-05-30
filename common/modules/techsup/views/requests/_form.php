<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\techsup\models\Requests;

/* @var $this yii\web\View */
/* @var $model common\modules\techsup\models\Requests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '+7 (999) 999 99 99',
        'options' => [
            'class' => 'form-control',
            'placeholder' => 'Необязательно',
        ]
    ]) ?>

    <?= $form->field($model, 'category')->dropDownList(Requests::getCategoryList()) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $terms ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
