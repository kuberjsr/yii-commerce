<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->products_id=>array('view','id'=>$model->products_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->products_id)),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>Update Products <?php echo $model->products_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>