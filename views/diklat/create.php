<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diklat */

$this->title = 'Input Diklat';
$this->params['breadcrumbs'][] = ['label' => 'Diklat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diklat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
