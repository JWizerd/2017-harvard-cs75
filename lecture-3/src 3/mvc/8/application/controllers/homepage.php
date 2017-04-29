<?php

class Homepage extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header', array('title' => 'CS164'));
		$this->load->view('homepage/index');
		$this->load->view('templates/footer');
	}

	public function lectures()
	{
		$this->load->view('templates/header', array('title' => 'Lectures'));
		$this->load->view('homepage/lectures');
		$this->load->view('templates/footer');
	}

	public function lecture($n)
	{
		$this->load->view('templates/header', array('title' => 'Lecture ' . $n));
		$this->load->view('homepage/lecture', array('n' => $n));
		$this->load->view('templates/footer');
	}
}

?>
