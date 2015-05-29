<?php

/**
 * This is the model class for table "{{student_diary_subject}}".
 *
 * The followings are the available columns in table '{{student_diary_subject}}':
 * @property string $subject_id
 * @property string $user_id
 * @property string $class_id
 * @property string $subject_name
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property StudentDiary[] $studentDiaries
 * @property StudentDiaryClass $class
 * @property Users $user
 */
class StudentDiarySubject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{student_diary_subject}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, class_id, subject_name', 'required'),
			array('user_id, class_id', 'length', 'max'=>20),
			array('subject_name', 'length', 'max'=>250),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('subject_id, user_id, class_id, subject_name, created, modified', 'safe', 'on'=>'search'),
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
			'studentDiaries' => array(self::HAS_MANY, 'StudentDiary', 'diary_subject_id'),
			'class' => array(self::BELONGS_TO, 'StudentDiaryClass', 'class_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subject_id' => 'Subject',
			'user_id' => 'User',
			'class_id' => 'Class',
			'subject_name' => 'Subject Name',
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

		$criteria->compare('subject_id',$this->subject_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('subject_name',$this->subject_name,true);
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
	 * @return StudentDiarySubject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
