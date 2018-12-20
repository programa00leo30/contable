<?php

class mkt
{

	private $api;
	private $perfil;
	private $perfilConect;
	
	public function __construct($perfilConect){
		// perfil es un arreglo que contiene 
		// ip de mkt
		// usuario y clave de accesso.
		$this->api= new RouterosAPI();
		$this->perfilConect = $perfilConect;
		
	}

	private function conectar(){
		
		return ($this->api->connect(
			$this->perfilConect["ip"]
			,$this->perfilConect["user"]
			,$this->perfilConect["pass"])
		); 
	}
		
	public function agregarClienteDHCP($id,$nombre,$perfil=array())
	{
		if (count($perfil)>0)
			$this->perfil = $perfil ;
		
		$this->api->debug = false;

		if ($this->conectar()) {

		   $ARRAY = $this->api->comm("/ip/dhcp-server/lease/print", array(
			  // "count-only"=> "",
			  "?dynamic"=> "yes",
			  // "~active-address" => "172.20.",
			  // "~active-address" => "1.1",
		   ));
		   
			foreach ($ARRAY as $n=>$li){
				$rt1=$this->api->comm("/ip/dhcp-server/lease/make-static",array(
					"numbers"=>$li[".id"],
					)
				);
				print_r($rt1);
				$rt2=$this->api->comm("/ip/dhcp-server/lease/set",array(
					"numbers"=>$li[".id"],
					"address-lists" => "cliente",
					"comment" => "agregado automaticamente",
					)
				);
				print_r($rt2);
				$perfil["target"] = $li["active-address"];
				
				$rt3= $this->api->comm("/queue/simple/add",$pefil);
				print_r($rt3);
				/*
				array(
					// .id=*4d6
					// "bucket-size"=>"0.1/0.1",
					"burst-limit"=360k/1500k
					"burst-threshold"=128k/750k
					"burst-time"=3m/3m
					"comment"=
					"limit-at"=350k/1200k
					"max-limit"=350k/1200k
					"name"=dhcp-ds<00:15:6D:8C:F5:46>
					"packet-marks"=
					"parent"=none
					"priority"=8/8
					"queue"=default-small/default-small
					"target"=172.20.11.106/32
					
					));
				*/
				
				
			
			}
			
		   $this->api->disconnect();

		}

	}
}

