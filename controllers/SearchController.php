<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sets;
use app\models\Blogs;
use app\models\Tags;
use app\models\SearchForm;
use yii\data\Pagination;

/**
 * Search controller
 */
class SearchController extends Controller
{
    /**
     * 
     * @param type $string
     * @return type
     */
    public function actionIndex($string = NULL) {
        if (Yii::$app->request->get()) {
            $sets_model = Sets::find()->where(['LIKE', 'title', $string])->orderBy(['id' => SORT_DESC]);
            $blogs_model = Blogs::find()->where(['LIKE', 'text', $string])->orderBy(['id' => SORT_DESC]);
            $tags = Tags::find()->where(['LIKE', 'name', $string])->orderBy(['frequency' => SORT_DESC])->all();
            
            $pagination_sets = new Pagination([
                'defaultPageSize' => 8,
                'totalCount' => $sets_model->count(),
            ]);
            $pagination_blogs = new Pagination([
                'defaultPageSize' => 10,
                'totalCount' => $blogs_model->count(),
            ]);
            
            $sets = $sets_model->offset($pagination_sets->offset)->limit($pagination_sets->limit)->all();
            $blogs = $blogs_model->offset($pagination_blogs->offset)->limit($pagination_blogs->limit)->all();
            
            return $this->render('search', [
                'blogs' => $blogs,
                'sets' => $sets,
                'tags' => $tags,
                'pagination_blogs' => $pagination_blogs,
                'pagination_sets' => $pagination_sets,
            ]);
        }else{
            $search = new SearchForm();
            return $this->render('index', [
                'search' => $search,
            ]);
        }
    }
    
    /**
     * 
     * @param type $tag
     * @return type
     * @throws NotFoundHttpException
     */
    public function actionTags($tag) {
        if (($model = Tags::findOne(['name' => $tag])) !== null) {
            $sets_model = $model->getSets()->orderBy(['id' => SORT_DESC]);
            $blogs_model = $model->getBlogs()->orderBy(['id' => SORT_DESC]);
            
            $sets_pagination = new Pagination([
                'defaultPageSize' => 10,
                'totalCount' => $sets_model->count(),
            ]);
            $blogs_pagination = new Pagination([
                'defaultPageSize' => 8,
                'totalCount' => $blogs_model->count(),
            ]);
            
            $sets = $sets_model->offset($sets_pagination->offset)->limit($sets_pagination->limit)->all();
            $blogs = $blogs_model->offset($blogs_pagination->offset)->limit($blogs_pagination->limit)->all();
            
            return $this->render('tags', [
                'model' => $model,
                'sets' => $sets,
                'sets_pagination' => $sets_pagination,
                'blogs' => $blogs,
                'blogs_pagination' => $blogs_pagination,
            ]);
        } else {
             $this->redirect('/site/error');
        }
    }
}