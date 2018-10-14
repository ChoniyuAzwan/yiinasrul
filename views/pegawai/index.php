<?php

use yii\helpers\Html;
use yii\grid\GridView;
// tambahan namespace yang dibutuhkan
// panggil namespace yang dibutuhkan
use app\models\Agama;
use app\models\Divisi;
use app\models\Jabatan;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Input Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nip',
            'nama',
            'gender',
            [
                'attribute' => 'idagama',
                'value' => 'relAgama.nama',
                'filter' => ArrayHelper::Map(Agama::find()->all(), 'id', 'nama')

            ],
            [
                'attribute' => 'iddivisi',
                'value' => 'relDivisi.nama',
                'filter' => ArrayHelper::Map(Divisi::find()->all(), 'id', 'nama')

            ],
            [
                'attribute' => 'idjabatan',
                'value' => 'relJabatan.nama',
                'filter' => ArrayHelper::Map(Agama::find()->all(), 'id', 'nama')

            ],

            // 'idagama',
            // 'iddivisi',
            // 'idjabatan',
            //'tmp_lahir',
            //'tgl_lahir',
            //'alamat:ntext',
            //'telp',
            //'email:email',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
