<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seksi */

$this->title = 'Update Seksi: ' . $model->kode_seksi;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Seksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_seksi, 'url' => ['view', 'id' => $model->id_seksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataBrowse'=>$dataBrowse,

    ]) ?>

</div>
