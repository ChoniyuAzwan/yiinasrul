<?php

use yii\helpers\Html;
use yii\grid\GridView;
// tambahan namespace yang dibutuhkan
// panggil namespace yang dibutuhkan
use app\models\Pegawai;
use app\models\Materi;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiklatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diklat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diklat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Input Diklat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'idpegawai',
                'value' => 'relPegawai.nama',
                'filter' => ArrayHelper::Map(Pegawai::find()->all(), 'id', 'nama')
            ],
            [
                'attribute' => 'idmateri',
                'value' => 'relMateri.nama',
                'filter' => ArrayHelper::Map(Materi::find()->all(), 'id', 'nama')
            ],

            // 'idpegawai',
            // 'idmateri',
            'tempat:ntext',
            'tgl_mulai',
            //'tgl_akhir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
