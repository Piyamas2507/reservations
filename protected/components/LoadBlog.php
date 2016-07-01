<?php
class LoadBlog {
	public static function CategoryPicture($id){
		$query=Yii::app()->db->createCommand('SELECT picture FROM BlogCategory WHERE id='.$id)->queryAll();
            foreach ($query as $data)
                {
                    $result=$data['picture'];
                }
    return Yii::app()->request->baseUrl.$result;
	}

}