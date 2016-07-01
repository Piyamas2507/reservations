<?php
$this->title=$model->title.' - Ujizen.com';
$this->description=$model->description;
$this->socialImage=Load::Picture($model->picture);

$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Blog', 'url'=>array('index')),
	array('label'=>'Create Blog', 'url'=>array('create')),
	array('label'=>'Update Blog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Blog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Blog', 'url'=>array('admin')),
);
?>
<div class="container">
    <div class="row blog-p">
        <div class="col-sm-9">
            <img class="author hidden-xs" src="<?php echo LoadBlog::CategoryPicture($model->category); ?>" alt="...">
            <div class="blog-p-body">
              <h2 class="primary-font first-child"><?php echo $model->title; ?></h2>
              <hr>
              <?php if(!empty($model->picture)): ?>
                  <img class="img-responsive" src="<?php echo Load::Picture($model->picture); ?>" alt="...">
              <?php endif; ?>

              <?php echo $model->content; ?>

              <div class="table-responsive">
              <?php
              $link='http://ujizen.com/blog/'.$model->id;
              Library::facebook($link); ?>
              </div>

            </div>
        </div>
        <div class="col-sm-3">
            <?php include '_sidebar.php'; ?>
        </div>
    </div>
</div>
