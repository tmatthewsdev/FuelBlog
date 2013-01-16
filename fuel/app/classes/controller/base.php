<?php

class Controller_Base extends Controller_Hybrid
{
	public function before()
	{
		parent::before();
	}


	public function redirect($location, $type = null, $message = null)
	{
		if (! is_null($type) and ! is_null($message))
		{
			Session::set_flash($type, $message);
		}

		Response::redirect($location);
	}
}