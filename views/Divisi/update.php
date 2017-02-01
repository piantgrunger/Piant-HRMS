<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Divisi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Divisi',
]) . $model->kode_divisi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Divisi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_divisi, 'url' => ['view', 'id' => $model->id_divisi]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="divisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
