<?php
require_once('app/model/User.class.php');
require_once('app/Common/Common.php');

Class Mypage{
    public function MypageAction(){
        //sessionチェック
        Common::checkSession();

        $data = array();

        $uid = $_SESSION['uid'];
        $pass = $_SESSION['pass'];


        $user = new User();
        $data['user_data'] = $user->getUserData($uid);

        return $data;
    }
}