<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/macroEstiloscf.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu/ddsmoothmenu.css" media="screen, projection" />
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ddsmoothmenu.js"></script>
    <?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="thrColElsHdr">

<div id="container">
  <div id="header">
  
    <h1><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="24%" id="encab" style="border-right:1px solid #333;" align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/SDIS.png" width="150px" height="100px"/></td>
    <td width="52%" id="encab" style="border-right:1px solid #333;" align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/centroForjar.png" /></td>
    <td width="24%" id="encab"><h6 style="padding:0 0; margin:0 0;">
    <?php
		if(Yii::app()->user->hasState('cedula')){
      		echo 'Profesional: '.Yii::app()->user->getState('nombre');
			//Yii::app()->getSession()->remove('cedula');	
        }
     ?></h6>
    </td>
  </tr>
</table>
</h1>
  <!-- end #header --></div>
  <div id="smoothmenu1" class="ddsmoothmenu" >
   <?php
		if(Yii::app()->user->hasState('cedula') && Yii::app()->getSession()->get('menumodulo')!==""){
      	$this->widget('zii.widgets.CMenu',Yii::app()->getSession()->get('menumodulo')); ?>
       <?php  } else {
	   	//echo Yii::app()->getSession()->get('menumodulo');
	    $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Ingreso', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Inicio', 'url'=>array('/controlAp/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				
			),
		));}?><br style="clear: left" />
       
</div>
<!-- alertas de mínimos de atención requeridos-->
<div id="alertAdol" style="width:auto; height:300px; position:absolute; left:auto; top:auto; border:1px solid #003; display:none; background:#FFF; z-index:110; overflow-y:scroll">
   		<div style="color:#360"><div style="float:left; width:95%;" align="center"><h4 style="margin:0px 0px; padding:2px 0px;">Alertas</h4></div><div id="boton"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/minusRedBut.ico" style=" width:20px; height:20px; cursor:pointer;" align="right" /></div></div><br /><br />
        <div id="muestraAlerta" style="overflow:auto;"></div>
   </div>
<!-- Alertas de tiempo de atención del adolescente-->   
   <div id="divAlertAtencion" style="width:auto; height:300px; position:absolute; left:auto; top:auto; border:1px solid #003; display:none; background:#FFF; z-index:110; overflow-y:scroll">
   		<div style="color:#360"><div style="float:left; width:95%;" align="center"><h4 style="margin:0px 0px; padding:2px 0px;">Estado de la atenci&oacute;n</h4></div><div id="boton"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/minusRedBut.ico" style=" width:20px; height:20px; cursor:pointer;" align="right" /></div></div><br /><br />
        <div id="muestraAlertaAtencion" style="overflow:auto;"></div>
   </div>
 <!-- Alerta de permanencia del adolescente en el prograja-->  
      <div id="divAlertPermanencia" style="width:auto; height:300px; position:absolute; left:auto; top:auto; border:1px solid #003; display:none; background:#FFF; z-index:110; overflow-y:scroll">
   		<div style="color:#360"><div style="float:left; width:95%;" align="center"><h4 style="margin:0px 0px; padding:2px 0px;">Estado de permanencia</h4></div><div id="boton"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/minusRedBut.ico" style=" width:20px; height:20px; cursor:pointer;" align="right" /></div></div><br /><br />
        <div id="muestraAlertPermanencia" style="overflow:auto;"></div>
   </div>
<!-- alertas de gestión de referenciación-->
      <div id="divAlertReferenciacion" style="width:auto; height:300px; position:absolute; left:auto; top:auto; border:1px solid #003; display:none; background:#FFF; z-index:110; overflow-y:scroll">
   		<div style="color:#360">
        <div style="float:left; width:95%;" align="center"><h4 style="margin:0px 0px; padding:2px 0px;">Tiempo de demora en la gesti&oacute;n</h4></div><div id="boton"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/minusRedBut.ico" style=" width:20px; height:20px; cursor:pointer;" align="right" /></div></div><br /><br />
        <div id="muestraAlertTiempoGestRefer" style="overflow:auto;"></div>
   </div>
   
   <div id="sidebar1">
    <h3>Alertas</h3>
    <div class="alertas" id="alertas"></div>
    <div class="alertasAtencion" id="alertasAtencion"></div>
    <div class="alertasPermanencia" id="alertasPermanencia"></div>
    <div class="alertasAlertTiempoGestRefer" id="alertasAlertTiempoGestRefer"></div>
   </div> <!--end #sidebar1 -->
 <div id="sidebar2">
    <h3>Manuales</h3>
    <p>Manual Técnico</p>
   </div> <!-- end #sidebar2 -->
     <div  id="gifCarga" style=" width:100px; position:absolute; margin:150px 0px 0px 0px; display:none; z-index:100; top: 119px;"><table style=" width:100px;" border="0" align="center">
  <tr>
    <td  align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cargando.gif" /></td>
  </tr>
</table>
</div>
<div  id="gifCargaPerCon" style=" width:100%; position:absolute; margin:150px 0px 0px 0px; display:none; z-index:100; top: 119px;"><table style="background-color:#CCC;  width:300px;" border="0" align="center">
  <tr>
    <td  align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cargando.gif" /></td>
  </tr>
  <tr>
    <td  align="center"><strong>Se haperdido la conexión con el servidor, espere unos instantes mientras se reestablece</strong></td>
  </tr>
  <tr>
    <td  align="center"><strong>Cuando desaparezca este mensaje podrá continuar.</strong></td>
  </tr>
</table>
</div>
  <div id="mainContent" >
  <?php echo $content; ?>
</div>
	<!-- Este elemento de eliminación siempre debe ir inmediatamente después del div #mainContent para forzar al div #container a que contenga todos los elementos flotantes hijos --><br class="clearfloat" />
   <div id="footer">
    <table width="100%" border="0">
    	<tr>
        	<td id="pie"> </td>
            <td id="pie"> </td>
            <td id="pie"> </td>
            <td id="pie"  width="10%"><div id="fecha"></div></td>
            <td id="pie" width="10%"><div id="reloj"></div></td>
	</tr>
</table>
  <!-- end #footer --></div>
<!-- end #container --></div>
<script language="javascript" type="text/javascript"?>
		ddsmoothmenu.init({
			mainmenuid: "smoothmenu1", //menu DIV id
			orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu', //class added to menu's outer DIV
			//customtheme: ["#1c5a80", "#18374a"],
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		});
</script>
</body>
</html>
    