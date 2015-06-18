<?php

/**
 * This is the model class for table "{{todolist}}".
 *
 * The followings are the available columns in table '{{todolist}}':
 * @property string $id
 * @property string $message
 * @property string $reminder_time
 * @property string $status
 * @property string $remind_me
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Todolist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{todolist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message, reminder_time', 'required'),
			array('message', 'length', 'max'=>128),
			array('status', 'length', 'max'=>1),
			array('remind_me', 'length', 'max'=>1),
			array('user_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, message, reminder_time, status, remind_me, user_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'message' => 'Message',
			'reminder_time' => 'Reminder Time',
			'status' => 'Status',
			'remind_me' => 'Remind Me',
			'user_id' => 'User',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('reminder_time',$this->reminder_time,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('remind_me',$this->remind_me,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Todolist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
