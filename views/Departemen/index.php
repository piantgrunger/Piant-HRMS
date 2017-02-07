<?php


use yii\helpers\Html;
use kartik\grid\GridView;
 use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'],
            'kode_Divisi',
            'nama_Divisi',
    
            'kode_departemen',
            'nama_departemen',
            'ket:ntext',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn'],];
echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartemenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Departemen');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departemen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Departemen  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,      
        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,
    ]); ?>
</div>
