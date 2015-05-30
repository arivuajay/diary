<?php

/**
 * This is the model class for table "{{student_diary}}".
 *
 * The followings are the available columns in table '{{student_diary}}':
 * @property string $diary_id
 * @property string $diary_user_id
 * @property string $diary_title
 * @property string $diary_description
 * @property string $diary_class_id
 * @property string $diary_subject_id
 * @property string $diary_tags
 * @property string $diary_current_date
 * @property string $diary_user_mood_id
 * @property string $diary_upload
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property StudentDiaryClass $diaryClass
 * @property MoodType $diaryUserMood
 * @property StudentDiarySubject $diarySubject
 * @property Users $diaryUser
 * @property StudentDiaryImage[] $studentDiaryImages
 */
class StudentDiary extends CActiveRecord {

    protected $_allowTypes = 'jpg,jpeg, gif, png, txt, docs, xlsx';
    protected $_maxSize = 2;
    public $dist_date;
     public $diary_class;
     public $diary_subject;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{student_diary}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        $userID = Yii::app()->user->id;
        return array(
            'mine' => array('condition' => "$alias.diary_user_id = '{$userID}'"),
            'uniqueDays' => array('select' => "DISTINCT(DATE($alias.diary_current_date)) AS `dist_date`"),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('diary_title, diary_description, diary_class_id, diary_subject_id, diary_current_date, diary_user_mood_id', 'required', 'on' => 'create,update'),
            array('diary_user_id, diary_class_id, diary_subject_id, diary_user_mood_id', 'length', 'max' => 20),
            array('diary_title, diary_tags', 'length', 'max' => 250),
            array('diary_upload, created, modified', 'safe'),
            array('diary_class, diary_subject', 'safe', 'on' => 'create'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('diary_id, diary_user_id, diary_title, diary_description, diary_class_id, diary_subject_id, diary_tags, diary_current_date, diary_user_mood_id, diary_upload, created, modified', 'safe', 'on' => 'search'),
            array('diary_class', 'clsCheck', 'on' => 'create'),
            array('diary_subject', 'subCheck', 'on' => 'create'),
        );
    }

    public function clsCheck($attribute, $params) {
        if ($this->diary_class_id == 'others') {
            if ($this->$attribute == '') {
                $this->addError($attribute, 'Class Name cannot be blank');
            } else {
                $criteria = new CDbCriteria;
                $criteria->addCondition('class_name = "' . $this->$attribute . '"');
                $criteria->addCondition('user_id = "' . Yii::app()->user->id . '"');

                $cat = StudentDiaryClass::model()->find($criteria);
                if (!empty($cat)) {
                    $this->addError($attribute, 'This Class Name already exists');
                }
            }
        }
    }

    public function subCheck($attribute, $params) {
        if ($this->diary_subject_id == 'others') {
            if ($this->$attribute == '') {
                $this->addError($attribute, 'Subject Name cannot be blank');
            } else {
                $criteria = new CDbCriteria;
                $criteria->addCondition('subject_name = "' . $this->$attribute . '"');
                $criteria->addCondition('class_id = "' . $this->diary_class_id . '"');
                $criteria->addCondition('user_id = "' . Yii::app()->user->id . '"');

                $cat = StudentDiarySubject::model()->find($criteria);
                if (!empty($cat)) {
                    $this->addError($attribute, 'This Subject Name already exists');
                }
            }
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'diaryClass' => array(self::BELONGS_TO, 'StudentDiaryClass', 'diary_class_id'),
            'diaryUserMood' => array(self::BELONGS_TO, 'MoodType', 'diary_user_mood_id'),
            'diarySubject' => array(self::BELONGS_TO, 'StudentDiarySubject', 'diary_subject_id'),
            'diaryUser' => array(self::BELONGS_TO, 'Users', 'diary_user_id'),
            'diaryImages' => array(self::HAS_MANY, 'StudentDiaryImage', 'diary_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'diary_id' => 'Diary',
            'diary_user_id' => 'User',
            'diary_title' => 'Title',
            'diary_description' => 'Diary Description',
            'diary_class_id' => 'Class',
            'diary_subject_id' => 'Subject',
            'diary_tags' => 'Diary Tags',
            'diary_current_date' => 'Date',
            'diary_user_mood_id' => 'Selected Mood',
            'diary_upload' => 'Diary Upload',
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

        $criteria->compare('diary_id', $this->diary_id, true);
        $criteria->compare('diary_user_id', $this->diary_user_id, true);
        $criteria->compare('diary_title', $this->diary_title, true);
        $criteria->compare('diary_description', $this->diary_description, true);
        $criteria->compare('diary_class_id', $this->diary_class_id, true);
        $criteria->compare('diary_subject_id', $this->diary_subject_id, true);
        $criteria->compare('diary_tags', $this->diary_tags, true);
        $criteria->compare('diary_current_date', $this->diary_current_date, true);
        $criteria->compare('diary_user_mood_id', $this->diary_user_mood_id, true);
        $criteria->compare('diary_upload', $this->diary_upload, true);
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
     * @return StudentDiary the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeValidate() {
        if ($this->scenario != 'webservice') {
            $this->diary_user_id = Yii::app()->user->id;
        }

        if ($this->diary_current_date)
            $this->diary_current_date = date('Y-m-d H:i:s', strtotime($this->diary_current_date));
        $this->modified = date('Y-m-d H:i:s');

        if ($this->isNewRecord) {
            $this->created = date('Y-m-d H:i:s');
        }
        return parent::beforeValidate();
    }

}
