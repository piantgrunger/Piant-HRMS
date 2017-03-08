<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */

$this->title = $model->kode_karyawan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Karyawan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_karyawan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_karyawan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_karyawan',
            'nama_karyawan',
          [
    'attribute'=>'foto_karyawan',
    'value'=>  str_replace('web', '', Yii::getAlias('@web'))   .'/uploads/'.$model->foto_karyawan,
    'format' => ['image',['width'=>'100','height'=>'100']],
],
            'alamat_karyawan:ntext',
            'telp_karyawan',
            'no_id',
            'tempat_lahir',
            'tgl_lahir:date',
            'stat_nikah',
            'agama',
            'tgl_masuk:date',
            'tgl_efektif:date',
            'tgl_keluar:date',
            'stat_karyawan',
            'stat_kerja',
            'stat_wna',
            'id_divisi',
            'id_departemen',
            'id_seksi',
            'id_jabatan',
            'stat_serikat_pegawai',
            'ket:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
