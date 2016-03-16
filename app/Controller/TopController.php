<?php
require_once('app/model/User.class.php');

class Top{

	/**
	 * TOPページ
	 */
	public function TopAction(){
		
	}

	/**
	 * 新規登録ページ
	 */
	public function newEntryAction()
	{

	}

	/**
	 *　登録本処理
	 */
	public function EntryAction()
	{
		//ID
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
		}
		//pass
		if(isset($_REQUEST['pass'])){
			$pass = $_REQUEST['pass'];
		}
		//name
		if(isset($_REQUEST['name'])){
			$name = $_REQUEST['name'];
		}

		$user = new User();
		$user->insertUserData($id,$pass,$name);

	}

}
