<?php

/**
* 
*/
class Cart_test extends CI_Controller
{
	/*
	function __construct()
	{
		# code...
	}
	*/

	function add()
	{
		
		$data = array(
			'id'      => '42',
			'qty'     => 1,
			'price'   => '19.99',
			'name'    => 'Pents',
			'options' => array('Size' => 'medium', 'Color' => 'Red')
		);
		
		$this->cart->insert($data);
		
		echo "add() called";

	}

	function show()
	{
		$cart = $this->cart->contents();

		echo "<pre>";

		print_r($cart);
	}

	function add2()
	{
		$data = array(
			'id'      => '12',
			'qty'     => 2,
			'price'   => '7.99',
			'name'    => 'T-Shirt',
			'options' => array('Size' => 'large', 'Color' => 'Red')
		);
		
		$this->cart->insert($data);
	}

	function update()
	{
		$data = array(
			'rowid' => 'b6b2739bb32c9d6ded3489e3af6016c8',
			'qty'   => 1
		);
		
		$this->cart->update($data);
		echo "update() called";
	}

	function total()
	{
		echo $this->cart->total();
	}

	function remove()
	{
		$data = array(
			'rowid' => 'b6b2739bb32c9d6ded3489e3af6016c8',
			'qty'   => 0
		);
		
		$this->cart->update($data);
		echo "remove() called";
	}

	function destroy()
	{
		$this->cart->destroy();
		echo "destroy() called";

	}
}

?>