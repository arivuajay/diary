<?php

/**
 * This is the model class for table "{{student_diary_class}}".
 *
 * The followings are the available columns in table '{{student_diary_class}}':
 * @property string $class_id
 * @property string $user_id
 * @property string $class_name
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property StudentDiary[] $studentDiaries
 * @property Users $user
 * @property StudentDiarySubject[] $studentDiarySubjects
 */
class StudentDiaryClass extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{student_diary_class}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_name', 'required'),
			array('user_id', 'length', 'max'=>20),
			array('class_name', 'length', 'max'=>250),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('class_id, user_id, class_name, created, modified', 'safe', 'on'=>'search'),
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
			'studentDiaries' => array(self::HAS_MANY, 'StudentDiary', 'diary_class_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'studentDiarySubjects' => array(self::HAS_MANY, 'StudentDiarySubject', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'class_id' => 'Class',
			'user_id' => 'User',
			'class_name' => 'Class Name',
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

		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('class_name',$this->class_name,true);
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
	 * @return StudentDiaryClass the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
