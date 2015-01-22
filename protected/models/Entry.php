<?php

/**
 * This is the model class for table "journal_tmp_diary".
 *
 * The followings are the available columns in table 'journal_tmp_diary':
 * @property string $temp_id
 * @property string $temp_activation_key
 * @property string $temp_title
 * @property string $temp_description
 * @property string $temp_category_id
 * @property string $temp_tags
 * @property string $temp_current_date
 * @property string $temp_user_mood_id
 * @property string $temp_upload
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Category $tempCategory
 * @property Users $tempActivationKey
 * @property MoodType $tempUserMood
 */
class Entry extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tmp_diary}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('temp_title, temp_description, temp_category_id, temp_current_date, temp_user_mood_id', 'required'),
			array('temp_activation_key, temp_title, temp_tags', 'length', 'max'=>250),
			array('temp_category_id, temp_user_mood_id', 'length', 'max'=>20),
			array('temp_upload, created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('temp_id, temp_activation_key, temp_title, temp_description, temp_category_id, temp_tags, temp_current_date, temp_user_mood_id, temp_upload, created, modified', 'safe', 'on'=>'search'),
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
			'tempCategory' => array(self::BELONGS_TO, 'Category', 'temp_category_id'),
			'tempActivationKey' => array(self::BELONGS_TO, 'Users', 'temp_activation_key'),
			'tempUserMood' => array(self::BELONGS_TO, 'MoodType', 'temp_user_mood_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'temp_id' => 'Temp',
			'temp_activation_key' => 'Temp Activation Key',
			'temp_title' => 'Title',
			'temp_description' => 'Description',
			'temp_category_id' => 'Category',
			'temp_tags' => 'Tags',
			'temp_current_date' => 'Date',
			'temp_user_mood_id' => 'User Mood',
			'temp_upload' => 'Upload',
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

		$criteria->compare('temp_id',$this->temp_id,true);
		$criteria->compare('temp_activation_key',$this->temp_activation_key,true);
		$criteria->compare('temp_title',$this->temp_title,true);
		$criteria->compare('temp_description',$this->temp_description,true);
		$criteria->compare('temp_category_id',$this->temp_category_id,true);
		$criteria->compare('temp_tags',$this->temp_tags,true);
		$criteria->compare('temp_current_date',$this->temp_current_date,true);
		$criteria->compare('temp_user_mood_id',$this->temp_user_mood_id,true);
		$criteria->compare('temp_upload',$this->temp_upload,true);
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
	 * @return Entry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        protected function beforeSave() {
            if($this->isNewRecord){
                $model->created = date('Y-m-d H:i:s');
            }
            
            $model->modified = date('Y-m-d H:i:s');

            return parent::beforeSave();
        }
}
