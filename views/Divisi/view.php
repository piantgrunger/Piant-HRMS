<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Divisi */

$this->title = $model->kode_divisi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Divisi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="divisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_divisi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_divisi], [
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
            'kode_divisi',
            'nama_divisi',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
