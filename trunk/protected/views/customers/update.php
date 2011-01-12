<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->customers_id=>array('view','id'=>$model->customers_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')),
	array('label'=>'View Customers', 'url'=>array('view', 'id'=>$model->customers_id)),
	array('label'=>'Manage Customers', 'url'=>array('admin')),
);
?>

<h1>Update Customers <?php echo $model->customers_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>