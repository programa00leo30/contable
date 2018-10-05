<?php
class EntidadBase{
    protected $table;
    protected $db;
    protected $conectar;
    protected $idRecordset; 	// para saber en que id estoy.
	protected $columnas ;		// listado de las columnas de la tabla
	protected $atributos ;		// atributos de cada columna de la tabla
	protected $ordeBy ;		// establecer el orden.
	protected $where ;		// establecer condicion para toda la tabla.
	public $paginn; 		// un paginador.
	public $objetos ;		// los distintos objetos de las paginas.
	
    public function __construct($table,$perfil="default") {
        $this->table=(string) $table;
        $this->ordeBy = ""; // sin orden por defecto
        $this->where ="";
		
        tiempo( __FILE__ , __LINE__);
        foreach($this->atributos as $k=>$v) {
			// $this->$k = new objeto($this->atributos[$k]);
			// $this->$k = "";
			if ( ( $k != "where" ) && ( $k != "orderBy" ) ){ // atributos especiales.
				$this->columnas[]=$k;
			}
		}
        
        require_once 'Conectar.php';
        require_once 'objeto.php';
       
        $this->conectar=new Conectar($perfil);
        
		tiempo( __FILE__ , __LINE__);
        $this->db=$this->conectar->conexion();
		// $this->columnas = array(); // inicializacion de campos.
		if (! isset($this->where )) { $this->where="" ;} ;
		
		$this->crearObjetos();
		tiempo( __FILE__ , __LINE__);
	}
	
	public function idRecordset(){
		// ultimo valor adquirido del recodset actual
		// si no hay seleccionado uno devolvera null.
		if (is_null($this->idRecordset)){
			return false;
		}else{
			return $this->idRecordset;
		}
	}
	
	public function popiedades($nombreColumna,$propiedades){
		foreach($propiedades as $k=>$v){
			$this->objetos->$k = $v;
		}
	}
	private function crearObjetos(){
		// foreach ($this->columnas as $k=>$v){
			$this->objetos = new objeto($this->columnas);
			
		// }
		// $this->objetos["columnas"] = new objeto();
	}
	public function columns(){
		return $this->columnas ;
	}
		
    public function columnas (){ 
		return $this->columnas ;
	}
	public function error($rtnQuery,$strQuery){
		// controlador de errores de la base de datos.
		/*
		var_dump($this->conectar);
		echo "-------------------- esta pasando por aqui --------------" ;
		var_dump($rtnQuery);
		*/
		if ( !$rtnQuery  ){
			// el retorno es falso, falla de consulta.
			// sesion::set("msg","(".$this->con->errorCode.")".$this->con->errorInfo ."query:$strQuery" );
			trigger_error("(".$this->conectar->errorCode.")".$this->conectar->errorInfo ."consulta:$strQuery" , E_USER_ERROR);
			// crear un registro en blanco.
			$resultSet = new objeto ;
			foreach ( $this->columnas as $camop ) 
				$resultSet->$camop = "";
			
			return $resultSet ;
		}
		else{
			// la consulta esta correcta pero puede haber 0 resultados.
			// $rtnQuery->num_rows == 0 // significa que no hay resultados.
			if ($rtnQuery->num_rows == 0 ) {
				$rtnQuery = new objeto ;
				foreach ( $this->columnas as $camop ) 
					$rtnQuery->$camop = "";
			}
			return $rtnQuery ;
		}
	}

	/*
    protected function error(){
		// devuelve un mensaje con el error
		if ($this->errorCode){
			return "entidad: (".$this->errorCode.")".$this->db()->error ;
		}else{
			return false; // sin error.
		}
	}
	*/
	
    public function getConetar(){
        return $this->conectar;
    }
     
    public function query($query){
		// salvedad para utilizar con precacucion.
        return $this->db->query($query);
    }
     
    public function db(){
        return $this->db;
    }
    
	
			
