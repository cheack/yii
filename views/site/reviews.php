<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $reviews app\models\Review[] */
/* @var $pages Pagination */

use app\models\ReviewType;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="btn-group" role="group">
                <?php foreach (ReviewType::getList() as $type_id => $name): ?>
                    <a type="button" href="<?= Url::to(['', 'type' => $type_id]); ?>" class="btn btn-default <?= $type_id == $type ? 'active' : ''; ?>"><?= $name; ?></a>
                <?php endforeach; ?>
            </div>
            <?= BaseHtml::a('Добавить отзыв', Url::to('add-review'), ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Текст</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?= $review->name ?: 'Не указано'; ?></td>
                        <td><?= $review->text; ?></td>
                        <td><?= Yii::$app->formatter->asDatetime($review->created_at, "d.MM.Y H:i"); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
    </div>

</div>
