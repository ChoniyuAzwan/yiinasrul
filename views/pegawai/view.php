<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

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

<div class="row">
    <div class="col-md-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nip',
                'nama',
                'gender',
                // panggil relasi data dari model
                'relAgama.nama',
                'relDivisi.nama',
                'relJabatan.nama',
                // 'idagama',
                // 'iddivisi',
                // 'idjabatan',
                'tmp_lahir',
                'tgl_lahir',
                'alamat:ntext',
                'telp',
                'email:email',
                'foto',
            ],
        ]) ?>
    </div>

    <div class="col-md-4">
        <?php 
            if(!empty($model->foto)) {
        ?>
                <img src="<?= yii::$app->request->baseurl; ?>/images/<?= $model->foto; ?>" width="80%">
        <?php  
            } else {   
        ?>
                <img src="<?= yii::$app->request->baseurl; ?>/images/nophoto.png" width="80%">
        <?php 
            }
        ?>        
    </div>
</div>

</div>
