<?php
$this->breadcrumbs=array(
	'Address Books'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AddressBook', 'url'=>array('index')),
	array('label'=>'Manage AddressBook', 'url'=>array('admin')),
);
?>

<h1>Create AddressBook</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>