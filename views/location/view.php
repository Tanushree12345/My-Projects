<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\houselocation */

$this->title = $model->location_id;
$this->params['breadcrumbs'][] = ['label' => 'Houselocations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="houselocation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'location_id' => $model->location_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'location_id' => $model->location_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'location_id',
            'locality',
            'city',
            'state',
            'pin',
        ],
    ]) ?>

</div>
