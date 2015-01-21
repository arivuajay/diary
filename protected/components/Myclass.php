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
//            'Name' => $_POST['Users']['user_name'],
//            'Email' => $_POST['Users']['user_email'],
//            'Password' => $_POST['Users']['user_password']  
            $param = $model;

            $model = new Users('webservice');
            $model->user_name = $param['user_name'];
            $model->user_email = $param['user_email'];
            $model->user_password = $param['user_password'];
            $model->user_status = 1;

            if (!$model->validate()) {
                $response['success'] = 0;
                $response['message'] = str_replace("\r\n","",strip_tags(CHtml::errorSummary($model,'')));

                return $response;
            }
        }

        $model->save(false);

        if (!$webserve) {
            $mail = new Sendmail;
            $message = '<p>Dear ' . $model->user_name . '</p>';
            $message .= '<p>Thank you for signing up, we just need to verify your email address</p>';
            $message .= '<p><a href="' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '">Click Here to activate</a></p><br />';
            $message .= "<p>If you can't click the button above, you can verify your email address by copying and pasting (or typing) the following address into your browser:</p>";
            $message .= '<p><a href="' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '">' . SITEURL . '/site/users/activation?activationkey=' . $model->user_activation_key . '&userid=' . $model->user_id . '</a></p><br />';
            $Subject = CHtml::encode(Yii::app()->name) . ': Confirmation your email';
            $mail->send($model->user_email, $Subject, $message);
        }

        $response['success'] = 1;
        $response['message'] = "Successfully Created";

        return $response;
    }

}
