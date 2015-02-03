<?php

/**
 * This is the model class for table "{{banner_layout}}".
 *
 * The followings are the available columns in table '{{banner_layout}}':
 * @property string $banner_layout_id
 * @property string $banner_layout_name
 * @property string $banner_layout_page
 * @property string $banner_layout_position
 * @property string $banner_layout_dimensions
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Banner[] $banners
 */
class BannerLayout extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{banner_layout}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('banner_layout_name, banner_layout_page, banner_layout_position', 'required'),
            array('banner_layout_name', 'length', 'max' => 255),
            array('banner_layout_page', 'length', 'max' => 10),
            array('banner_layout_position', 'length', 'max' => 6),
            array('banner_layout_dimensions', 'length', 'max' => 250),
            array('created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('banner_layout_id, banner_layout_name, banner_layout_page, banner_layout_position, banner_layout_dimensions, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'banners' => array(self::HAS_MANY, 'Banner', 'banner_layout_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'banner_layout_id' => 'Banner Layout',
            'banner_layout_name' => 'Banner Layout Name',
            'banner_layout_page' => 'Banner Layout Page',
            'banner_layout_position' => 'Banner Layout Position',
            'banner_layout_dimensions' => 'Banner Layout Dimensions',
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

        $criteria->compare('banner_layout_id', $this->banner_layout_id, true);
        $criteria->compare('banner_layout_name', $this->banner_layout_name, true);
        $criteria->compare('banner_layout_page', $this->banner_layout_page, true);
        $criteria->compare('banner_layout_position', $this->banner_layout_position, true);
        $criteria->compare('banner_layout_dimensions', $this->banner_layout_dimensions, true);
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
     * @return BannerLayout the static model class
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
