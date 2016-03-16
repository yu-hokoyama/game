<?php
require_once('app/model/db/UserBaseData.class.php');

class User{
	public function insertUserData($id,$pass,$name){
		$userBaseData = new UserBaseData();
		$userBaseData->insert($id,$pass,$name);
		
	}

    public function getUserData($uid){
        $userBaseData = new UserBaseData();
        $userData = $userBaseData->getPassFromUid($uid);
        return 0;
    }
}