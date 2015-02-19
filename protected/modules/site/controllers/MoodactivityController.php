<?php

class MoodActivityController extends Controller {

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */

    public function actionDailymoodreport() {
        $setting = AdminSetting::model()->find('setting_name = :setting', array(':setting' => 'mood_report_mail'));
        if($setting['status'] == 1){
            $all_moods = MoodType::model()->findAll();
            $sql = "Select Distinct(mood_activity_email) as dist_user, created, mood_activity_mood_id "
                    . "From journal_mood_activity "
                    . "Where DATE(created) = '".date('Y-m-d')."'";
            $user_email_dis = MoodActivity::model()->findAllBySql($sql);

            $mail_users = array();
            foreach ($user_email_dis as $user_email) {
                foreach ($all_moods as $mood_type) {
                    $count = MoodActivity::model()->count(
                            'DATE(created) = :created And mood_activity_email = :email And mood_activity_mood_id = :mood_id', array(
                                ':created' => date('Y-m-d'),
                                ':email' => $user_email->dist_user,
                                ':mood_id' => $mood_type->mood_id
                    ));
                    $mail_users[$user_email->dist_user][$mood_type->mood_type] = $count;
                }
            }

            $message_content = 'This is your daily report';
            foreach ($mail_users as $email => $data) {
                $report_table = '<table width="100%" cellspacing="0" cellpadding="0" border="0"><thead><tr>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px; width:40%; font-weight:bold">Email</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px; width:15%;font-weight:bold">Mood</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;font-weight:bold">Date</td>';
                $report_table .= '</tr></thead><tbody><tr>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;">'.$email.'</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;">';
                foreach ($data as $mood => $mood_value) {
                    if($mood_value != '0'){
                    $report_table .= ucfirst($mood).' ('.$mood_value.')<br />';
                    }
                }
                $report_table .= '</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;">'.date('Y-m-d').'</td>';
                $report_table .= '</tr></tbody></table>';

                $user = Users::model()->findByAttributes(array('user_email' => $email));
                if (isset($user->user_name)) {
                    $user_name = $user->user_name;
                } else {
                    $user_name = 'users';
                }
                $mail = new Sendmail;
                $trans_array = array(
                    "{SITENAME}" => SITENAME,
                    "{USERNAME}" => $user_name,
                    "{MESSAGE_CONTENT}" => $message_content,
                    "{EMAIL_ID}" => $email,
                    "{REPORT_TABLE}" => $report_table,
                );
                $message = $mail->getMessage('daily_mood_report', $trans_array);
                $Subject = $mail->translate('{SITENAME}: Daily Report');
                $mail->send($email, $Subject, $message);
            }
        }
        exit;
    }
    
    public function actionWeeklymoodreport() {
        $setting = AdminSetting::model()->find('setting_name = :setting', array(':setting' => 'mood_report_mail'));
        if($setting['status'] == 2){
            $to_date = date('Y-m-d');
            $from_date = strtotime('-1 week',strtotime($to_date));
            $from_date = date('Y-m-d',$from_date);
            
            $all_moods = MoodType::model()->findAll();
            $sql = "Select Distinct(mood_activity_email) as dist_user, created, mood_activity_mood_id "
                    . "From journal_mood_activity "
                    . "Where DATE(created) Between '".$from_date."' And '".$to_date."'";
            $user_email_dis = MoodActivity::model()->findAllBySql($sql);

            $mail_users = array();
            while (strtotime($from_date) <= strtotime($to_date)) {
                $from_date = date('Y-m-d',strtotime('+1 day',strtotime($from_date)));
                foreach ($user_email_dis as $user_email) {
                    foreach ($all_moods as $mood_type) {
                        $count = MoodActivity::model()->count(
                                'DATE(created) = :created And mood_activity_email = :email And mood_activity_mood_id = :mood_id', array(
                                    ':created' => $from_date,
                                    ':email' => $user_email->dist_user,
                                    ':mood_id' => $mood_type->mood_id
                        ));
                        $count > 0 ? $mail_users[$user_email->dist_user][$from_date][$mood_type->mood_type] = $count : '';
                    }
                }
            }
            $message_content = 'This is your weekly report';
            foreach ($mail_users as $email => $data) {
                $report_table = '<table width="100%" cellspacing="0" cellpadding="0" border="1"><thead><tr>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px; width:40%; font-weight:bold">Email</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px; width:15%;font-weight:bold">Mood</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;font-weight:bold">Date</td>';
                $report_table .= '</tr></thead><tbody>';
                foreach ($data as $date => $value) {
                    $report_table .= '<tr><td style="color: #545454; font-size: 13px; line-height: 20px;">'.$email.'</td>';
                    $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;">';
                    foreach ($value as $mood => $mood_value) {
                        if($mood_value != '0'){
                        $report_table .= ucfirst($mood).' ('.$mood_value.')<br />';
                        }
                    }
                    $report_table .= '</td>';
                    $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;">'.$date.'</td></tr>';
                }
                $report_table .= '</tr></tbody></table>';

                $user = Users::model()->findByAttributes(array('user_email' => $email));
                if (isset($user->user_name)) {
                    $user_name = $user->user_name;
                } else {
                    $user_name = 'users';
                }
                $mail = new Sendmail;
                $trans_array = array(
                    "{SITENAME}" => SITENAME,
                    "{USERNAME}" => $user_name,
                    "{MESSAGE_CONTENT}" => $message_content,
                    "{EMAIL_ID}" => $email,
                    "{REPORT_TABLE}" => $report_table,
                );
                $message = $mail->getMessage('daily_mood_report', $trans_array);
                $Subject = $mail->translate('{SITENAME}: Weekly Report');
                $mail->send($email, $Subject, $message);
            }
        }
        exit;
    }
    
