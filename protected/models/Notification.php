<?php

/**
 * This is the model class for table "{{notification}}".
 *
 * The followings are the available columns in table '{{notification}}':
 * @property integer $notification_id
 * @property string $notification_title
 * @property string $notification_message
 * @property string $created
 * @property string $modified
 */
class Notification extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{notification}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('notification_title, notification_message, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('notification_id, notification_title, notification_message, created, modified', 'safe', 'on' => 'search'),
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
            'notification_id' => 'Notification',
            'notification_title' => 'Notification Title',
            'notification_message' => 'Notification Message',
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

        $criteria->compare('notification_id', $this->notification_id);
        $criteria->compare('notification_title', $this->notification_title, true);
        $criteria->compare('notification_message', $this->notification_message, true);
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
     * @return Notification the static model class
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
