<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property string $category_id
 * @property string $category_name
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Diary[] $diaries
 * @property TmpDiary[] $tmpDiaries
 */
class Category extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{category}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        $userID = Yii::app()->user->id;
        return array(
            'mine' => array('condition' => "$alias.user_id = '{$userID}'"),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_name', 'required'),
            array('category_name', 'length', 'max' => 250),
            array('created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('category_id, category_name, created, modified', 'safe', 'on' => 'search'),
            array('category_name', 'catCheck', 'on' => 'update'),
        );
    }

    public function catCheck($attribute, $params) {
        $criteria = new CDbCriteria;
        $criteria->addCondition('category_name = "' . $this->$attribute . '"');
        $cat = Category::model()->find($criteria);
        if (!empty($cat)) {
            $this->addError($attribute, 'This Category Name already exists');
        }
    }
    
    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'diaries' => array(self::HAS_MANY, 'Diary', 'diary_category_id'),
            'tmpDiaries' => array(self::HAS_MANY, 'TmpDiary', 'temp_category_id'),
            'catUser' => array(self::HAS_MANY, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'user_id' => 'User',
            'category_name' => 'Category Name',
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

        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('category_name', $this->category_name, true);
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
     * @return Category the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        if ($this->isNewRecord):
            $this->created = date('Y-m-d H:i:s');
            $this->modified = date('Y-m-d H:i:s');
        else:
            $this->modified = date('Y-m-d H:i:s');
        endif;

        return parent::beforeSave();
    }

}
