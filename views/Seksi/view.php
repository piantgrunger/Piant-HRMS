<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seksi */

$this->title = $model->kode_seksi;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Seksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_seksi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_seksi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus item ini??',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_Divisi',
            'nama_Divisi',
            'kode_Departemen',
            'nama_Departemen',
            'kode_seksi',
            'nama_seksi',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
