<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use app\widgets\TreeImage;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            //'parent',
          //  'lvl',
            'kode_jabatan',
            'nama_jabatan',
                 'ket', 
    
            // 'icon',
            // 'icon_type',
            // 'active',
            // 'selected',
            // 'disabled',
            // 'readonly',
            // 'visible',
            // 'collapsed',
            // 'movable_u',
            // 'movable_d',
            // 'movable_l',
            // 'movable_r',
            // 'removable',
            // 'removable_all',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn'],]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\JabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Jabatan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Jabatan  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="row">
    <div class ="col-sm-4">
    <?=TreeImage::widget([
    'query'     => $dataTree,
    'root'      => 'Root',                                //default parent
    'icon'      => 'user',                                  //default user
    'iconRoot'  => 'tree-conifer',                          //default tree-conifer
    'nameFieldname'=>'nama_jabatan',
    'idFieldname' =>'id_jabatan'    
]); ?>
    </div> <div class ="col-sm-8">
      <?=      GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,    
    ]); ?>
        </div>
    <?php Pjax::end(); ?>
    </div>
</div>
