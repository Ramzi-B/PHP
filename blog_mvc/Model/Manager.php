<?php

namespace hackawax\blog_mvc\Model;

class Manager
{
	/**
	*  @return PDO
	*/
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=tp_blog_mvc;charset=utf8', 'root', 'rboxer');
		return $db;
	}
}
