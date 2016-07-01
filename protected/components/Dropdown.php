<?php
class Dropdown {
	public static function Category(){
        $data=Yii::app()->db->createCommand('SELECT name FROM BlogCategory ORDER BY id ASC')->queryAll();
        foreach ($data as $key => $value) {
              $data[$key] = array_shift($value);
        }
    return $data;
	}	

}