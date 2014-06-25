<?php
require_once '../config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/DogBreed.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/DogBreedsSvcImpl.php';


class DogBreedsModel extends CI_Model {

	private $svc;
	
	public function __construct(){
		$this->load->database();
		$this->svc = new DogBreedsSvcImpl();
	}

	public function getBreeds($breedName = FALSE){

			$beans=$this->svc->selecciona('', 0, 100);
			$cuenta=$this->svc->seleccionaCuenta('');
			
// 			$query = $this->db->get('DOG_BREEDS');
// 			return $query->result_array();
// 			return $svc->
            $ret=array();
            $ret['data']=$beans;
            $ret['cuenta']=$cuenta;
            return $ret;
// 		}

// 		$query = $this->db->get_where('DOG_BREEDS', array('DOG_BREED_NAME' => $breedName));
// 		return $query->row_array();
	}
	
	public function getBreed($breedName){
	
		$beans=$this->svc->selecciona('', 0, 100);
		$cuenta=$this->svc->seleccionaCuenta('');
			
		// 			$query = $this->db->get('DOG_BREEDS');
		// 			return $query->result_array();
		// 			return $svc->
		$ret=array();
		$ret['data']=$beans;
		$ret['cuenta']=$cuenta;
		return $ret;
		// 		}
	
		// 		$query = $this->db->get_where('DOG_BREEDS', array('DOG_BREED_NAME' => $breedName));
		// 		return $query->row_array();
	}	
}