<?php echo "<?php if(Yii::app()->user->isAdmin()): ?>\n"; ?>
	<h3 class="title">Operation</h3>
    	<?php echo "<?php
		\$this->beginWidget('zii.widgets.CPortlet', array(
		));

		\$this->widget('zii.widgets.CMenu', array(
			'items'=>\$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		\$this->endWidget();
		?>\n"; ?>
<?php echo "<?php endif; ?>\n"; ?>