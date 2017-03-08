<?php
use kartik\datecontrol\DateControl;

?>
   <?= $form->field($model, 'tgl_masuk')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Masuk Kerja...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

    <?= $form->field($model, 'tgl_efektif')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Efektif Kerja...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

  
    <?= $form->field($model, 'stat_karyawan')->dropDownList([ 'Tetap' => 'Tetap', 'Kontrak' => 'Kontrak', 'Percobaan' => 'Percobaan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'stat_kerja')->dropDownList([ 'Harian' => 'Harian', 'Bulanan' => 'Bulanan', 'Borongan' => 'Borongan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'stat_wna')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_divisi')->textInput() ?>

    <?= $form->field($model, 'id_departemen')->textInput() ?>

    <?= $form->field($model, 'id_seksi')->textInput() ?>

    <?= $form->field($model, 'id_jabatan')->textInput() ?>

    <?= $form->field($model, 'stat_serikat_pegawai')->dropDownList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>
