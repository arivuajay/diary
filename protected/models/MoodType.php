<?php

/**
 * This is the model class for table "journal_mood_type".
 *
 * The followings are the available columns in table 'journal_mood_type':
 * @property string $mood_id
 * @property string $mood_type
 *  * @property string $mood_image
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Diary[] $diaries
 * @property TmpDiary[] $tmpDiaries
 */
class MoodType extends CActiveRecord {
 
    public $image;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{mood_type}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mood_type,mood_image', 'required'),
            array('mood_type', 'length', 'max' => 250),
            array('created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('mood_id, mood_type, created, modified', 'safe', 'on' => 'search'),
            array('mood_image', 'file',
                'types' => 'jpg, gif, png',
//                'maxSize' => 1024 * 1024 * 50, // 50 MB
//                'minSize' => 1024 * 1024 * 20, // 20 MB
                'allowEmpty' => true),
            array('mood_image', 'dimensionValidation'),
        );
    }
    
    public function dimensionValidation($attribute, $param) {
//        $this->addError('photo', $this->image);
         
        if (is_object($this->mood_image)) {
            list($width, $height) = getimagesize($this->mood_image->tempname);
            if ($width != 48 || $height != 48)
                $this->addError('photo', 'Photo size should be 48*48 dimension');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'diaries' => array(self::HAS_MANY, 'Diary', 'diary_user_mood_id'),
            'moodActivities' => array(self::HAS_MANY, 'MoodActivity', 'mood_activity_mood_id'),
            'tmpDiaries' => array(self::HAS_MANY, 'TmpDiary', 'temp_user_mood_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'mood_id' => 'Mood',
            'mood_type' => 'Mood Type',
            'mood_image' => 'Mood Image',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('mood_id', $this->mood_id, true);
        $criteria->compare('mood_type', $this->mood_type, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MoodType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
