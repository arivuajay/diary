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
        exit;
    }

}
