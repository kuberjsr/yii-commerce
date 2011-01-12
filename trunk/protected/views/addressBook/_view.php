<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_book_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->address_book_id), array('view', 'id'=>$data->address_book_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_id')); ?>:</b>
	<?php echo CHtml::encode($data->customers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_gender')); ?>:</b>
	<?php echo CHtml::encode($data->entry_gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_company')); ?>:</b>
	<?php echo CHtml::encode($data->entry_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_firstname')); ?>:</b>
	<?php echo CHtml::encode($data->entry_firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_lastname')); ?>:</b>
	<?php echo CHtml::encode($data->entry_lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_street_address')); ?>:</b>
	<?php echo CHtml::encode($data->entry_street_address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_suburb')); ?>:</b>
	<?php echo CHtml::encode($data->entry_suburb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_postcode')); ?>:</b>
	<?php echo CHtml::encode($data->entry_postcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_city')); ?>:</b>
	<?php echo CHtml::encode($data->entry_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_state')); ?>:</b>
	<?php echo CHtml::encode($data->entry_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_country_id')); ?>:</b>
	<?php echo CHtml::encode($data->entry_country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_zone_id')); ?>:</b>
	<?php echo CHtml::encode($data->entry_zone_id); ?>
	<br />

	*/ ?>

</div>