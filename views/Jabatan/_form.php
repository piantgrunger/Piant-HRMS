<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Jabatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jabatan-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

   
  <?= $form->field($model, 'parent_id')->label('Atasan')->widget(Select2::classname(), [
    'data' => $dataBrowse,
    'options' => ['placeholder' => 'Pilih Parent Jabatan ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>


    <?= $form->field($model, 'kode_jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
