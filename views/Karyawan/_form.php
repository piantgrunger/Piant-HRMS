<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
        
     <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Data Karyawan',
                'content' => $this->render('_form_data', ['model' => $model, 'form' => $form]),
                'active' => true
            ],
              [
                'label' => ' Biodata Karyawan ',
                'content' => $this->render('_form_biodata', ['model' => $model, 'form' => $form]),
            ],
            [
                'label' => 'Data Organisasi',
                'content' => $this->render('_form_organisasi', ['model' => $model, 'form' => $form]),
            ],
        ]]);
 ?>   
        
 
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
