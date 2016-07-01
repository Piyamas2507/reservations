<?php
/* @var $this BlogController */
/* @var $dataProvider CActiveDataProvider */
$this->title=Yii::t('app', 'Blog') . ' - ' . 'Ujizen.com';

$this->breadcrumbs=array(
	'Blogs',
);

$this->menu=array(
	array('label'=>'Create Blog', 'url'=>array('create')),
	array('label'=>'Manage Blog', 'url'=>array('admin')),
);
?>

<?php if(!empty($_GET['tag'])||!empty($_GET['search'])): ?>
<div class="topic">
	<div class="container">
	  <div class="row">
	    <div class="col-sm-12">
	    <?php (!empty($_GET['tag']))? $result = $_GET['tag'] : $result = $_GET['search']; ?>
	      <h3 class="primary-font">Search or Tagged with <i><?php echo CHtml::encode($result); ?></i></h3>
	    </div>
	  </div>
	</div>
</div>
<?php endif; ?>

<div class="container">
<div class="row blog-p">
	<div class="col-sm-9">
		<?php 
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'template'=>"{items}\n{pager}",
			'pagerCssClass'=>'text-center',
			'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
			'itemView'=>'_view',
		)); 
		?>
	</div>

		
<div class="col-sm-3">

	<?php include '_sidebar.php'; ?>

</div>
</div>
</div>