<?php

/**
 * This is the model class for table "{{users_details}}".
 *
 * The followings are the available columns in table '{{users_details}}':
 * @property string $user_detail_id
 * @property string $user_id
 * @property string $user_prefix
 * @property string $user_first_name
 * @property string $user_middle_name
 * @property string $user_last_name
 * @property string $user_dob
 * @property string $user_gender
 * @property string $user_country
 * @property string $user_sec_email
 * @property string $user_landline
 * @property string $user_phone
 * @property string $user_martial_status
 * @property string $user_address
 * @property string $user_parent
 * @property string $user_spouse
 * @property string $user_detail_kids
 * @property string $user_kid1
 * @property string $user_kid2
 * @property string $user_education
 * @property string $user_area_of_int
 * @property string $user_sports_activity
 * @property string $user_adventure_activity
 * @property string $user_fav_color
 * @property string $user_fav_place
 * @property integer $user_no_best_friend
 * @property integer $user_no_friend
 * @property string $user_hangout
 * @property string $user_like_travel
 * @property string $user_stress_buster
 * @property string $user_free_time
 * @property string $user_desc_urself
 * @property string $user_personality
 * @property string $user_fav_animal
 * @property string $user_fav_friut
 * @property string $user_anniversary
 * @property string $user_anniversary_rem
 * @property string $user_spouse_name
 * @property string $user_spouse_dob
 * @property string $user_spouse_dob_rem
 * @property string $user_father_name
 * @property string $user_mother_name
 * @property string $user_father_bod
 * @property string $user_father_bod_rem
 * @property string $user_mother_dob
 * @property string $user_mother_dob_rem
 * @property string $user_parent_anniversary
 * @property string $user_parent_anniversary_rem
 * @property string $user_kid_dob
 * @property string $user_kid_dob_rem
 * @property string $user_kid_spouse_detail
 * @property string $user_kid_anniversary
 * @property string $user_kid_detail
 */
class UsersDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users_details}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_no_best_friend, user_no_friend', 'numerical', 'integerOnly'=>true),
			array('user_detail_id, user_id', 'length', 'max'=>20),
			array('user_prefix, user_gender', 'length', 'max'=>10),
			array('user_first_name, user_middle_name, user_last_name, user_dob, user_landline, user_phone', 'length', 'max'=>50),
			array('user_country', 'length', 'max'=>25),
			array('user_sec_email', 'length', 'max'=>100),
			array('user_martial_status, user_hangout, user_anniversary_rem, user_spouse_dob_rem, user_father_bod_rem, user_mother_dob_rem, user_parent_anniversary_rem, user_kid_dob_rem', 'length', 'max'=>1),
			array('user_parent, user_spouse, user_detail_kids, user_kid1, user_kid2, user_education, user_fav_color, user_fav_place, user_fav_animal, user_fav_fruit, user_spouse_name, user_father_name, user_mother_name, user_kid_spouse_detail, user_kid_detail, user_like_travel, user_parents_detail, user_spouse_detail', 'length', 'max'=>256),
			array('user_address, user_area_of_int, user_sports_activity, user_adventure_activity, user_stress_buster, user_free_time, user_desc_urself, user_personality, user_anniversary, user_spouse_dob, user_father_bod, user_mother_dob, user_parent_anniversary, user_kid_dob, user_kid_anniversary', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_detail_id, user_id, user_prefix, user_first_name, user_middle_name, user_last_name, user_dob, user_gender, user_country, user_sec_email, user_landline, user_phone, user_martial_status, user_address, user_parent, user_spouse, user_detail_kids, user_kid1, user_kid2, user_education, user_area_of_int, user_sports_activity, user_adventure_activity, user_fav_color, user_fav_place, user_no_best_friend, user_no_friend, user_hangout, user_like_travel, user_stress_buster, user_free_time, user_desc_urself, user_personality, user_fav_animal, user_fav_friut, user_anniversary, user_anniversary_rem, user_spouse_name, user_spouse_dob, user_spouse_dob_rem, user_father_name, user_mother_name, user_father_bod, user_father_bod_rem, user_mother_dob, user_mother_dob_rem, user_parent_anniversary, user_parent_anniversary_rem, user_kid_dob, user_kid_dob_rem, user_kid_spouse_detail, user_kid_anniversary, user_kid_detail', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_detail_id' => 'User Detail',
			'user_id' => 'User',
			'user_prefix' => 'User Prefix',
			'user_first_name' => 'First Name',
			'user_middle_name' => 'Middle Name',
			'user_last_name' => 'Last Name',
			'user_dob' => 'User Dob',
			'user_gender' => 'Gender',
			'user_country' => 'Country',
			'user_sec_email' => 'User Sec Email',
			'user_landline' => 'User Landline',
			'user_phone' => 'User Phone',
			'user_martial_status' => 'User Martial Status',
			'user_address' => 'User Address',
			'user_parent' => 'User Parent',
			'user_spouse' => 'User Spouse',
			'user_detail_kids' => 'User Detail Kids',
			'user_kid1' => 'User Kid1',
			'user_kid2' => 'User Kid2',
			'user_education' => 'Education',
			'user_area_of_int' => 'User Area Of Int',
			'user_sports_activity' => 'User Sports Activity',
			'user_adventure_activity' => 'User Adventure Activity',
			'user_fav_color' => 'User Fav Color',
			'user_fav_place' => 'User Fav Place',
			'user_no_best_friend' => 'Number of Best Friends',
			'user_no_friend' => 'Number of Friends',
			'user_hangout' => 'You like to hangout with',
			'user_like_travel' => 'User Like Travel',
			'user_stress_buster' => 'What are your stress busters',
			'user_free_time' => 'What do you do in your free time',
			'user_desc_urself' => 'How do you describe yourself',
			'user_personality' => 'What kind of personality you are',
			'user_fav_animal' => 'User Fav Animal',
			'user_fav_fruit' => 'User Fav Friut',
			'user_anniversary' => 'User Anniversary',
			'user_anniversary_rem' => 'User Anniversary Rem',
			'user_spouse_name' => 'User Spouse Name',
			'user_spouse_dob' => 'User Spouse Dob',
			'user_spouse_dob_rem' => 'User Spouse Dob Rem',
			'user_father_name' => 'User Father Name',
			'user_mother_name' => 'User Mother Name',
			'user_father_bod' => 'User Father Bod',
			'user_father_bod_rem' => 'User Father Bod Rem',
			'user_mother_dob' => 'User Mother Dob',
			'user_mother_dob_rem' => 'User Mother Dob Rem',
			'user_parent_anniversary' => 'User Parent Anniversary',
			'user_parent_anniversary_rem' => 'User Parent Anniversary Rem',
			'user_kid_dob' => 'User Kid Dob',
			'user_kid_dob_rem' => 'User Kid Dob Rem',
			'user_kid_spouse_detail' => 'User Kid Spouse Detail',
			'user_kid_anniversary' => 'User Kid Anniversary',
			'user_kid_detail' => 'User Kid Detail',
                        'user_parents_detail' => 'Parents Detail',
                        'user_spouse_detail' => 'Spouse Detail',

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

		$criteria->compare('user_detail_id',$this->user_detail_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('user_prefix',$this->user_prefix,true);
		$criteria->compare('user_first_name',$this->user_first_name,true);
		$criteria->compare('user_middle_name',$this->user_middle_name,true);
		$criteria->compare('user_last_name',$this->user_last_name,true);
		$criteria->compare('user_dob',$this->user_dob,true);
		$criteria->compare('user_gender',$this->user_gender,true);
		$criteria->compare('user_country',$this->user_country,true);
		$criteria->compare('user_sec_email',$this->user_sec_email,true);
		$criteria->compare('user_landline',$this->user_landline,true);
		$criteria->compare('user_phone',$this->user_phone,true);
		$criteria->compare('user_martial_status',$this->user_martial_status,true);
		$criteria->compare('user_address',$this->user_address,true);
		$criteria->compare('user_parent',$this->user_parent,true);
		$criteria->compare('user_spouse',$this->user_spouse,true);
		$criteria->compare('user_detail_kids',$this->user_detail_kids,true);
		$criteria->compare('user_kid1',$this->user_kid1,true);
		$criteria->compare('user_kid2',$this->user_kid2,true);
		$criteria->compare('user_education',$this->user_education,true);
		$criteria->compare('user_area_of_int',$this->user_area_of_int,true);
		$criteria->compare('user_sports_activity',$this->user_sports_activity,true);
		$criteria->compare('user_adventure_activity',$this->user_adventure_activity,true);
		$criteria->compare('user_fav_color',$this->user_fav_color,true);
		$criteria->compare('user_fav_place',$this->user_fav_place,true);
		$criteria->compare('user_no_best_friend',$this->user_no_best_friend);
		$criteria->compare('user_no_friend',$this->user_no_friend);
		$criteria->compare('user_hangout',$this->user_hangout,true);
		$criteria->compare('user_like_travel',$this->user_like_travel,true);
		$criteria->compare('user_stress_buster',$this->user_stress_buster,true);
		$criteria->compare('user_free_time',$this->user_free_time,true);
		$criteria->compare('user_desc_urself',$this->user_desc_urself,true);
		$criteria->compare('user_personality',$this->user_personality,true);
		$criteria->compare('user_fav_animal',$this->user_fav_animal,true);
		$criteria->compare('user_fav_friut',$this->user_fav_friut,true);
		$criteria->compare('user_anniversary',$this->user_anniversary,true);
		$criteria->compare('user_anniversary_rem',$this->user_anniversary_rem,true);
		$criteria->compare('user_spouse_name',$this->user_spouse_name,true);
		$criteria->compare('user_spouse_dob',$this->user_spouse_dob,true);
		$criteria->compare('user_spouse_dob_rem',$this->user_spouse_dob_rem,true);
		$criteria->compare('user_father_name',$this->user_father_name,true);
		$criteria->compare('user_mother_name',$this->user_mother_name,true);
		$criteria->compare('user_father_bod',$this->user_father_bod,true);
		$criteria->compare('user_father_bod_rem',$this->user_father_bod_rem,true);
		$criteria->compare('user_mother_dob',$this->user_mother_dob,true);
		$criteria->compare('user_mother_dob_rem',$this->user_mother_dob_rem,true);
		$criteria->compare('user_parent_anniversary',$this->user_parent_anniversary,true);
		$criteria->compare('user_parent_anniversary_rem',$this->user_parent_anniversary_rem,true);
		$criteria->compare('user_kid_dob',$this->user_kid_dob,true);
		$criteria->compare('user_kid_dob_rem',$this->user_kid_dob_rem,true);
		$criteria->compare('user_kid_spouse_detail',$this->user_kid_spouse_detail,true);
		$criteria->compare('user_kid_anniversary',$this->user_kid_anniversary,true);
		$criteria->compare('user_kid_detail',$this->user_kid_detail,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
