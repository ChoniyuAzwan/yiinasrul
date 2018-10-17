<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\bootstrap\ActiveForm
// panggil namespace yang dibutuhkan
use app\models\Agama;
use app\models\Divisi;
use app\models\Jabatan;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'gender')->radioList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>

        <?php // $form->field($model, 'idagama')->textInput() 
        // ambil data agama
            $ar_agama = ArrayHelper::map(Agama::find()->asArray()->All(), 'id', 'nama');
        ?>

        <?= $form->field($model, 'idagama')->dropDownList($ar_agama, ['prompt' => '-- Pilih Agama --']) ?>

        <?php // $form->field($model, 'iddivisi')->textInput() 
            $ar_divisi = ArrayHelper::map(Divisi::find()->asArray()->All(), 'id', 'nama');
        ?>

        <?= $form->field($model, 'iddivisi')->dropDownList($ar_divisi, ['prompt' => '-- Pilih Divisi --']) ?>

        <?php // $form->field($model, 'idjabatan')->textInput() 
            $ar_jabatan = ArrayHelper::map(Jabatan::find()->asArray()->All(), 'id', 'nama');
        ?>

        <?= $form->field($model, 'idjabatan')->dropDownList($ar_jabatan, ['prompt' => '-- Pilih Jabatan --']) ?>
    </div>
    
    <div class="col-md-6">
        <?= $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tgl_lahir')->textInput() ?>

        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'fotoFile')->fileInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
