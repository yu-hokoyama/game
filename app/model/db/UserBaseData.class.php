<?php
require_once('app/model/CommonDB.class.php');

class UserBaseData{
	public function insert($uid,$pass,$name){
		$db = CommonDB::connectDB();

		$sql = "
			INSERT INTO 
				user_base_data(uid,pass,name,insert_time,update_time)
			VALUES
				(:uid,:pass,:name,now(),now())
			;
		";

		$stml = $db -> prepare($sql);

		$stml->bindParam(':uid', $uid);
		$stml->bindParam(':pass', $pass);
		$stml->bindParam(':name', $name);

		$stml->execute();
	}

	public function getPassFromUid($uid){
		$db = CommonDB::connectDB();

		$sql = "
			SELECT
				uid
				,pass
				,name
			FROM
				user_base_data
			WHERE
				uid = :uid
			;
		";

		$stml = $db -> prepare($sql);

		$stml->bindParam(':uid', $uid);
		$stml->execute();

		$ret = $stml->fetch(PDO::FETCH_ASSOC);

		Log::pp($ret);
	}
}