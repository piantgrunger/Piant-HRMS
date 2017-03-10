<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'kode_karyawan',
            'nama_karyawan',
             [
        'attribute' => 'foto_karyawan',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img( Yii::getAlias('@web').'/uploads/'. $data['foto_karyawan'],
                ['width' => '70px']);
        },
          ],
            'alamat_karyawan:ntext',
            // 'telp_karyawan',
            // 'no_id',
            // 'tempat_lahir',
            // 'tgl_lahir',
            // 'stat_nikah',
            // 'agama',
            // 'tgl_masuk',
            // 'tgl_efektif',
            // 'tgl_keluar',
            // 'stat_karyawan',
            // 'stat_kerja',
            // 'stat_wna',
            // 'id_divisi',
            // 'id_departemen',
            // 'id_seksi',
            // 'id_jabatan',
            // 'stat_serikat_pegawai',
            // 'ket:ntext',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn'],]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Karyawan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Karyawan  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,    
    ]); ?>
    <?php Pjax::end(); ?>
</div>
