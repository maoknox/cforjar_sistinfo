<?
	class HolaController extends Controller{
		
		public function actionIndex(){
		
			$saludo="Prueba yii";	
			$this->render("index",array("saludo"=>$saludo));
		}
		
		public function actionPrueba($id=null){
			$formPr=new HolaForm();
			if(isset($_POST["HolaForm"])){
				$formPr->attributes=$_POST["HolaForm"];
				if($formPr->validate()){
					$this->redirect(array("prueba"));
				}
			}
			$this->render("prueba",array('formPr'=>$formPr));
		}
	}

?>