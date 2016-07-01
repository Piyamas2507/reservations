<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>
<section>
    <div class="row">
        <div class="col5">
            <h2><?php echo $label; ?></h2>
            <div class="row account-center">

<?php echo "<?php"; ?>
    $data = $dataProvider->getData();
    foreach($data as $i => $item){
    if(($i%3)==0)
    echo '</div><div class="row account-center">';
    Yii::app()->controller->renderPartial('_view',array('data' => $i, 'data' => $item, 'widget' => $this)); 
    }
    ?>

            </div>
        </div>
    </div>
</section>