    public function getAll($orden = "default" ,$inic=0,$cant=0 ){
		
		if ($orden == "default" ){ $orden = $this->ordeBy ; }
		
		// echo "sql:"."SELECT * FROM $this->table ORDER BY id DESC" ;
		if ($cant != 0 ){
			$limit = " LIMIT $inic , $cant ;";
		}else
			$limit ="";
		$strQuery="SELECT * FROM ".$this->table." ".$this->where ." $orden $limit" ;
		// echo "<p>$strQuery</p>";
        $query=$this->db->query($strQuery);
        // echo "SELECT * FROM $this->table $orden $limit" ;
        $resultSet = array();
        //Devolvemos el resultset en forma de array de objetos
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
           
        }
		$this->idRecordset = null;
        $this->paginn = count($resultSet);
        return $resultSet;
    }
    private function botonlistar($registro,$nombreID,$labelButon){
		/*
		  <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div><!-- /btn-group -->
      */
		$tx=<<<texto
				<div class="input-group-btn">
					
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						$labelButon<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="javascript:void(0)" >elige:</a></li>
						<li role="separator" class="divider"></li>
texto
;	
		foreach ($registro as $k=>$v){
			$js=" onclick=\"$('#$nombreID').val('$k');\" ";
			
			$tx = <<<textofor
$tx
						<li><a href="javascript:void(0)" $js >$v</a></li>
textofor
;
		}
			$tx = <<<textoultm
$tx
					</ul>
				</div><!-- /btn-group -->
textoultm
;
		return $tx;
    }
    // html es una herramienta eredada del momento de renderizado.
    public function mostrar_editar($campo,$html=null,$valor=null){
		// funcion que devuelve un contenido html
		// para la edicion del campo.
		tiempo( __FILE__ , __LINE__);
		require_once("EntidadBaseFormularios.php");
		$for=new EntidadBaseFormularios();
		
		$txt="";
		$tabulador="\n".str_repeat("\t",4);
		if (in_array($campo,$this->columnas)){
			// el campo existe:
			$atr = $this->atributos[$campo] ;
			$extra="";
			if (!isset($valor))
				$valor = ( $this->$campo != "NULL" )?$this->$campo:"";
			
			if ($atr["dbtipo"] == "not null"){
				$extra = "required=\"required\"" ;
			}
			$placeholder = isset($atr["comenta"])?$atr["comenta"]:$campo ;
			$label=isset($atr["label"])?$atr["label"]:$placeholder;
			$lista=array();
			if (isset($atr["list"])){
				// arreglo de valores a listar en un desplegable.
				foreach( $atr["list"] as $v)$lista[$v]=$v;
			}
			if (isset($atr["sql"])){
				// $tiempoInicial = microtime(TRUE);
				// echo "new db.".$atr["sql"][1]."..<br>\n";
				// $ls = new $this->db;
				$ls = $this->db->query($atr["sql"][1]);
				if ( is_null($ls) ){
					// echo "null: ".$atr["sql"][1]."\n";
				}else{
					tiempo( __FILE__ , __LINE__);
					while ($row = $ls->fetch_object()) {
						$lista[$row->{$atr["sql"][0]}]=$row->{$atr["sql"][2]};
					}
					tiempo( __FILE__ , __LINE__);
				}
			}
			$txt.=$for->{$atr["typeform"]}($campo,$valor,$tabulador,$placeholder,$extra,$lista);
			/*
			switch( $atr["typeform"] ){
				case "text" : $txt.="$tabulador<input type=\"text\" class=\"form-control\" "
					."placeholder=\"$placeholder\" name=\"$campo\" $extra value=\"$valor\" >\n";
					break;
				
				case "textarea" : $txt.="$tabulador<textarea class=\"form-control\" "
					."name=\"$campo\" $extra >$valor</textarea>\n";
					break;
				
				case "numerico" :$txt.="$tabulador<input type=\"number\" class=\"form-control\" "
					."placeholder=\"$placeholder\" name=\"$campo\" $extra value=\"$valor\">\n";
					break;
					
				case "moneda" :
					// si quisiera sacar los botones de aumentar y disminuir hay que agregar en <div class="hide-inputbtns">
					$txt.="$tabulador<input type=\"number\" class=\"form-control\" "
						. "step=\"0.01\" data-number-to-fixed=\"2\" data-number-stepfactor=\"100\" class=\"form-control currency\" "
						."placeholder=\"$placeholder\" name=\"$campo\" $extra value=\"$valor\">\n";
					break;
				case "list" :
					$txt.="$tabulador<input type=\"text\" class=\"form-control\" id=\"$campo\" "
						."placeholder=\"$placeholder\" name=\"$campo\" $extra value=\"$valor\">\n".
						$this->botonlistar($lista,$campo,$label) ;
					break;
				
				case "relacional" :
					
					$txt.="$tabulador<input type=\"text\" class=\"form-control\" id=\"$campo\" "
						."placeholder=\"$placeholder\" name=\"$campo\" $extra value=\"$valor\">\n".
						$this->botonlistar($lista,$campo,$label) ;
					break;
				
				case "hidden" :
					// verificar si hay valor..
					if ($valor !=""){
						$txt.="$tabulador<input type=\"hidden\" class=\"form-control\" "
						." name=\"$campo\" $extra value=\"$valor\" ><div class=\"form-control\" >$valor</div>\n";
					}
					break;
					
				case "fechahora" :$txt.= <<<JAVAS
				<div class="well">
					<div id="$campo" class="input-append date">
						<input type="text" data-format="MM/dd/yyyy HH:mm:ss PP" class="form-control" name="$campo" $extra value="$valor" >
						<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
						</span>
					</div>
				</div>
JAVAS
;
				// debo colocar el java a lo ultimo de la pagina
				// para ello voy a intentar utilizar el recurso que debe estar
				// disponible al llenar la plantilla $html.
				  $html->javascript("$(function() { $('#$campo').datetimepicker({ language: 'es', pick12HourFormat: true }); } );");
				break;
					
				default : $txt.="$tabulador<input type=\"text\" class=\"form-control\" "
					."placeholder=\"$placeholder\" name=\"$campo\" $extra tipo=\""
					.$atr["typeform"]."\" value=\"$valor\" \">\n";
					break;
			}
			*/
			if (isset($atr["htmlfirst"])){
				$txt= $tabulador.$atr["htmlfirst"].$tabulador.$txt ;
			}
			if ( isset($atr["clas"] )){
				$txt = "$tabulador<span class=\"".
					$atr["clas"]."\">$label</span>$tabulador $txt" ;
			}
			
			if (isset($atr["htmllast"])){
				$txt="$txt $tabulador".$atr["htmllast"]."\n" ;
			}
			$txt = "
				<div class=\"input-group\" >
					$txt
				</div>";
			tiempo( __FILE__ , __LINE__);
			return $txt;
		}else{
			return "<div>->$campo<-</div>";
		}
	}
    public function getById($id){
		tiempo( __FILE__ , __LINE__);
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");
		// var_dump($query);
		if (!$query ){ // query es false ( error o no hay registros. )
			$query=$this->db->query("SELECT * FROM $this->table LIMIT 1; ");
			// POR FALLA devuelvo el 1ª objeto obtenido.
		}

		if($row = $query->fetch_object()) {
		   $resultSet=$row;
		}else {
			// crear un registro en blanco.
			$resultSet = new objeto ;
			foreach ( $this->columnas as $camop ) 
				$resultSet->$camop = "";
		}	
		return $resultSet;
		
    }
    public function checkForm($post){
		$chk=true;$fail=array();
		foreach($this->columnas as $campo){
			if (array_key_exists($campo,$post)){
				// buen camino.
				$this->$campo = $post[$campo];
			}else{
				// mal caminio. 
				// verificar si es necesario. ( null )
				if ( $this->atributos[$campo]["dbtipo"] == "not null" 
					// el id es de tipo autoincrement. ( unico de su tipo. )
				){
					$chk=false; // falla de comprobacion.
					$fail[]=$campo;
				};
				if ($this->atributos[$campo]["dbtipo"] == "default"){
					// tiene valor por defecto.
					$this->$campo  = $this->atributos[$campo]["dbdefault"]
;				}
				
			}
		}
		return array($chk,$fail);
	}
	
    public function guardarform($post,$add=false){
		// obtener los datos de $_POST, verificar y gardar
		$checer=true;
		list($checer,$fail)=$this->checkForm($post);
		if ($checer and $add ){
			// agregar. nuevo
			// echo "agregando\n";
			$idSalida=$this->add();
			
		}elseif ( $checer ){
			// editar existente.
			if (isset($this->id) and ($this->id != "")){
				$idSalida=$this->save();
			}else{
				// la salida. por error de campo.
				$idSalida=$fail;
			}
		}else{
			// falla por algo:
			$checer=array($checer,$fail);
		}
		//var_dump(array($checer,$idSalida));
		return array($checer,$idSalida);	
	}
    public function save(){
		// funcion que guarda todo el registro:
		// echo "guardando....";
		$id = $this->id;
		// echo "id=$id<br>\n";
		foreach( $this->columnas as $col){
			// echo "<div>$col valor: ".$this->$col." ($id) </div>\n";
			$this->setById($col,$this->$col,$id);
		}
		// retorno el id al que he guardado.
		return $id;
	}
	
    public function setById($comlumn,$value,$id){
		// UPDATE 'c0740032_algo'.'ciudad' SET 'habitantes' = '15030' WHERE 'ciudad'.'id' =13;
        
			// echo "---------;".$this->{$this->table}["id"].";-----"; 
			// var_dump($this);
        if (strlen($id)>0 ) {
			$sql="UPDATE $this->table SET `$comlumn` = '$value' WHERE id=$id LIMIT 1 ;";
			 $query=$this->db->query($sql );
			// vardump($this->db());
			// debugf( "<div>::$sql::(EntidadBase:54)</div>" ) ;
			
			if($query) {
			   $resultSet=true; // se actualizo
			   // debugf("EntidadBase: (true)-".$this->table."->$sql<--ok<br>\n");
			   // debugf("(ok)<br>\n");
			}else{
				$resultSet=false; // fallo el campo.
				debugf("EntidadBase:setById (false)-".$this->db->error."<br>\n");
			 }
			return $resultSet;
		}else
			return false;
    }
	public function mostrar($campo,$valor) {
		// limita a una condicion simple de consulta
		static $bandera=true; // iteraccion de inicio.
		static $query;
		static $posicion=0;
		if ($bandera){
			// echo "entrando $posicion";
			// primera vuelta verificar estado y comenzar.
			$sql= "SELECT * FROM $this->table WHERE $campo='$valor' ;";
			$query=$this->db->query($sql);
			if (!$query){
				// falla de consulta.
				// falla de consulta
				echo "falla de sistema . ";
				echo $this->db()->error;
				$this->idRecordset=null;
				exit ;
			};
			$posicion=0;
			$bandera=false;
		}
		// cargando la primera buelta de objetos:
		 //Devolvemos el resultset en forma de array de objetos
		$move= $query->data_seek($posicion);
		if ($move){
			$posicion++;
			$row = $query->fetch_object()  ;
			{
			// var_dump($row);
			if (!isset($row->$campo)){
				return false; // no existe el campo.
			}else{
					
				if ($row->$campo == $valor){
					// echo "encontrado :$campo \"$valor\" ";
					 foreach($row as $k=>$v){
						// esto asigna los valores encontrados al entorno general.
						$this->$k = $v;
						if ($this->atributos[$k]["dbtipo"]=="autoincrement"){
							// clave id:
							$this->idRecordset = $v ;
						}
						// echo "asignado $k = $v <br>\n";
					}
					// $this->$row; // valores para todos los campos.
					return $row ; // valor encontrado
				}else{
					// echo "\"" . $row->$campo."\" != \"$valor\"<br>\n" ;
				}
					
				}
			
			}
		}else{
			$bandera=true; // reiniciar el funcionamiento.
			return false;
		}	
	}
		
    public function getBy($column,$value){
        $sql= "SELECT * FROM $this->table WHERE $column='$value' ;";
        // $sql= "SELECT * FROM $this->table WHERE idMesa='5' ;";
        // echo $sql;
        $query=$this->db->query($sql);
		if ($query){
			if ($query->num_rows > 0 ){
				while($row = $query->fetch_object()) {
				   $resultSet[]=$row;
				   if ($this->atributos[$k]["dbtipo"]=="autoincrement"){
						// clave id:
						$this->idRecordset = $v ;
					}
				}
			}else{
				$resultSet = array();
			}
		}else{
			// falla de consulta
			echo "falla de sistema . ";
			echo $this->db()->error;
			$this->idRecordset=null;
			exit ;
		}
		// echo "error ";
				
        return $resultSet;
    }
     
    public function deleteById($id){
		$sql="DELETE FROM ".$this->table." WHERE id='$id' limit 1, 1 ;";
		// echo $sql."\n<br>";
        // ejecutando la consulta.
        $query=$this->db->query($sql); 
        if (!$query){
			// falla de consulta
			echo "falla de sistema . ";
			echo $this->db()->error;
			exit ;
		}
		$this->idRecordset=null;
        return $query;
        
    }
     
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        $this->idRecordset=null;
        return $query;
        
    }
     
 
    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
	public function buscar($campo,$valor,$especial=''){
		$cmd="SELECT * FROM $this->table $this->where ORDER BY id DESC";
		$query=$this->db->query($cmd);
        $query= $this->error($query,$cmd);
        $rt = false;
		// echo $cmd;
        //Devolvemos el resultset en forma de array de objetos
        while ( $row = $query->fetch_object() ) {
			// var_dump($row);
			if (!isset($row->$campo)){
				
				return false; // no existe el campo.
			}else{
				
				if ($row->$campo == $valor){
					// echo "encontrado :$campo \"$valor\" ";
					 foreach($row as $k=>$v){
						// esto asigna los valores encontrados al entorno general.
						$this->$k = $v;
						if ($this->atributos[$k]["dbtipo"]=="autoincrement"){
							// clave id:
							$this->idRecordset = $v ;
						}
						// echo "asignado $k = $v <br>\n";
					}
					// $this->$row; // valores para todos los campos.
					return $row ; // valor encontrado
				}else{
					// echo "\"" . $row->$campo."\" != \"$valor\"<br>\n" ;
					// return false;
				}
				
			}
		}
		return false ;
	}
	
	// para que funcion debe escribir estas funciones
	// en cada entidad .
	// ya que en este ambiente no existen los valores de campo.
	
	public function __set($campo,$valor){
		if(in_array($campo,$this->columnas)){
			// $this->columnas[$campo] ;
			$this->$campo = $valor ;
			return $valor;
		}
		return false;
	}	
    public function __get($campo){
		if ( in_array($campo,$this->columnas)){
			if (isset($this->$campo)){
				$t=$this->$campo;
				if ($t="") $t="NULL"; // devolver el TEXTO NULL
				// echo "campo obtenido:$t<br>\n";
				return $this->$campo;
			}else{
				debugf("entidadBase:__get no hay valor asignado para $campo");
				// echo "valor $campo :";var_dump($this->$campo);
				// echo "campo no seteado (val invalido) $campo\n";
				return "NULL"; // no hay informacion 
			}
		}else
			return false;
	}
	
	public function SetOrderBy($intruccion ) {
		// forma de ordenamiento.
		$this->ordeBy = $intruccion ;
	}
	public function GetOrderBy(){
		// forma actual del ordenamiento
		return $this->orderBy ;
	}	
		
	public function limpiarCampos(){
		// antes de todo todos los valores a null
		foreach ($this->columnas as $k=>$v){
			$this->$v = '';
		}
		
	}
		
	public function count(){
		// echo "sql:"."SELECT * FROM $this->table ORDER BY id DESC" ;
					
        $query=$this->db->query("SELECT count(*) as cantidad FROM $this->table ");
        // echo "SELECT * FROM $this->table $orden $limit" ;
         $resultSet = array();
        //Devolvemos el resultset en forma de array de objetos
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        // respondo la cantidad total de registro de la tabla.
        return $resultSet[0]->cantidad ;
    }
    
	public function contar($orden = "default" ,$cant=0,$inic=0 ){
		if ($orden = "default" ){ $orden = $this->ordeby ; }
		
		// echo "sql:"."SELECT * FROM $this->table ORDER BY id DESC" ;
		if ($cant != 0 ){
			$limit = " LIMIT $inic , $cant ;";
		}else
			$limit ="";
		$cmd="SELECT count(*) as contar FROM ".$this->table ." " . $orden ." ". $this->where ." ". $limit;
		
        $query=$this->db->query($cmd);
        // echo $cmd ;
        // echo "SELECT * FROM $this->table $orden $limit" ;
        if ($query) { 
         $resultSet = $query->fetch_object();
        } else {
			$this->error($query,$cmd);
			// echo "falla de sistema . ";
			// echo $this->db()->error;
			// exit ;
		}
        // var_dump($resultSet->contar );
        return $resultSet->contar ;
    }
	/*
	 * AGREGAR NUEVO REGISTRO. 
	 */
	public function add(){
		// agregar un registro nuevo.
		$t="" ;
		
		foreach($this->columnas as $campo ) {
			if ($campo != "id") {
				if ($this->$campo == '' or $this->$campo == "NULL" ){
					if (isset($this->atributos[$campo]["dbdefault"])){
						$t .= " '".$this->atributos[$campo]["dbdefault"]."' ," ;
					}else{
						$t .= " NULL ," ;
					}
				}else
					$t .=  "'".$this->$campo."'," ;
			}
		}
		// quitando la ultima coma.
		$t=substr($t,0,strlen($t)-1);
		
        $query="INSERT INTO ".$this->table." (".implode(", ",$this->columnas).")
                VALUES(NULL, $t );";
        // echo $query;
        
        $save=$this->db()->query($query);
        if ($save){
			$save = $this->db()->insert_id;
			//clave id:
			// echo $save;
			$this->idRecordset = $save;
		}
		else{
			echo $this->db()->error;
			$save=$this->db()->error;
			$this->idRecordset=null;
		}
        
        return $save;
    }
 
}
