<?php

// Smartyパス設定
define('SMARTY_PATH', 'view/');
define('SMARTY_TEMPLATES_DIR', SMARTY_PATH . 'templates/');
define('SMARTY_COMPIlE_DIR', SMARTY_PATH . 'templates_c/');
define('SMARTY_CACHE_DIR', SMARTY_PATH . 'chache/');
 
class Common{

	/**
	 * Smarty出力
	 *
	 *@param $mode - クラス名
	 *@param $action - メソッド名
	 *@param $data - viewに渡す値
	 */
	static function smartyView($mode, $action, $data){
		require_once(dirname(__FILE__)."../../../lib/libs/Smarty.class.php");
		require_once('app/Common/Log.php');
		
		// インスタンス生成
		$objSmarty = new Smarty();

		// ディレクトリの指定
		$objSmarty->template_dir = SMARTY_TEMPLATES_DIR;
		$objSmarty->compile_dir = SMARTY_COMPIlE_DIR;
		$objSmarty->cache_dir = SMARTY_CACHE_DIR;
 
		// テンプレート変数の設定
		$objSmarty->assign('data', $data);
 
		// テンプレート出力
		$objSmarty->display(SMARTY_TEMPLATES_DIR.$mode.'/'.$action.'.htm');
	}

	/**
	 * Sessionの確認
	 *
	 * @return Sessionに値がなければログイン画面に飛ばす
	 */
	static function checkSession(){
		if(!isset($_SESSION['uid']) || !isset($_SESSION['pass'])){ 
			header("Location: index.php");
		}

	}
}