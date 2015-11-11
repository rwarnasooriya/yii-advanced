<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Category;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'itemname')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'categoryID')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Category::find()->all(),'id','name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
