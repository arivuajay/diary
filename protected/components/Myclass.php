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
    
    public static function getMood($key = NULL){
       $mood =  CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_type');
        
        if(isset($key) && $key != NULL)
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
   
}
