<?php

/**
 * This is the model class for table "{{mood_activity}}".
 *
 * The followings are the available columns in table '{{mood_activity}}':
 * @property integer $mood_activity_id
 * @property string $mood_activity_email
 * @property string $mood_activity_mood_id
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property MoodType $moodActivityMood
 */
class MoodActivity extends CActiveRecord
{
       public $dist_user;
       public $created;
       public $mood_activity_mood_id;
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mood_activity}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mood_activity_email', 'length', 'max'=>256),
			array('mood_activity_mood_id', 'length', 'max'=>20),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mood_activity_id, mood_activity_email, mood_activity_mood_id, created, modified', 'safe', 'on'=>'search'),
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
			'moodActivityMood' => array(self::BELONGS_TO, 'MoodType', 'mood_activity_mood_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mood_activity_id' => 'Mood Activity',
			'mood_activity_email' => 'Mood Activity Email',
			'mood_activity_mood_id' => 'Mood Activity Mood',
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

		$criteria->compare('mood_activity_id',$this->mood_activity_id);
		$criteria->compare('mood_activity_email',$this->mood_activity_email,true);
		$criteria->compare('mood_activity_mood_id',$this->mood_activity_mood_id,true);
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
	 * @return MoodActivity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            if ($this->isNewRecord):
                $this->created = date('Y-m-d H:i:s');
                $this->modified = date('Y-m-d H:i:s');
            endif;

            return parent::beforeSave();
    }

}
