<?php
/* @var $this LocationsgalleryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Locationsgalleries',
);

$this->menu=array(
	array('label'=>'Create Locationsgallery', 'url'=>array('create')),
	array('label'=>'Manage Locationsgallery', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Locationsgalleries</span></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>

</div>