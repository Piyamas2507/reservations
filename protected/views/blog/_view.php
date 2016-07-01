<?php
/* @var $this BlogController */
/* @var $data Blog */
?>


<img class="author hidden-xs" src="<?php echo LoadBlog::CategoryPicture($data->category); ?>" alt="...">
<div class="blog-p-body">
<h2 class="primary-font first-child">
<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->slug)); ?></h2>
<hr>
<div class="row">
	<div class="col-md-7">
		<p>
		<?php echo $data->description; ?>
		</p>

		<?php echo CHtml::link(Yii::t('app', 'Read More...'), array('view', 'id'=>$data->slug),array('class'=>'btn btn-lg btn-color')); ?>
	</div>
	<div class="col-md-5">
		<ul class="user-info" style="margin-top:0;">
			<?php
		  /*<li>By: <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/2">Admin</a></span></li>*/
		  ?>
		  <li>Create Date: <span class="text-muted"><?php echo Load::DateFormat($data->create); ?></span></li>
		  <li>Rating: 
		    <ul class="rating list-inline">
		      <li><i class="fa fa-star"></i></li>
		      <li><i class="fa fa-star"></i></li> 
		      <li><i class="fa fa-star"></i></li>
		      <li><i class="fa fa-star"></i></li>
		      <li><i class="fa fa-star"></i></li>
		    </ul>
		  </li>
		  <li>View: <span class="text-muted"><i class="fa fa-eye"></i> <?php echo $data->view; ?></span></li>
		</ul>
	</div>
</div>



<?php if(!empty($_GET['tag'])||!empty($_GET['search'])): else :?>
<?php if(!empty($data->picture)): ?>
<img class="img-responsive" src="<?php echo Load::Picture($data->picture); ?>" alt="...">
<?php endif; ?>
<?php endif; ?>
</div>
