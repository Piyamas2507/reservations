<?php
	$criteria = new CDbCriteria;
	$criteria->compare('language','en');
	$source = Translate::model()->findAll($criteria);

	$data = array();

	foreach ($source as $key => $value) {
		$data[$value->name_key] = $value->message;
	}
	return $data;
?>