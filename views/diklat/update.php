<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diklat */

$this->title = 'Ubah Diklat '.$model->relPegawai->nama;
$this->params['breadcrumbs'][] = ['label' => 'Diklat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->relPegawai->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="diklat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
