<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Review */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\ReviewType;
use yii\helpers\Url;

$this->title = 'Добавить отзыв';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['reviews']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-review">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('reviewFormSubmitted')): ?>

        <div class="alert alert-success">
            Ваше обращение сохранено
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'review-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Необязательно']); ?>
                    <?= $form->field($model, 'type_id')->radioList(ReviewType::getList()); ?>
                    <?= $form->field($model, 'text')->textarea(); ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'review-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
