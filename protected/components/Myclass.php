<?php

class Myclass extends CController {

    public static function encrypt($value) {
        return hash("sha512", $value);
    }

    public static function refencryption($str) {
        return base64_encode($str);
    }

    public static function refdecryption($str) {
        return base64_decode($str);
    }

    public static function t($str = '', $params = array(), $dic = 'app') {
        return Yii::t($dic, $str, $params);
    }

    public static function getRandomString($length = 9) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //length:36
        $final_rand = '';
        for ($i = 0; $i < $length; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $final_rand;
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function getMood($key = NULL) {
        $mood = CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_type');

        if (isset($key) && $key != NULL)
            return $mood[$key];

        return $mood;
    }

    public static function getCategory($key = NULL) {
        $mood = CHtml::listData(Category::model()->findAll(), 'category_id', 'category_name');

        if (isset($key) && $key != NULL)
            return $mood[$key];

        return $mood;
    }

    public static function getCategorywithOthers() {
        $user_id = Yii::app()->user->id;
        $criteria = new CDbCriteria();
        $criteria->addInCondition('user_id', array(0, $user_id));
        $cat_results = Category::model()->findAll($criteria);
        $mood = CHtml::listData($cat_results, 'category_id', 'category_name');
        $mood['others'] = 'Others';
        return $mood;
    }

    public static function getCountry($key = NULL) {
        $countries = array(
            'India' => 'India',
            'Japan' => 'Japan',
            'Pakistan' => 'Pakistan',
        );
        if (isset($key) && $key != NULL)
            return $countries[$key];

        return $countries;
    }

    public static function getTravel($key = NULL) {
        $travels = array(
            'Party' => 'Party',
            'Read' => 'Read',
            'Watch movie' => 'Watch movie',
            'Adventure Sports' => 'Adventure Sports',
            'Shopping' => 'Shopping',
        );
        if (isset($key) && $key != NULL)
            return $travels[$key];

        return $travels;
    }

    public static function rememberMeAdmin($username, $check) {
        if ($check > 0) {
            $time = time();     // Gets the current server time
            $cookie = new CHttpCookie('admin_username', $username);

            $cookie->expire = $time + 60 * 60 * 24 * 30;               // 30 days
            Yii::app()->request->cookies['admin_username'] = $cookie;
        } else {
            unset(Yii::app()->request->cookies['admin_username']);
        }
    }

    public static function addUser($model) {
        $response = null;
        $webserve = false;

        if (!is_object($model)) {
            $webserve = true;
            $param = $model;

            $model = new Users('webservice');
            $model->user_name = $param['user_name'];
            $model->user_email = $param['user_email'];
            if ($param['user_password'] == 'FB' || $param['user_password'] == 'GP'):
                $param['user_password'] = Myclass::getRandomString(6);
            endif;
            $model->user_password = $param['user_password'];
            $model->user_status = 1;

            if (!$model->validate()) {
                $response['success'] = 0;
                $response['message'] = str_replace("\r\n", "", strip_tags(CHtml::errorSummary($model, '')));

                return $response;
            }
        }

        $model->save(false);

//        if (!$webserve) {
//        $mail = new Sendmail;
//        $message = '<p>Dear ' . $model->user_name . '</p>';
//        $message .= '<p>Thank you for signing up, we just need to verify your email address</p>';
//        $message .= '<p><a href="' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '">Click Here to activate</a></p><br />';
//        $message .= "<p>If you can't click the button above, you can verify your email address by copying and pasting (or typing) the following address into your browser:</p>";
//        $message .= '<p><a href="' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '">' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '</a></p><br />';
//        $Subject = CHtml::encode(Yii::app()->name) . ': Confirmation your email';
//        $mail->send($model->user_email, $Subject, $message);
//        }
        ///////////////////////
        $confirmationlink = SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id;
        if (!empty($model->user_email)):
            //$loginlink = Yii::app()->createAbsoluteUrl('/site/default/login');
            $mail = new Sendmail;
            $trans_array = array(
                "{SITENAME}" => SITENAME,
                "{USERNAME}" => $model->user_name,
                "{EMAIL_ID}" => $model->user_email,
                "{NEXTSTEPURL}" => $confirmationlink,
            );
            $message = $mail->getMessage('registration', $trans_array);
            $Subject = $mail->translate('Confirmation Mail From {SITENAME}');
            $mail->send($model->user_email, $Subject, $message);
        endif;
        ///////////////////
        $response['success'] = 1;
        $response['message'] = "Successfully Created";

        return $response;
    }

    public static function forgotPass($model) {
        $response = null;
        $webserve = false;

        if (!is_object($model)) {
            $webserve = true;
            $param = $model;
            $model = new LoginForm('forgotpass');
            $model->username = $param['user_email'];
        }

        $user = Users::model()->findByAttributes(array('user_email' => $model->username));
        if (empty($user)) {
            $response['success'] = 0;
            $response['message'] = "This Email Address Not Exists";

            return $response;
        }

        $reset_link = Myclass::getRandomString(25);
        $user->setAttribute('reset_password_string', $reset_link);
        $user->setAttribute('modified', date('Y-m-d H:i:s'));
        $user->save(false);

//        if (!$webserve) {
//        $mail = new Sendmail;
//        $message = '<p>Dear ' . $user->user_name . '</p>';
//        $message .= '<p>We received a request to reset the password for your account.To reset your password, click on the button below (or copy/paste the URL into your browser). </p>';
//        $message .= '<a href="' . $_SERVER['HTTP_HOST'] . Yii::app()->baseUrl . '/site/users/reset?str=' . $user->reset_password_string . '&id=' . $user->user_id . '">Click to Reset Password</a></p>';
//        $message .= '<p>This Password Link is valid for only 5 minutes from request time (' . date('Y-m-d H:i:s') . ')</p>';
//        $Subject = CHtml::encode(Yii::app()->name) . ': Reset Password';
//        $mail->send($user->user_email, $Subject, $message);
//        }
        ///////////////////////
        $time_valid = date('Y-m-d H:i:s');
        $resetlink = Yii::app()->createAbsoluteUrl('/site/users/reset?str=' . $user->reset_password_string . '&id=' . $user->user_id);
        if (!empty($user->user_email)):
            //$loginlink = Yii::app()->createAbsoluteUrl('/site/default/login');
            $mail = new Sendmail;
            $trans_array = array(
                "{SITENAME}" => SITENAME,
                "{USERNAME}" => $user->user_name,
                "{EMAIL_ID}" => $user->user_email,
                "{NEXTSTEPURL}" => $resetlink,
                "{TIMEVALID}" => $time_valid,
            );
            $message = $mail->getMessage('forgot_password', $trans_array);
            $Subject = $mail->translate('{SITENAME}: Reset Password');
            $mail->send($user->user_email, $Subject, $message);
        endif;
        ///////////////////

        $response['success'] = 1;
        $response['message'] = "Your Password Reset Link sent to your email address.";

        return $response;
    }

    public static function addEntry($param) {
        $user = Users::model()->findByAttributes(array('user_email' => $param['mail']));
        if (!$user) {
            $data['user_name'] = "User";
            $data['user_email'] = $param['mail'];
            $data['user_password'] = self::getRandomString(6);
            $result = self::addUser($data);

            $user = Users::model()->findByAttributes(array('user_email' => $param['mail']));
        }

        if (isset($param['diary_id'])) {
            $model = Diary::model()->findByPk($param['diary_id']);
            DiaryImage::model()->deleteAll("diary_id = '" . $param['diary_id'] . "'");
        }
        if (!$model)
            $model = new Diary();

        $model->setScenario('webservice');
        $model->diary_title = $param['title'];
        $model->diary_description = $param['text'];

        if (isset($param['others'])) {
            $catmodel = new Category();
            $catmodel->category_name = $param['others'];
            $catmodel->user_id = $user->user_id;
            $catmodel->save(false);
            $model->diary_category_id = $catmodel->category_id;
        } else {
            $model->diary_category_id = $param['category'];
        }

        $model->diary_user_mood_id = $param['mood'];

        $bind_time = trim("{$param['month']} {$param['date']} {$param['year']} {$param['time']}");

        $model->diary_current_date = date('Y-m-d H:i:s', strtotime($bind_time));
        $model->diary_tags = $param['tag'];

        $model->diary_user_id = $user->user_id;

        if ($model->save()) {
            $diary_images = $param['journal_images'];
            if (!empty($diary_images)):
                foreach ($diary_images as $image):
                    $imgModel = new DiaryImage();
                    $imgModel->diary_id = $model->diary_id;
                    $imgModel->diary_image = $image;
                    $imgModel->save(false);
                endforeach;
            endif;
            $response['success'] = 1;
            $response['pref_date'] = date('Y-m-d', strtotime($model->diary_current_date));
            $response['message'] = 'Successfully added.' . json_encode($diary_images);
        } else {
            $response['success'] = 0;
            $response['pref_date'] = date('Y-m-d', strtotime($model->diary_current_date));
            $response['message'] = str_replace("\r\n", "", strip_tags(CHtml::errorSummary($model, '')));
        }

        return $response;
    }

    public static function loginApp($param) {
        $model = new LoginForm('login');
        $model->username = $param['username'];
        $model->password = $param['password'];

        if ($model->validate() && $model->login()) {
            $response['success'] = 1;
            $response['message'] = "Successfully logged in";
        } else {
            $response['success'] = 0;
            $response['message'] = str_replace("\r\n", "", strip_tags(CHtml::errorSummary($model, '')));
        }

        return $response;
    }

    public static function getEntries($param) {
        $criteria = new CDbCriteria;

        $criteria->addCondition("diary_user_id = '" . $param['user_id'] . "'");
        if ($param['diary_id'])
            $criteria->addCondition("diary_id = '" . $param['diary_id'] . "'");

        $model = Diary::model()->findAll($criteria);

        if ($model->validate() && $model->login()) {
            $response['success'] = 1;
            $response['message'] = "Successfully logged in";
        } else {
            $response['success'] = 0;
            $response['message'] = str_replace("\r\n", "", strip_tags(CHtml::errorSummary($model, '')));
        }

        return $response;
    }

    public static function getPageUrl($id, $format = 'array') {
        $url = '#';
        $page = Cms::model()->findByPk($id);
        if ($page) {
            switch ($format):
                case 'relative':
                    $url = Yii::app()->createUrl('/site/cms/view', array('slug' => $page->slug));
                    break;
                case 'array':
                    $url = array('/site/cms/view', 'slug' => $page->slug);
                    break;
            endswitch;
        }
        return $url;
    }

    public static function updateUser($model) {
        $response = null;
        $webserve = false;

        if (!is_object($model)) {
            $webserve = true;
            $param = $model;

            $model = new Users('webservice');
            $model->user_name = $param['user_name'];
            $model->user_email = $param['user_email'];

            if (!$model->validate()) {
                $response['success'] = 0;
                $response['message'] = str_replace("\r\n", "", strip_tags(CHtml::errorSummary($model, '')));

                return $response;
            }
        }

        $model->save(false);

        $response['success'] = 1;
        $response['message'] = "Successfully updated.";

        return $response;
    }

    public static function getPageLayouts($key = NULL) {
        /* if you add any value, add in column also (banner_layout_page) ** */
        $layouts = array(
            'home' => 'Home',
            'user_inner' => 'User Inner Page'
        );

        if (isset($key) && $key != NULL)
            return $layouts[$key];

        return $layouts;
    }

    public static function getPageLayoutPositions($key = NULL) {
        /* if you add any value, add in column also (banner_layout_page) ** */
        $layout_positions = array(
            'top' => 'Top',
            'right' => 'Right',
            'bottom' => 'Bottom',
            'left' => 'Left'
        );

        if (isset($key) && $key != NULL)
            return $layout_positions[$key];

        return $layout_positions;
    }

    public static function getBannerImages($layout, $position, $dimenstion) {
        $layout = BannerLayout::model()->findByAttributes(array(
            'banner_layout_page' => $layout,
            'banner_layout_position' => $position,
            'banner_layout_dimensions' => $dimenstion
        ));

        if (!empty($layout)) {
            $banners = Banner::model()->isActive()->findAllByAttributes(array('banner_layout_id' => $layout->banner_layout_id));
            return $banners;
        }
        return array();
    }

    public static function getUserDiaryImages($id) {
        $images = DiaryImage::model()->findAllByAttributes(array('diary_id' => $id));
        $content = '';
        foreach ($images as $image) {
            $img_arr = explode('.', $image->diary_image);
            $ext = $img_arr[1];
            $type = in_array($ext, array('jpg', 'jpeg', 'gif', 'png')) ? 'picture' : 'file';
            $content .= '<span class="glyphicon glyphicon-' . $type . '">  ';
            $dImg = substr($image->diary_image, strpos($image->diary_image, "_") + 1);
            $content .= CHtml::link(
                            $dImg, Yii::app()->createUrl('uploads/journal/' . $image->diary_image), array('target' => '_blank'));
            $content .= '<br /><br />';
        }
        return $content;
    }

    public static function addContact($model) {
        $response = null;
        $webserve = false;
        if (!is_object($model)) {
            $webserve = true;
            $param = $model;

            $model = new Contact('webservice');
            $model->contact_name = $param['contact_name'];
            $model->contact_email = $param['contact_mail'];
            $model->contact_phone = $param['contact_mobile'];
            $model->contact_message = $param['contact_message'];
        }
        if ($model->save()) {
            $adminmodel = Admin::model()->find();
            $mail = new Sendmail;
            $trans_array = array(
                "{SITENAME}" => SITENAME,
                "{USERNAME}" => $model->contact_name,
                "{EMAIL_ID}" => $model->contact_email,
            );
            $message = $mail->getMessage('contact', $trans_array);
            $Subject = $mail->translate('{SITENAME}: Your Contact Received');
            $mail->send($model->contact_email, $Subject, $message);

            $adminmail = new Sendmail;
            $admintrans_array = array(
                "{SITENAME}" => SITENAME,
                "{USERNAME}" => $model->contact_name,
                "{ADMINNAME}" => $adminmodel->admin_username,
                "{EMAIL_ID}" => $model->contact_email,
                "{PHONE}" => $model->contact_phone,
                "{FORM}" => 'Contact',
                "{MESSAGE}" => $model->contact_message,
            );

            $adminmessage = $adminmail->getMessage('contact_admin', $admintrans_array);
            $adminSubject = $adminmail->translate('{SITENAME}: User Contact Received');
            $adminmail->send($adminmodel->admin_email, $adminSubject, $adminmessage);
            $response['success'] = 1;
            $response['message'] = "Contact Successfully sent.";
        }
        return $response;
    }

    public static function addFeedback($model) {
        $response = null;
        $webserve = false;
        if (!is_object($model)) {
            $webserve = true;
            $param = $model;

            $model = new Feedback('webservice');
            $model->feedback_name = $param['feedback_name'];
            $model->feedback_email = $param['feedback_mail'];
            $model->feedback_phone = $param['feedback_mobile'];
            $model->feedback_message = $param['feedback_message'];
        }
        if ($model->save()) {
            $adminmodel = Admin::model()->find();
            $mail = new Sendmail;
            $trans_array = array(
                "{SITENAME}" => SITENAME,
                "{USERNAME}" => $model->feedback_name,
                "{EMAIL_ID}" => $model->feedback_email,
            );
            $message = $mail->getMessage('feedback', $trans_array);
            $Subject = $mail->translate('{SITENAME}: Your Feedback Received');
            $mail->send($model->feedback_email, $Subject, $message);

            $adminmail = new Sendmail;
            $admintrans_array = array(
                "{SITENAME}" => SITENAME,
                "{USERNAME}" => $model->feedback_name,
                "{ADMINNAME}" => $adminmodel->admin_username,
                "{EMAIL_ID}" => $model->feedback_email,
                "{PHONE}" => $model->feedback_phone,
                "{FORM}" => 'Feedback',
                "{MESSAGE}" => $model->feedback_message,
            );

            $adminmessage = $adminmail->getMessage('contact_admin', $admintrans_array);
            $adminSubject = $adminmail->translate('{SITENAME}: User Feedback Received');
            $adminmail->send($adminmodel->admin_email, $adminSubject, $adminmessage);
            $response['success'] = 1;
            $response['message'] = "Feedback Successfully sent.";
        }
        return $response;
    }

    public static function addSubmitmood($model) {
        $response = null;
        $mood_submit_model = new MoodActivity();
        if (!empty($model['QuickCreate'])) {
            $mood_submit_model->mood_activity_email = $model['QuickCreate']['email'];
            $mood_submit_model->mood_activity_mood_id = $model['QuickCreate']['moodtype'];
            $mood_submit_model->save();
        } else {
            $mood_submit_model->mood_activity_email = $model['mail'];
            $mood_submit_model->mood_activity_mood_id = $model['mood'];
            $mood_submit_model->save();
            $response['success'] = 1;
            $response['message'] = "Mood Activity Successfully Saved.";
        }
        return $response;
    }

    public static function getUserClasses($uid) {
        $classes = CHtml::listData(StudentDiaryClass::model()->findAll("user_id = '$uid'"), 'class_id', 'class_name');

        return $classes;
    }

}
