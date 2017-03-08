<?php
use kartik\datecontrol\DateControl;
?>

    <?= $form->field($model, 'telp_karyawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Lahir...'
        ],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

    <?= $form->field($model, 'stat_nikah')->dropDownList([ 'Menikah' => 'Menikah', 'Belum Menikah' => 'Belum Menikah', 'Janda' => 'Janda', 'Duda' => 'Duda', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Kristen Katolik' => 'Kristen Katolik', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghocu' => 'Konghocu', ], ['prompt' => '']) ?>


