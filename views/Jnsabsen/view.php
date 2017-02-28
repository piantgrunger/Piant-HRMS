<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\jnsabsen */

$this->title = $model->kode_jns_absen;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jns Absen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jnsabsen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_jns_absen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_jns_absen], [
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
            'kode_jns_absen',
            'nama_jns_absen',
            'potong_premi_hadir',
            'potong_gaji',
            'hadir',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
