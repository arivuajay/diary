<?php

/**
 * This is the model class for table "{{banner}}".
 *
 * The followings are the available columns in table '{{banner}}':
 * @property string $banner_id
 * @property string $banner_image
 * @property string $banner_title
 * @property string $banner_url
 * @property string $banner_layout_id
 * @property string $banner_status
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property BannerLayout $bannerLayout
 */
class Banner extends CActiveRecord {

    public $banner_width;
    public $banner_height;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{banner}}';
    }
    
    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.banner_status = '1'"),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('banner_layout_id, banner_title', 'required'),
            array('banner_image, banner_path', 'required', 'on' => 'create'),
            array('banner_image', 'dimensionValidation'),
            array('banner_title, banner_url, banner_path', 'length', 'max' => 255),
            array('banner_layout_id', 'length', 'max' => 20),
            array('banner_status', 'length', 'max' => 1),
            array('banner_url', 'url'),
            array(
                'banner_image', 
                'file',
                'types' => 'jpg, gif, png',
                'allowEmpty' => true
                ),
            array('created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('banner_id, banner_image, banner_title, banner_url, banner_layout_id, banner_status, created, modified', 'safe', 'on' => 'search'),
        );
    }

    public function dimensionValidation($attribute, $params) {
        if (is_object($this->banner_image)) {
            list($width, $height) = getimagesize($this->banner_image->tempname);
            if ($width < $this->banner_width || $height < $this->banner_height){
                $error = 'Banner size should be '.$this->banner_width.'*'.$this->banner_height.' dimension';
                $error .= '(Upload size is '.$width.'*'.$height.')';
                $this->addError('banner_image', $error);
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
            'bannerLayout' => array(self::BELONGS_TO, 'BannerLayout', 'banner_layout_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'banner_id' => 'Banner',
            'banner_image' => 'Banner Image',
            'banner_title' => 'Banner Title',
            'banner_url' => 'Banner Url',
            'banner_layout_id' => 'Banner Layout',
            'banner_status' => 'Banner Status',
            'banner_path' => 'Banner Path',
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

        $criteria->compare('banner_id', $this->banner_id, true);
        $criteria->compare('banner_image', $this->banner_image, true);
        $criteria->compare('banner_title', $this->banner_title, true);
        $criteria->compare('banner_url', $this->banner_url, true);
        $criteria->compare('banner_layout_id', $this->banner_layout_id, true);
        $criteria->compare('banner_status', $this->banner_status, true);
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
     * @return Banner the static model class
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
