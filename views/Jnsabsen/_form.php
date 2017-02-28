<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\jnsabsen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jnsabsen-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode_jns_absen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jns_absen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'potong_premi_hadir')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'potong_gaji')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hadir')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
