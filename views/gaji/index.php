<?php

use yii\helpers\Html;
use yii\grid\GridView;
// tambahan namespace yang dibutuhkan
// panggil namespace yang dibutuhkan
use app\models\Pegawai;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $searchModel app\models\GajiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gaji';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gaji-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Input Gaji', ['create'], ['class' => 'btn btn-success']) ?>
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
          
            // 'idpegawai',
            'gapok',
            'tunjab',
            'transport',
            'bpjs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
