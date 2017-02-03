<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Departemen */

$this->title = $model->kode_departemen;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Departemen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departemen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_departemen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_departemen], [
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
            'id_divisi',
            'kode_departemen',
            'nama_departemen',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
