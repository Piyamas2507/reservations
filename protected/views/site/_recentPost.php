<div class="row" style="margin-bottom:20px;">
	<div class="col-md-4">
		<img class="img-responsive img-rounded" src="<?php echo Load::Picture($data->picture); ?>" alt="...">
	</div>
	<div class="col-md-8">
		<h3><?php echo CHtml::link(CHtml::encode($data->title), array('blog/view', 'id'=>$data->slug)); ?></h3>
		<p>
		<?php echo $data->description; ?>
		</p>
		<?php echo CHtml::link(Yii::t('app', 'Read More...'), array('blog/view', 'id'=>$data->slug),array('class'=>'btn btn-lg btn-color')); ?>
	</div>
	
</div>