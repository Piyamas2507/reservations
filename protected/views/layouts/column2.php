<?php $this->beginContent('//layouts/main'); ?>
<?php if(Yii::app()->user->isAdmin()): ?>
<!-- Intro Text -->
<div class="container" style="height: inherit;margin-bottom:10px;margin-top:-15px;">
	<div class="row">
		<div class="col-sm-12">
			<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				// 'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'nav nav-pills'),
			));
			$this->endWidget();
		?>
		</div>
	</div>
</div>
<?php endif ?>
			<?php echo $content; ?>
		
<?php $this->endContent(); ?>
