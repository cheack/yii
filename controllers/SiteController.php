<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Review;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReviews($type = 1)
    {
        $query = Review::find()->orderBy('created_at desc')->where('type_id = :type', [':type' => $type ?: 1]);
        $count_query = clone $query;
        $pages = new Pagination(['totalCount' => $count_query->count()]);
        $reviews = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('reviews', [
            'reviews' => $reviews,
            'pages' => $pages,
            'type' => $type
        ]);
    }

    public function actionAddReview()
    {
        $model = new Review();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('reviewFormSubmitted');

            return $this->refresh();
        }
        return $this->render('add_review', [
            'model' => $model,
        ]);
    }

}
