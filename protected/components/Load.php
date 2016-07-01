<?php
class Load {

	public static function LastLogin(){
		$users=Yii::app()->db->createCommand('SELECT * FROM Users WHERE level_user>=1 ORDER BY last_login DESC LIMIT 9')->queryAll();
		echo '<h3 class="text-color"><span>Last Login</span></h3>';
        echo '<ul class="help-cats-p" style="margin-bottom: 0;">';
		foreach ($users as $key => $value) {
		      $users[$key] = $value['username'].'<br />';
		      echo '<li>
              <a href="'.Yii::app()->request->baseUrl.'/users/'.$value['id'].'" style="padding:1px 0;">
              <img src="'.Load::Picture($value['picture']).'" style="height:23px; width:23px;"> '.$value['username'].' · <small>'.Load::TimePassed($value['last_login']).'</small></li>
		      </a>';
        }
		echo '</ul>';
	}

    public static function UserDetail($id){
        $user = Users::model()->findByPk($id);
        return $user;
    }

    //Standart
    public static function UserLevel($id)
    {
        $query=Yii::app()->db->createCommand('SELECT name FROM UsersLevel WHERE id='.$id)->queryAll();
            foreach ($query as $data)
                {
                    $result=$data['name'];
                }
    return $result;
    }

    public static function Password($id)
    {
        $query=Yii::app()->db->createCommand('SELECT password FROM Users WHERE id='.$id)->queryAll();
            foreach ($query as $data)
                {
                    $result=$data['password'];
                }
    return $result;
    }

    public static function Username($id)
    {
        $query=Yii::app()->db->createCommand('SELECT username FROM Users WHERE id='.$id)->queryAll();
            foreach ($query as $data)
                {
                    $result=$data['username'];
                }
    return $result;
    }

    public static function MemberTotal(){
        $count = Users::Model()->count();

        return $count;
    }
    public static function ReservationsTotal(){
        $count = Reservations::Model()->count();

        return $count;
    }
    //  public static function UseTotalAll(){
    //     $count = Reservation::model()->count(location_id, array('key'=>location_id))

    //     return $count;
    // }


    public static function Picture($url)
    {
        if(empty($url)){
            return Yii::app()->request->baseUrl.'/upload/ProfilePicture/default.png';
        } else {
            return Yii::app()->request->baseUrl.$url;
        }
    }

	public static function TimePassed($timestamp){
	$timestamp = strtotime($timestamp);

    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;

    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );

    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}
    
    public static function DateFormat($date){
        $strYear = date("Y",strtotime($date))+543;//กำหนดให้เป็นปีพุทธศักราช
        $strMonth= date("n",strtotime($date));
        $strDay= date("j",strtotime($date));
        $strHour= date("H",strtotime($date));
        $strMinute= date("i",strtotime($date));
        $strSeconds= date("s",strtotime($date));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        if(Yii::app()->language=='th')
            return "$strDay $strMonthThai $strYear";
        else
            return date_format(date_create($date), "j F Y");

    }

    public static function HiddenTel($tel){
        $tel=substr($tel, 0, -2);
        echo $tel.'XX'; 
    }

}

