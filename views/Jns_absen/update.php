<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jns_absen */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jns Absen',
]) . $model->kode_jns_absen;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jns Absen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_jns_absen, 'url' => ['view', 'id' => $model->id_jns_absen]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jns-absen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
