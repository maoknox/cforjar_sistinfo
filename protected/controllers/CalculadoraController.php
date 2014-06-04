<?
class CalculadoraController extends Controller{
		
	public function actionIndex(){  
       $this -> render('index', array('calc' => new CalculadoraForm()));
	   //$this -> render('index', array('saludo' => 'Que hubo'));  
    }  
	public function actionOperador()  
    {  
        $calculadora = new CalculadoraForm();  
        if(isset($_POST['Calculadora']))  
        {  
            $calculadora -> attributes = $_POST['Calculadora'];
            if($calculadora -> validate())  
            {  
                // Exito  
                $this -> render('index', array('calc' => $calculadora,'resultado' => $calculadora -> operador()));  
                exit;  
            }  
        }  
        // Fracaso  
        $this -> render('index', array('calc' => $calculadora));  
    }  
}
?>