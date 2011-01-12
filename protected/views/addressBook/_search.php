<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'address_book_id'); ?>
		<?php echo $form->textField($model,'address_book_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_id'); ?>
		<?php echo $form->textField($model,'customers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_gender'); ?>
		<?php echo $form->textField($model,'entry_gender',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_company'); ?>
		<?php echo $form->textField($model,'entry_company',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_firstname'); ?>
		<?php echo $form->textField($model,'entry_firstname',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_lastname'); ?>
		<?php echo $form->textField($model,'entry_lastname',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_street_address'); ?>
		<?php echo $form->textField($model,'entry_street_address',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_suburb'); ?>
		<?php echo $form->textField($model,'entry_suburb',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_postcode'); ?>
		<?php echo $form->textField($model,'entry_postcode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_city'); ?>
		<?php echo $form->textField($model,'entry_city',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_state'); ?>
		<?php echo $form->textField($model,'entry_state',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_country_id'); ?>
		<?php echo $form->textField($model,'entry_country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_zone_id'); ?>
		<?php echo $form->textField($model,'entry_zone_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->