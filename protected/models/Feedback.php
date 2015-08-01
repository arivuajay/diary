<?php

/**
 * This is the model class for table "{{feedback}}".
 *
 * The followings are the available columns in table '{{feedback}}':
 * @property integer $feedback_id
 * @property string $feedback_name
 * @property string $feedback_email
 * @property string $feedback_phone
 * @property string $feedback_message
 * @property string $created
 * @property string $modified
 */
class Feedback extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{feedback}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('feedback_name, feedback_email, feedback_message', 'required', 'on' => 'normal'),
            array('feedback_name, feedback_email, feedback_message', 'required', 'on' => 'webservice'),
            array('feedback_name, feedback_email', 'length', 'max' => 256),
            array('feedback_phone', 'length', 'max' => 15),
            array('feedback_email', 'email'),
            array('feedback_message', 'length', 'min' => 10),
            array('feedback_message, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('feedback_id, feedback_name, feedback_email, feedback_phone, feedback_message, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'feedback_id' => 'Feedback',
            'feedback_name' => 'Name',
            'feedback_email' => 'Email',
            'feedback_phone' => 'Phone',
            'feedback_message' => 'Message',
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

        $criteria->compare('feedback_id', $this->feedback_id);
        $criteria->compare('feedback_name', $this->feedback_name, true);
        $criteria->compare('feedback_email', $this->feedback_email, true);
        $criteria->compare('feedback_phone', $this->feedback_phone, true);
        $criteria->compare('feedback_message', $this->feedback_message, true);
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
     * @return Feedback the static model class
     */
    public static function model($className = __CLASS__) {
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