    public function actionMonthlymoodreport() {
        $setting = AdminSetting::model()->find('setting_name = :setting', array(':setting' => 'mood_report_mail'));
        if($setting['status'] == 3){
            $to_date = date('Y-m-d');
            $from_date = strtotime('-1 month',strtotime($to_date));
            $from_date = date('Y-m-d',$from_date);
            
            $all_moods = MoodType::model()->findAll();
            $sql = "Select Distinct(mood_activity_email) as dist_user, created, mood_activity_mood_id "
                    . "From journal_mood_activity "
                    . "Where DATE(created) Between '".$from_date."' And '".$to_date."'";
            $user_email_dis = MoodActivity::model()->findAllBySql($sql);

            $mail_users = array();
            while (strtotime($from_date) <= strtotime($to_date)) {
                $from_date = date('Y-m-d',strtotime('+1 day',strtotime($from_date)));
                foreach ($user_email_dis as $user_email) {
                    foreach ($all_moods as $mood_type) {
                        $count = MoodActivity::model()->count(
                                'DATE(created) = :created And mood_activity_email = :email And mood_activity_mood_id = :mood_id', array(
                                    ':created' => $from_date,
                                    ':email' => $user_email->dist_user,
                                    ':mood_id' => $mood_type->mood_id
                        ));
                        $count > 0 ? $mail_users[$user_email->dist_user][$from_date][$mood_type->mood_type] = $count : '';
                    }
                }
            }
            $message_content = 'This is your monthly report';
            foreach ($mail_users as $email => $data) {
                $report_table = '<table width="100%" cellspacing="0" cellpadding="0" border="1"><thead><tr>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px; width:40%; font-weight:bold">Email</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px; width:15%;font-weight:bold">Mood</td>';
                $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;font-weight:bold">Date</td>';
                $report_table .= '</tr></thead><tbody>';
                foreach ($data as $date => $value) {
                    $report_table .= '<tr><td style="color: #545454; font-size: 13px; line-height: 20px;">'.$email.'</td>';
                    $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;">';
                    foreach ($value as $mood => $mood_value) {
                        if($mood_value != '0'){
                        $report_table .= ucfirst($mood).' ('.$mood_value.')<br />';
                        }
                    }
                    $report_table .= '</td>';
                    $report_table .= '<td style="color: #545454; font-size: 13px; line-height: 20px;">'.$date.'</td></tr>';
                }
                $report_table .= '</tr></tbody></table>';

                $user = Users::model()->findByAttributes(array('user_email' => $email));
                if (isset($user->user_name)) {
                    $user_name = $user->user_name;
                } else {
                    $user_name = 'users';
                }
                $mail = new Sendmail;
                $trans_array = array(
                    "{SITENAME}" => SITENAME,
                    "{USERNAME}" => $user_name,
                    "{MESSAGE_CONTENT}" => $message_content,
                    "{EMAIL_ID}" => $email,
                    "{REPORT_TABLE}" => $report_table,
                );
                $message = $mail->getMessage('daily_mood_report', $trans_array);
                $Subject = $mail->translate('{SITENAME}: Monthly Report');
                $mail->send($email, $Subject, $message);
            }
        }
        exit;
    }

}
