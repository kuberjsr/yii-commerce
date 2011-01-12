<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'address-book-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_id'); ?>
		<?php echo $form->textField($model,'customers_id'); ?>
		<?php echo $form->error($model,'customers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_gender'); ?>
		<?php echo $form->textField($model,'entry_gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'entry_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_company'); ?>
		<?php echo $form->textField($model,'entry_company',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'entry_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_firstname'); ?>
		<?php echo $form->textField($model,'entry_firstname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'entry_firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_lastname'); ?>
		<?php echo $form->textField($model,'entry_lastname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'entry_lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_street_address'); ?>
		<?php echo $form->textField($model,'entry_street_address',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'entry_street_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_suburb'); ?>
		<?php echo $form->textField($model,'entry_suburb',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'entry_suburb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_postcode'); ?>
		<?php echo $form->textField($model,'entry_postcode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'entry_postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_city'); ?>
		<?php echo $form->textField($model,'entry_city',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'entry_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_state'); ?>
		<?php echo $form->textField($model,'entry_state',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'entry_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_country_id'); ?>
		<?php echo $form->textField($model,'entry_country_id'); ?>
		<?php echo $form->error($model,'entry_country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_zone_id'); ?>
		<?php echo $form->textField($model,'entry_zone_id'); ?>
		<?php echo $form->error($model,'entry_zone_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->