<?php 
/**
 * 
 */
class produtocontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('produto');
	}
	
}