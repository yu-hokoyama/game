<?php

class Log{

	/**
	 * log出力関数
	 */
	public static function pp($value){
		//現在の日付取得
		$fileName = date("Ymd") . '.log';
		$dirPath = 'log/';
		$filePath = $dirPath . $fileName;
		
		//ファイル作成
		if(!file_exists($filePath)){
			touch($filePath);
		}

		//ログを出した時間
		$now = date("Y-m-d H:i:s");
		//今のログ結果
		$sentents = $now . ' ' . $value;

		//書き込むログの内容
		$contents = file_get_contents($filePath);
		$contents = $contents . $sentents;
		$contents = $contents . "\n";
	
		file_put_contents($filePath, $contents);
	}
}