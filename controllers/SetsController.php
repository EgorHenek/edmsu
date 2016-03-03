<?php

namespace app\controllers;

use Yii;
use app\models\Sets;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use vova07\imperavi\actions\GetAction;
use yii\data\Pagination;
use app\models\Tags;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * SetsController implements the CRUD actions for Sets model.
 */
class SetsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => TRUE,
                        'actions' => ['create', 'update', 'delete'],
                        'roles' => ['@'],
                    ]
                ]
            ],
        ];
    }
    
    /**
     * Actions
     * @return type
     */
    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => 'http://edm.su/set/logo',
                'path' => '@app/web/set/logo',
                'type' => GetAction::TYPE_IMAGES,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => 'http://edm.su/set/logo',
                'path' => '@app/web/set/logo',
            ],
        ];
    }

    /**
     * Lists all Sets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Sets::find()->orderBy(['id' => SORT_DESC]);
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $sets = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        
        return $this->render('index', [
            'sets' => $sets,
            'pagination' => $pagination,
        ]);

    }

    /**
     * Displays a single Sets model.
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
     * Creates a new Sets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sets();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model, 'mp3_file');
            $uploaded = $file->saveAs(Yii::getAlias('@webroot').'/uploads/'.$file->baseName.'.'.$file->extension);
            Yii::$app->db->close();
            $mixcloud = Yii::$app->mixcloud->upload('uploads/'.$file->baseName.'.'.$file->extension, $model->title, $params = ['images' => $model->icon], $tags = explode(',', $model->tagNames));
            Yii::$app->db->open();
            $model->mixcloud = $mixcloud['result']['key'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->date_create = date("Y-m-d");
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sets model.
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
     * Displays tags
     * @param string $query
     * @return type
     */
    public function actionTags($query)
    {
        $models = Tags::find($query)->orderBy('name')->all();
        $items = [];
        
        foreach ($models as $model) {
            $items[] = ['name' => $model->name];
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        return $items;
    }

    /**
     * Finds the Sets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
