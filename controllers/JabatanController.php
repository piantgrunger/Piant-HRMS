<?php

namespace app\controllers;

use Yii;
use app\models\Jabatan;
use app\models\JabatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * JabatanController implements the CRUD actions for Jabatan model.
 */
class JabatanController extends Controller
{
    /**
     * @inheritdoc
     */
     public function getDataBrowseJabatan()
    {        
     return ArrayHelper::map(
                                Jabatan::find()
                                        ->select([
                                                'id_jabatan','ket_jabatan' => 'CONCAT(kode_jabatan," - ",nama_jabatan)'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_jabatan', 'ket_jabatan');
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jabatan models.
     * @return mixed
     */
  

    public function actionIndex($parent_id=0)
    {
        $searchModel = new JabatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$parent_id);
        $Model = new Jabatan();
        $dataTree = $Model->find()->orderBy('parent_id');
        
        


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataTree' => $dataTree,
        ]);
    }
  /**
     * Displays a single Jabatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jabatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         $dataBrowse = $this->getDataBrowseJabatan();
        $model = new Jabatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_jabatan]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dataBrowse' => $dataBrowse ,


            ]);
        }
    }

    /**
     * Updates an existing Jabatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $dataBrowse = $this->getDataBrowseJabatan();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_jabatan]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'dataBrowse' => $dataBrowse ,
            ]);
        }
    }

    /**
     * Deletes an existing Jabatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jabatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jabatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jabatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
