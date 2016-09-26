<?php

/**
 * This is the model class for table "admin_user".
 *
 * The followings are the available columns in table 'admin_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $created
 * @property integer $updated
 * @property integer $status
 */
class AdminUser extends ActiveRecord
{
	public $role ;

	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 1;

	static $statusArray = array(0=>'禁用',1=>'正常');
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_user';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username','required'),
			array('password','required','on'=>'create'),
			array('username','unique'),
			array('username', 'length', 'max'=>7, 'min'=>2, 'tooLong'=>'用户名请输入长度为2-7个字符', 'tooShort'=>'用户名请输入长度为2-7个字'),
			array('email','email'),
			array('password', 'length', 'max'=>22, 'min'=>6, 'tooLong'=>'密码请输入长度为6-22位字符', 'tooShort'=>'密码请输入长度为6-22位字符'),
			array('created, updated, status', 'numerical', 'integerOnly'=>true),
//			array('username, password, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, created, updated, status', 'safe', 'on'=>'search'),
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
			'username' => '用户名',
			'password' => '密码',
			'email' => 'Email',
			'created' => '创建时间',
			'updated' => '更新时间',
			'status' => '状态',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function behaviors(){
		return array(
			'CTimestampBehavior'=>array(
				'class'=>'zii.behaviors.CTimestampBehavior',
				'createAttribute'=>'created',
				'updateAttribute'=>'updated'
			)
		);
	}

	public function beforeValidate(){
		if($this->getIsNewRecord()){
			$this->created = time();
		}else{
			if($this->created)
				$this->created = strtotime($this->created);
			$this->updated = time();
		}
		return true;
	}

	public function afterValidate(){
		if(!$this->hasErrors()){
			if($this->getIsNewRecord()){
				$this->password = $this->setPassword();
			}else {
				if ($this->password) {
					$this->password = $this->setPassword();
				} else {
					unset($this->password);
				}
			}
			return true;
		}else{
			return false;
		}
	}

	public function setPassword(){
		return password_hash($this->password,PASSWORD_DEFAULT);
	}

	/**
	 * 检测密码
	 * @param $password
	 * @return bool
	 */
	public function validatePassword($password){
		return password_verify($password,$this->password);
	}

	public function scopes()
	{
		return array(
			'normal'=>array(
				'condition'=>'status=1',
			)
		);
	}

	public function afterFind(){
		$this->created = date('Y-m-d H:i:s',$this->created);
	}

}
