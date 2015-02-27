<?php

/**
 * This is the model class for table "{{notification_log}}".
 *
 * The followings are the available columns in table '{{notification_log}}':
 * @property integer $log_id
 * @property integer $log_user_id
 * @property integer $log_notification_id
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Notification $logNotification
 */
class NotificationLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{notification_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_user_id, log_notification_id', 'required'),
			array('log_user_id, log_notification_id', 'numerical', 'integerOnly'=>true),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('log_id, log_user_id, log_notification_id, created, modified', 'safe', 'on'=>'search'),
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
			'logNotification' => array(self::BELONGS_TO, 'Notification', 'log_notification_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'log_id' => 'Log',
			'log_user_id' => 'Log User',
			'log_notification_id' => 'Log Notification',
			'created' => 'Created',
			'modified' => 'Modified',
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

		$criteria->compare('log_id',$this->log_id);
		$criteria->compare('log_user_id',$this->log_user_id);
		$criteria->compare('log_notification_id',$this->log_notification_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NotificationLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
