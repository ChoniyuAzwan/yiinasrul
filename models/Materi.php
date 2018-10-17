<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materi".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Diklat[] $diklats
 */
class Materi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiklats()
    {
        return $this->hasMany(Diklat::className(), ['idmateri' => 'id']);
    }
}
