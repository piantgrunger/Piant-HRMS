<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;



?>



    <?= $form->field($model, 'kode_karyawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_karyawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_karyawan')->widget(FileInput::classname(), [
    'options' => ['multiple' => FALSE,
                  'accept' => 'image/*'],
    'pluginOptions' => ['previewFileType' => 'any']
]); ?>

    <?= $form->field($model, 'alamat_karyawan')->textarea(['rows' => 6]) ?>



