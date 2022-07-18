<?php

namespace app\controllers;

use app\models\MasterClass;
use app\models\Master_classSearch;
use app\models\MasterClassIncludes;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * Master_classController implements the CRUD actions for MasterClass model.
 */
class Master_classController extends Controller
{


    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->admin==1){
            return true;
        }else{
            $this->redirect(['/site/login/']);
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MasterClass models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Master_classSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterClass model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MasterClass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterClass();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                //Сохранение фото
                $model->photo = UploadedFile::getInstance($model, 'photo');
                $newFilename = md5($model->photo->baseName.time()).'.'.$model->photo->extension;
                $model->photo->saveAs('uploads/'.$newFilename);
                $model->photo = $newFilename;

                $model->save();
                //Запись в связанную таблицу что входит в мастер класс
                foreach ($model->include_text as $include) {
                    $master_class_includes = new MasterClassIncludes();
                    //TODO Удалить поле id_include
                    $master_class_includes->id_include = $model->id;
                    $master_class_includes->id_master_class = $model->id;
                    $master_class_includes->include_description = $include;
                    $master_class_includes->save(false);
                }

                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterClass model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) ) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $newFilename = md5($model->photo->baseName.time()).'.'.$model->photo->extension;
            $model->photo->saveAs('uploads/'.$newFilename);
            $model->photo = $newFilename;
            $model->save();
            //Удаление в связанной таблице что входит в мастер классы
            MasterClassIncludes::deleteAll(['id_master_class'=>$model->id]);
            //Запись в связанную таблицу что входит в мастер классы
            foreach ($model->include_text as $include) {
                $master_class_includes = new MasterClassIncludes();
                $master_class_includes->id_include = $model->id;
                $master_class_includes->id_master_class = $model->id;
                $master_class_includes->include_description = $include;
                $master_class_includes->save(false);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterClass model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterClass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MasterClass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterClass::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
