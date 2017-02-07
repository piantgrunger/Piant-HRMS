<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DivisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$gridColumns = [   ['class' => 'yii\grid\SerialColumn'],

            'kode_divisi',
            'nama_divisi',
            'ket:ntext',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
];
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);

$this->title = Yii::t('app', 'Daftar Divisi');
$this->params['breadcrumbs'][] = $this->title;




?>
<div class="divisi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Divisi  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,
         'columns' => $gridColumns,
      
        
         
            
            
       
      
    ]); ?>
    <?php Pjax::end(); ?>
</div>
