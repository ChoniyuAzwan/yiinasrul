<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $nip
 * @property string $nama
 * @property string $gender
 * @property int $idagama
 * @property int $iddivisi
 * @property int $idjabatan
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $telp
 * @property string $email
 * @property string $foto
 *
 * @property Diklat[] $diklats
 * @property Gaji[] $gajis
 * @property Agama $agama
 * @property Divisi $divisi
 * @property Jabatan $jabatan
 */
class Pegawai extends \yii\db\ActiveRecord
{
    // buat var untuk menyimpan fisik file foto
    public $fotoFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'gender', 'idagama', 'iddivisi', 'idjabatan', 'tmp_lahir', 'tgl_lahir'], 'required'],
            [['gender', 'alamat'], 'string'],
            [['idagama', 'iddivisi', 'idjabatan'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['nip'], 'string', 'max' => 18],
            [['nama'], 'string', 'max' => 20],
            [['tmp_lahir', 'email', 'foto'], 'string', 'max' => 45],
            [['telp'], 'string', 'max' => 15],
            [['nip'], 'unique'],
            [['idagama'], 'exist', 'skipOnError' => true, 'targetClass' => Agama::className(), 'targetAttribute' => ['idagama' => 'id']],
            [['iddivisi'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['iddivisi' => 'id']],
            [['idjabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['idjabatan' => 'id']],

            // tambahan rules
            [['email'], 'email'], // harus berformat email (budi@gmail.com)
            [['fotofile'], 'file',
                'skipOnEmpty' => true,
                'extensions' => ['png', 'jpg', 'gif', 'jpeg'],
                'maxSize' => 2048000, // max 2000 KB
                'minSize' => 102400, // min 100 KB

            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'NIP',
            'nama' => 'Pegawai',
            'gender' => 'Jenis Kelamin',
            'idagama' => 'Agama',
            'iddivisi' => 'Departemen',
            'idjabatan' => 'Jabatan',
            'tmp_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'telp' => 'Telepon/HP',
            'email' => 'Email',
            'foto' => 'Foto',
            'fotofile' => 'File Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelDiklats()
    {
        return $this->hasMany(Diklat::className(), ['idpegawai' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelGajis()
    {
        return $this->hasOne(Gaji::className(), ['idpegawai' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelAgama()
    {
        return $this->hasOne(Agama::className(), ['id' => 'idagama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelDivisi()
    {
        return $this->hasOne(Divisi::className(), ['id' => 'iddivisi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'idjabatan']);
    }
}
