<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departemen */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Departemen',
]) . $model->kode_departemen;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Departemen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_departemen, 'url' => ['view', 'id' => $model->id_departemen]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="departemen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataBrowse'=>$dataBrowse,
    ]) ?>

</div>
