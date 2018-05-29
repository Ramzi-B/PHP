<?php

require_once 'Model/CommentManager.php';
require_once 'Model/PostManager.php';

function listPosts()
{
    $postManager = new hackawax\blog_mvc\Model\PostManager;
    $posts = $postManager->getPosts();

    require 'View/frontend/listPostsView.php';
}

function post()
{
}

function addComment()
{
}
