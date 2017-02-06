<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Seksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seksi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_departemen')->widget(Select2::classname(), [
    'data' => $dataBrowse,
    'options' => ['placeholder' => 'Pilih Departemen ...'],
    'pluginOptions' => [
        'allowClear' => true
    ] ,
]);?>

    <?= $form->field($model, 'kode_seksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_seksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
