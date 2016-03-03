<?php

namespace app\controllers;

use Yii;
use app\models\Blogs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use vova07\imperavi\actions\GetAction;
use \app\models\Tags;
use app\models\NewsViews;

/**
 * BlogsController implements the CRUD actions for Blogs model.
 */
class BlogsController extends Controller
{
    /**
     * 
     * @return type
     */
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
     * 
     * @return type
     */
    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => 'http://edm.su/images',
                'path' => '@app/web/images',
                'type' => GetAction::TYPE_IMAGES,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => 'http://edm.su/images',
                'path' => '@app/web/images',
            ],
        ];
    }

    /**
     * Displays a single Blogs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($url)
    {
        $model = $this->findModel($url);
        if (($view = NewsViews::findOne(['news_id' => $model->id, 'ip' => ip2long(Yii::$app->request->userIP)])) == NULL) {
            $view = new NewsViews();
            $view->news_id = $model->id;
            $view->ip = ip2long(Yii::$app->request->userIP);
            $view->save();
        }else{
            $view->save();
        }
        if ($model->type===Blogs::TYPE_REDIRECT){
            $this->redirect($model->source_url);
        }else{
            $keys = '';
            foreach($model->getTags()->all() as $tag)
            {
                $tags[] = $tag;
            }
            foreach ($tags as $tag)
            {
                $keys = $tag->name.', '.$keys;
            }
            return $this->render('view', [
                'model' => $model,
                'tags' => $tags,
                'keys' => $keys,
            ]);
        }
    }

    /**
     * Creates a new Blogs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blogs();
        $model->type = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'url' => $model->url]);
        } else {
            $model->datetime_publish = date("Y-m-d H:i:s");
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Blogs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($url)
    {
        $model = $this->findModel($url);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'url' => $model->url]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Blogs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($url)
    {
        $this->findModel($url)->delete();

        return $this->home();
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
     * Finds the Blogs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blogs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($url)
    {
        if (($model = Blogs::findOne(['url' => $url])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
