<?php

	namespace hackawax\blog_mvc\Model;
	require_once 'Manager.php';

	class PostManager extends Manager
	{

		public function getPosts()
		{
			$db = $this->dbConnect();
			$req = $db->query('SELECT id, title, content, DATE_FORMAT(created_at, \'%d/%m/%Y à %H:%i\')
														 AS created_at_fr
													 FROM posts
											 ORDER BY created_at
										 DESC LIMIT 0, 5');
			return $req;
		}

		public function getPost()
		{
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_at, \'%d/%m/%Y à %H/%i\')
															 AS created_at_fr
														 FROM posts
														WHERE id = ?');
			$req->execute([$postId]);
			$post = $req->fetch();
			return $post;
		}

	}
