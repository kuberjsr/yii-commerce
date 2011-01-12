<?php
$this->breadcrumbs=array(
	'Address Books'=>array('index'),
	$model->address_book_id=>array('view','id'=>$model->address_book_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AddressBook', 'url'=>array('index')),
	array('label'=>'Create AddressBook', 'url'=>array('create')),
	array('label'=>'View AddressBook', 'url'=>array('view', 'id'=>$model->address_book_id)),
	array('label'=>'Manage AddressBook', 'url'=>array('admin')),
);
?>

<h1>Update AddressBook <?php echo $model->address_book_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>