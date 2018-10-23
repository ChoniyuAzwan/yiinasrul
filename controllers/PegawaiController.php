<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\PegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// tambahan
use yii\web\UploadedFile;


/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all Pegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pegawai model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Pegawai();
        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //menambahkan method u/ upload dokumen
            $model->fotoFile = UploadedFile::getInstance($model,'fotoFile');
            //cek apakah ada file yg diupload / tidak, dan lolos validasi
            if($model->validate() && !empty($model->fotoFile)){
                //$nama = $model->nip.'.jpg';
                //$nama = $model->fotoFile->baseName.'.'.$model->fotoFile->extension;
                $nama = $model->nip.'.'.$model->fotoFile->extension;
                $model->foto = $nama; //menyimpan nama file
                $model->save(); //data lain juga simpan ke db
                //simpan fisik foto di folder images
                $model->fotoFile->saveAs('images/'.$nama);
            }else{
                $model->save();//simpan data tanpa foto
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //menambahkan method u/ upload dokumen
            $model->fotoFile = UploadedFile::getInstance($model,'fotoFile');
            //cek apakah ada file yg diupload / tidak, dan lolos validasi
            if($model->validate() && !empty($model->fotoFile)){
                //$nama = $model->nip.'.jpg';
                //$nama = $model->fotoFile->baseName.'.'.$model->fotoFile->extension;
                $nama = $model->nip.'.'.$model->fotoFile->extension;
                $model->foto = $nama; //menyimpan nama file
                $model->save(); //data lain juga simpan ke db
                //simpan fisik foto di folder images
                $model->fotoFile->saveAs('images/'.$nama);
            }else{
                $model->save();//simpan data tanpa foto
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
        
    }

    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pegawai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
