<?php

/**
 * This is the model class for table "{{mood_report}}".
 *
 * The followings are the available columns in table '{{mood_report}}':
 * @property string $mood_report_id
 * @property string $mood_report_user_id
 * @property string $mood_report_diary_id
 * @property string $mood_report_advice_from
 * @property string $mood_report_user_name
 * @property string $mood_report_user_email
 * @property string $mood_report_user_phone
 * @property string $mood_report_do_you_want_to_call
 * @property string $mood_report_time_to_call
 * @property string $mood_report_can_doc_call_now
 * @property string $mood_report_status
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Diary $moodReportDiary
 * @property Users $moodReportUser
 */
class MoodReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mood_report}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mood_report_user_id, mood_report_diary_id, mood_report_user_name, mood_report_user_email, mood_report_user_phone', 'required'),
			array('mood_report_user_id, mood_report_diary_id', 'length', 'max'=>20),
			array('mood_report_advice_from', 'length', 'max'=>12),
			array('mood_report_user_name, mood_report_user_email, mood_report_time_to_call', 'length', 'max'=>250),
			array('mood_report_user_phone', 'length', 'max'=>50),
			array('mood_report_do_you_want_to_call, mood_report_can_doc_call_now', 'length', 'max'=>3),
			array('mood_report_status', 'length', 'max'=>1),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mood_report_id, mood_report_user_id, mood_report_diary_id, mood_report_advice_from, mood_report_user_name, mood_report_user_email, mood_report_user_phone, mood_report_do_you_want_to_call, mood_report_time_to_call, mood_report_can_doc_call_now, mood_report_status, created, modified', 'safe', 'on'=>'search'),
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
			'moodReportDiary' => array(self::BELONGS_TO, 'Diary', 'mood_report_diary_id'),
			'moodReportUser' => array(self::BELONGS_TO, 'Users', 'mood_report_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mood_report_id' => 'Mood Report',
			'mood_report_user_id' => 'Mood Report User',
			'mood_report_diary_id' => 'Mood Report Diary',
			'mood_report_advice_from' => 'Mood Report Advice From',
			'mood_report_user_name' => 'Mood Report User Name',
			'mood_report_user_email' => 'Mood Report User Email',
			'mood_report_user_phone' => 'Mood Report User Phone',
			'mood_report_do_you_want_to_call' => 'Mood Report Do You Want To Call',
			'mood_report_time_to_call' => 'Mood Report Time To Call',
			'mood_report_can_doc_call_now' => 'Mood Report Can Doc Call Now',
			'mood_report_status' => 'Mood Report Status',
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

		$criteria->compare('mood_report_id',$this->mood_report_id,true);
		$criteria->compare('mood_report_user_id',$this->mood_report_user_id,true);
		$criteria->compare('mood_report_diary_id',$this->mood_report_diary_id,true);
		$criteria->compare('mood_report_advice_from',$this->mood_report_advice_from,true);
		$criteria->compare('mood_report_user_name',$this->mood_report_user_name,true);
		$criteria->compare('mood_report_user_email',$this->mood_report_user_email,true);
		$criteria->compare('mood_report_user_phone',$this->mood_report_user_phone,true);
		$criteria->compare('mood_report_do_you_want_to_call',$this->mood_report_do_you_want_to_call,true);
		$criteria->compare('mood_report_time_to_call',$this->mood_report_time_to_call,true);
		$criteria->compare('mood_report_can_doc_call_now',$this->mood_report_can_doc_call_now,true);
		$criteria->compare('mood_report_status',$this->mood_report_status,true);
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
	 * @return MoodReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
