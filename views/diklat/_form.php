<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// panggil namespace yang dibutuhkan
use app\models\Pegawai;
use app\models\Materi;
use yii\helpers\ArrayHelper; // untuk menggunaan data array

/* @var $this yii\web\View */
/* @var $model app\models\Diklat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diklat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'idpegawai')->textInput() 
        $ar_pegawai = ArrayHelper::map(Pegawai::find()->asArray()->All(), 'id', 'nama');
    ?>

    <?= $form->field($model, 'idpegawai')->dropDownList($ar_pegawai, ['prompt' => '-- Pilih Pegawai --']) ?>

    <?php // echo $form->field($model, 'idmateri')->textInput()
        $ar_materi = ArrayHelper::map(Materi::find()->asArray()->All(), 'id', 'nama');
    ?>

    <?= $form->field($model, 'idmateri')->dropDownList($ar_materi, ['prompt' => '-- Pilih Materi --']) ?>

    <?= $form->field($model, 'tempat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tgl_mulai')->textInput() ?>

    <?= $form->field($model, 'tgl_akhir')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
