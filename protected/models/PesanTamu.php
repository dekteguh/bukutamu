<?php

/**
 * This is the model class for table "pesan_tamu".
 *
 * The followings are the available columns in table 'pesan_tamu':
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property string $alamat
 * @property string $pesan
 * @property string $create_time
 * @property string $update_time
 * @property string $user_IP
 */
class PesanTamu extends CActiveRecord
{
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pesan_tamu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, email, pesan, user_IP', 'required'),
			array('nama, email', 'length', 'max'=>50),
			array('alamat', 'length', 'max'=>100),
			array('email','email','message'=>'Email tidak valid!'),
			array('user_IP', 'length', 'max'=>20),
			array('create_time, update_time', 'safe'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, email, alamat, pesan, create_time, update_time, user_IP', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'email' => 'Email',
			'alamat' => 'Alamat',
			'pesan' => 'Pesan',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'user_IP' => 'User Ip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('pesan',$this->pesan,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('user_IP',$this->user_IP,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PesanTamu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeValidate(){
		// bila record baru
		if($this->isNewRecord){
			// dapatkan ip
			$this->user_IP = Yii::app()->request->userHostAddress;
		}
		return parent::beforeValidate();
	}

	public function behaviors(){
		return array(
			'CTimestampBehavior'=> array(
				'class'=>'zii.behaviors.CTimestampBehavior',
				'createAttribute'=>'create_time',
				'updateAttribute'=>'update_time',
				)
			);
	}

	public function actions(){
		return array(
			// ada keluar gambarnya ntar
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				),
			);
	}
}
