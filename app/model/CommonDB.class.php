<?php
class CommonDB{
	public static function connectDB(){
		$dbh = new PDO('mysql:host=localhost;dbname=hokoyama', 'root', '');
		return $dbh;
	}
}
