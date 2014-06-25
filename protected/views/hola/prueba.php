<?php 
//Yii::app()->getClientScript()->registerScript('myscript','$("#HolaForm_nombre").keyup(function() {
//alert(\'Hello world !\');
//});');

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
));
	// si se quisiera ir a otro controlador se crearia una Url dentro del array 'action'=>$this->createUrl('controlador/metodo');
?>
	<!--campo de texto para nombre -->	
	<?php echo $form->labelEx($formPr,'nombre');?></br>
	<?php echo $form->textField($formPr,'nombre');?></br>
	<?php echo $form->error($formPr,'nombre');?>

	<?php echo $form->labelEx($formPr,'descripcion');?></br>
	<?php echo $form->textArea($formPr,'descripcion');?></br>
	<?php echo $form->error($formPr,'descripcion');?>
    
    <?php echo CHtml::submitButton('Crear');?>


<?php $this->endWidget();?>
