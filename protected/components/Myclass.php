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
        $mood = CHtml::listData(Category::model()->findAll(), 'category_id', 'category_name');
        $mood['others'] = 'Others';
        return $mood;
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
            if($param['user_password'] == 'FB'):
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
        $mail = new Sendmail;
        $message = '<p>Dear ' . $model->user_name . '</p>';
        $message .= '<p>Thank you for signing up, we just need to verify your email address</p>';
        $message .= '<p><a href="' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '">Click Here to activate</a></p><br />';
        $message .= "<p>If you can't click the button above, you can verify your email address by copying and pasting (or typing) the following address into your browser:</p>";
        $message .= '<p><a href="' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '">' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '</a></p><br />';
        $Subject = CHtml::encode(Yii::app()->name) . ': Confirmation your email';
        $mail->send($model->user_email, $Subject, $message);
//        }

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
        $mail = new Sendmail;
        $message = '<p>Dear ' . $user->user_name . '</p>';
        $message .= '<p>We received a request to reset the password for your account.To reset your password, click on the button below (or copy/paste the URL into your browser). </p>';
        $message .= '<a href="' . $_SERVER['HTTP_HOST'] . Yii::app()->baseUrl . '/site/users/reset?str=' . $user->reset_password_string . '&id=' . $user->user_id . '">Click to Reset Password</a></p>';
        $message .= '<p>This Password Link is valid for only 5 minutes from request time (' . date('Y-m-d H:i:s') . ')</p>';
        $Subject = CHtml::encode(Yii::app()->name) . ': Reset Password';
        $mail->send($user->user_email, $Subject, $message);
//        }

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

        $model = new Diary('webservice');
        $model->diary_title = $param['title'];
        $model->diary_description = $param['text'];
        $mood_array = array('1' => "Happy", "Sad", "Excited");
        $cat_array = array('1' => "Family", "Friends", "Business");
        $model->diary_category_id = array_search($param['category'], $cat_array);
        $model->diary_user_mood_id = array_search($param['mood'], $mood_array);

        $bind_time = trim($param['year'] . "-" . $param['month'] . "-" . $param['date'] . " " . $param['time']);
        $model->diary_current_date = date('Y-m-d H:i:s', strtotime($bind_time));
        $model->diary_tags = $param['tag'];

        $model->diary_user_id = $user->user_id;

        if ($model->save()) {
            $response['success'] = 1;
            $response['pref_date'] = date('Y-m-d', strtotime($model->diary_current_date));
            $response['message'] = "Your Password Reset Link sent to your email address.";
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

}
