<?php
class DogBreeds extends CI_Controller {

	public function __construct(){
		parent::__construct();
		header("Content-Type: text/html; charset=utf-8");
		$this->load->model('DogBreedsModel');
		
	}

	public function index(){
		$ret = $this->DogBreedsModel->getBreeds('');
		$this->load->view('templates/header');
		$this->load->view('dogBreeds/index', $ret);
	    $this->load->view('templates/footer');
	}

	public function view($breedName)
	{

        $decodedName = rawurldecode($breedName);

		$ret = $this->DogBreedsModel->getBreeds($decodedName);

// 		if (empty($data['breedInfo']))
// 		{
// 			show_404();
// 		}

// 		$data['DOG_BREED_NAME'] = $data['breedInfo']['DOG_BREED_NAME'];
// 		$data['VIDEO_URL'] = $data['breedInfo']['VIDEO_URL'];
		

		$this->load->view('templates/header');
		$this->load->view('dogBreeds/view', $ret);
		$this->load->view('templates/footer');
		
		
	}
	

}