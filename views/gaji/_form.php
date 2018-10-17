<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// panggil namespace yang dibutuhkan
use app\models\Pegawai;
use yii\helpers\ArrayHelper; // untuk menggunakan data array

/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gaji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'idpegawai')->textInput()
    // ambil data pegawai
        // $ar_pegawai = ArrayHelper::map(Pegawai::find()->asArray()->All(), 'id', 'nip', 'nama', 'gender', 'idagama', 'iddivisi', 'idjabatan', 'tmp_lahir', 'tgl_lahir', 'alamat', 'telp', 'email', 'foto');
        $ar_pegawai = ArrayHelper::map(Pegawai::find()->asArray()->All(), 'id', 'nip');
    ?>

    <?= $form->field($model, 'idpegawai')->dropDownList($ar_pegawai, ['prompt' => '-- Pilih Pegawai --']) ?>

    <?= $form->field($model, 'gapok')->textInput() ?>

    <?= $form->field($model, 'tunjab')->textInput() ?>

    <?= $form->field($model, 'transport')->textInput() ?>

    <?= $form->field($model, 'bpjs')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
