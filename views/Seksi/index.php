<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SeksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Seksi';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_Divisi',
            'nama_Divisi',
        
            'kode_Departemen',
            'nama_Departemen',
            'kode_seksi',
            'nama_seksi',
            'ket:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ];
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);

        
?>
<div class="seksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Seksi  Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'responsive'=>true,
        'hover'=>true,
        'resizableColumns'=>true,
    ]); ?>
    <?php Pjax::end(); ?>
</div>
