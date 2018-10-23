<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gaji */

$this->title = $model->relPegawai->nama;
$this->params['breadcrumbs'][] = ['label' => 'Gaji', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gaji-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus item ini ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // panggil relasi data dari model
            'relPegawai.nip',
            'relPegawai.nama',
            // panggil relasi dari relasi pegawai lalu relasi divisi
            'relPegawai.relDivisi.nama',
            // panggil relasi dari relasi pegawai lalu relasi divisi
            'relPegawai.relJabatan.nama',

            // 'id',
            // 'idpegawai',
            'gapok',
            'tunjab',
            'transport',
            'bpjs',
        ],
    ]) ?>

    <?php 
        $total_gaji = $model->gapok + $model->tunjab + $model->transport + $model->bpjs;
    ?>

    <div class="alert alert-info">
        Total Gaji : Rp. <?= number_format($total_gaji, 2, ',', '.'); ?>
    </div>
    
</div>
