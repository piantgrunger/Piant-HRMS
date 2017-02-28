<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\jnsabsenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jnsabsen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_jns_absen') ?>

    <?= $form->field($model, 'kode_jns_absen') ?>

    <?= $form->field($model, 'nama_jns_absen') ?>

    <?= $form->field($model, 'potong_premi_hadir') ?>

    <?= $form->field($model, 'potong_gaji') ?>

    <?php // echo $form->field($model, 'hadir') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
