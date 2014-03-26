<?php
/* @var $this PesanTamuController */
/* @var $model PesanTamu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pesan-tamu-_formIsi-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama'); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pesan'); ?>
		<?php echo $form->textArea($model,'pesan',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'pesan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_IP'); ?>
		<?php echo $form->textField($model,'user_IP'); ?>
		<?php echo $form->error($model,'user_IP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat'); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()):?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Masukkan kode sebagaimana yang tampil.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif;?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->