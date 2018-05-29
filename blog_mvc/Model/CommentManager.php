<?php

    namespace hackawax\blog_mvc\Model;

require_once 'Manager.php';

    class CommentManager extends Manager
    {
        public function getComments($postId)
        {
            $db = $this->dbConnect();
        }

        public function postComments($postId, $author, $comment)
        {
            $db = $this->dbConnect();
        }
    }
