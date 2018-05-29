<?php

require_once 'Model/CommentManager.php';
require_once 'Model/PostManager.php';

function listPosts()
{
	$postManager = new Hackawax\blog_mvc\Model\PostManager();
	$posts = $postManager->getPosts();

	require 'View/frontend/listPostsView.php';
}

/**
 * [post description]
 * @return [type] [description]
 */
function post()
{
	$postManager = new Hackawax\blog_mvc\Model\PostManager();
	$CommentManager = new Hackawax\blog_mvc\Model\CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $CommentManager->getComments($_GET['id']);

	require 'View/frontend/postView.php';
}

/**
 * @param $postId
 * @param $author
 * @param $comment
 * @throws Exception
 */
function addComment($postId, $author, $comment)
{
	$CommentManager = new Hackawax\blog_mvc\Model\CommentManager();
	$affectedLines = $CommentManager->postComment($postId, $author, $comment);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
  	} else {
			header('Location: index.php?action=post&id=' . $postId);
	}
}
