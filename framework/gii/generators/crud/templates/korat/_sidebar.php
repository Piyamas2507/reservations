<?php echo "<?php if(Yii::app()->user->isAdmin()): ?>\n"; ?>
<!-- Sidebar -->	
<aside class="sidebar">
    <section class="widget"><h3 class="title">Operation</h3>
    	<?php echo "<?php
		\$this->beginWidget('zii.widgets.CPortlet', array(
		));

		\$this->widget('zii.widgets.CMenu', array(
			'items'=>\$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		\$this->endWidget();
		?>\n"; ?>
    </section>
</aside><!-- End Sidebar -->    		
<?php echo "<?php endif; ?>\n"; ?>

	
    	


