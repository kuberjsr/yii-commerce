<?php
$this->breadcrumbs=array(
	'Address Books'=>array('index'),
	$model->address_book_id,
);

$this->menu=array(
	array('label'=>'List AddressBook', 'url'=>array('index')),
	array('label'=>'Create AddressBook', 'url'=>array('create')),
	array('label'=>'Update AddressBook', 'url'=>array('update', 'id'=>$model->address_book_id)),
	array('label'=>'Delete AddressBook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->address_book_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AddressBook', 'url'=>array('admin')),
);
?>

<h1>View AddressBook #<?php echo $model->address_book_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'address_book_id',
		'customers_id',
		'entry_gender',
		'entry_company',
		'entry_firstname',
		'entry_lastname',
		'entry_street_address',
		'entry_suburb',
		'entry_postcode',
		'entry_city',
		'entry_state',
		'entry_country_id',
		'entry_zone_id',
	),
)); ?>
