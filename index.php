<?php
date_default_timezone_set('Asia/Tokyo');
require_once('app/Common/Common.php');
require_once('app/Common/Log.php');
require_once('app/Controller/TopController.php');
require_once('app/Controller/MyPageController.php');

session_start();

if(isset($_REQUEST['id']) && isset($_REQUEST['pass'])){
    $_SESSION['uid'] = $_REQUEST['id'];
    $_SESSION['pass'] = $_REQUEST['pass'];  
    header('Location: index.php?mode=mypage&action=mypage');
}

//何もパラメータがなければTOP
if(!isset($_REQUEST['mode']) && !isset($_REQUEST['action'])){
	$data = array();
	$top = new Top();
	$data = $top->topAction();
	Common::smartyView('top','top',$data);
}else{
	$mode = $_REQUEST['mode'];

	$class = new $mode;
    $action = $_REQUEST['action'].'Action';
	$data = $class->$action();

	Common::smartyView($mode,$_REQUEST['action'],$data);

}

