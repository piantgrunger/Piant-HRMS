<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seksi */

$this->title = 'Seksi  Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Seksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataBrowse'=>$dataBrowse,

    ]) ?>

</div>
