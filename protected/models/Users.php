<?php

/**
 * This is the model class for table "journal_users".
 *
 * The followings are the available columns in table 'journal_users':
 * @property string $user_id
 * @property string $user_email
 * @property string $user_password
 * @property string $user_status
 * @property string $user_activation_key
 * @property string $user_last_login
 * @property string $user_login_ip
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Diary[] $diaries
 * @property MoodReport[] $moodReports
 * @property TmpDiary[] $tmpDiaries
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}
        
         public $confirm_password;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, user_email, user_password,confirm_password', 'required','on'=>'register'),
			array('user_name, user_email, user_password', 'required','on'=>'social_register'),
			array('user_email, user_password, user_activation_key, user_login_ip', 'length', 'max'=>250),
			array('user_password', 'compare', 'compareAttribute'=>'confirm_password','on'=>'register'),
                        array('user_email','email'),
                        array('user_status', 'length', 'max'=>1),
			array('user_last_login, created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_email, user_password, user_status, user_activation_key, user_last_login, user_login_ip, created, modified', 'safe', 'on'=>'search'),
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
			'diaries' => array(self::HAS_MANY, 'Diary', 'diary_user_id'),
			'moodReports' => array(self::HAS_MANY, 'MoodReport', 'mood_report_user_id'),
			'tmpDiaries' => array(self::HAS_MANY, 'TmpDiary', 'temp_activation_key'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_email' => 'User Email',
			'user_password' => 'User Password',
			'user_status' => 'User Status',
			'user_activation_key' => 'User Activation Key',
			'user_last_login' => 'User Last Login',
			'user_login_ip' => 'User Login Ip',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_status',$this->user_status,true);
		$criteria->compare('user_activation_key',$this->user_activation_key,true);
		$criteria->compare('user_last_login',$this->user_last_login,true);
		$criteria->compare('user_login_ip',$this->user_login_ip,true);
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
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            if ($this->isNewRecord):
                $this->created = date('Y-m-d h:i:s');
                $this->modified = date('Y-m-d h:i:s');
                $this->user_login_ip = CHttpRequest::getUserHostAddress();
                
                $this->user_password = Myclass::encrypt($this->user_password);
            endif;

            return parent::beforeSave();
        }
//         public function beforeSave(){
//        
//        if($_POST['Users']['user_password'])
//        {
//            $this->user_password = Myclass::encrypt($_POST['Users']['user_password']);
//        }
//       
//       
//        return parent::beforeSave();
//    }
}
