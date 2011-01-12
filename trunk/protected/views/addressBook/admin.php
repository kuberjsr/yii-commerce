<?php
$this->breadcrumbs=array(
	'Address Books'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AddressBook', 'url'=>array('index')),
	array('label'=>'Create AddressBook', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('address-book-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Address Books</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'address-book-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'address_book_id',
		'customers_id',
		'entry_gender',
		'entry_company',
		'entry_firstname',
		'entry_lastname',
		/*
		'entry_street_address',
		'entry_suburb',
		'entry_postcode',
		'entry_city',
		'entry_state',
		'entry_country_id',
		'entry_zone_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
