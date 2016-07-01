<!-- Search Form -->
    <div class="blog-p-search">
      <form class="form" role="form" method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/blog">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search our blog">
          <span class="input-group-btn">
            <button class="btn btn-color" type="button">Go!</button>
          </span>
        </div>
      </form>
    </div>

    <!-- Tags -->
    <h4 class="primary-font">
      Tags
    </h4>

    <ul class="blog-p-social">
    <?php
    $query=Yii::app()->db->createCommand('SELECT * FROM BlogTag')->queryAll();
    foreach ($query as $data)
        {
            echo '<li><a href="'.Yii::app()->request->baseUrl.'/blog/tag/'.$data['name'].'">'.$data['name'].' <span class="badge pull-right">'.$data['frequency'].'</span></a></li>';
        }
    ?>
    </ul>

    <!-- Most Popular -->
    <h4 class="primary-font">
      Recent Post
    </h4>
    <ul class="blog-p-popular">
    <?php 
    //in your controller
    $criteria = new CDbCriteria();
    $criteria->addSearchCondition('status', 1, true, 'AND' );
    $criteria->order = 'id DESC';
    //your criterias to get your data
        $dataProvider = new CActiveDataProvider('Blog',
            array(
                    'criteria'  => $criteria,
                    'pagination'=>array(
                            'pageSize'=>20,
                        ),
            )
        );

    $data = $dataProvider->getData();
    foreach($data as $i => $item)
      Yii::app()->controller->renderPartial('_recentPost',array('index' => $i, 'data' => $item, 'widget' => $this)); 
    ?>
    </ul>