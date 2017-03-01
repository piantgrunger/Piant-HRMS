<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jabatan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jabatan',
]) . $model->kode_jabatan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jabatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_jabatan, 'url' => ['view', 'id' => $model->jabatan_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataBrowse' => $dataBrowse ,

    ]) ?>

</div>
