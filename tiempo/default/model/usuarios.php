<?php
class usuarios extends EntidadBase{

    // protected $campos;
    /*
		    protected $id;
    protected $Nombre;
    protected $Apellido;
    protected $Direccion;
    protected $Departamento;
    protected $funciones;
    protected $comandos;
    protected $seguridad;
    protected $grupo;
    protected $prio;
    protected $Fecha;
    protected $Sueldo;
    protected $Observaciones;
    $this->columnas  = array(
			"id",  "Nombre", "Apellido", "Direccion", "Departamento", "funciones", "comandos", "seguridad", 
			"grupo", "prio", "Fecha", "Sueldo", "Observaciones"	);
	*/
	
    public function __construct() {
        
        // atributos de las columnas.
        $this->atributos = array(
			"id" => array( "typeform" => "hidden", "claseform"=> "inputbox" , 
				"comandoform"=>"no-editor", "dbtipo"=>"autoincrement" ,"class"=>"hidden" ),
			"Nombre" => array( "typeform" =>  "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","class"=>"glyphicon glyphicon-user" ),
			"Apellido" => array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null" ,"class"=>"glyphicon glyphicon-user"),
			"Direccion" => array(  "typeform" => "text","claseform"=> "inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null" ,"class"=>"glyphicon glyphicon-home"),
			"funciones" => array(  "typeform" => "text","claseform"=> "inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null","class"=>"glyphicon glyphicon-tags" ),
			"comandos" => array(  "typeform" => "code","claseform"=> "inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null" ,"class"=>"glyphicon glyphicon-list-alt"),
			"seguridad" => array(  "typeform" => "interno", "claseform"=>"inputbox" , "comandoform"=>"no-editor", 
				"dbtipo"=>"null","class"=>"hidden" ), // no se envia
			"grupo" => array(  "typeform" => "numerico","claseform"=> "select" , "comandoform"=>"editor", 
				"dbtipo"=>"null" ,
				"array ( 'administrador'=>0,'atencion'=>1,'contable'=>2 , 'mantenimiento'=>3 )" ,"class"=>"glyphicon glyphicon-sunglasses" ),
			"prio" => array( "typeform" => "numerico","claseform"=>"inputbox","comandoform"=>"numerico",
				"dbtipo"=>"null" ,"class"=>"glyphicon glyphicon-sort-by-attributes"),
			"Departamento" => array( "typeform" => "text","claseform"=>"inputbox","comandoform"=>"alfanumerico",
				"dbtipo"=>"null" ,"class"=>"glyphicon glyphicon-sort-by-attributes"),
			"Fecha" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"null","class"=>"glyphicon glyphicon-calendar"),
			"Sueldo" => array( "typeform" => "moneda","claseform"=>"inputbox","float(2)",
				"dbtipo"=>"null",
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,
				"htmllast"=>"<span class=\"input-group-addon\">.00</span>" ,
				),
			"Observaciones" => array( "typeform" => "text","claseform"=>"textarea","comandoform"=>"alfanumerico",
				"dbtipo"=>"null","class"=>"hidden")
		);
			
        $table="empleados";
        
        
        parent::__construct($table);
    }
    
    public function tabla(){
		return $this->table ;
	}
    // generando un getter especial
    public function ciudad() {
		
	}
    
	public function check($campo,$valor){
		// busca en la base de datos el valor del campo
		if (in_array($campo,$this->columnas)){
			
			$tmp = parent::getAll();
			foreach($tmp as $tm ){
				if ($tm->$campo == $valor ){
					// valor encontrado.
					foreach($this->columnas as $c){
						$this->$c = $tm->{$c} ;
					}
					return true;
				}
			}
		}else
			return false;
	}
	
    public function add(){
		// agregar un registro nuevo.
		$t="" ;
		foreach($this->columnas as $campo ) {
			if ($campo != "id") {
				if ($this->$campo == '') 
					$t .= " NULL ," ;
				else
					$t .=  "'".$this->$campo."'," ;
			}
		}
		$t=substr($t,0,strlen($t)-1);
		
        $query="INSERT INTO ".$this->table." (".implode(", ",$this->columnas).")
                VALUES(NULL, $t );";
                       
        $save=$this->db()->query($query);
        if ($save){
			$save = $this->db()->insert_id;
		}
		else{
			echo $this->db()->error;
        }
        
        return $save;
    }
 
}
?>
