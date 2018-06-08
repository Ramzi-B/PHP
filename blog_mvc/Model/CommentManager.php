<?php

namespace hackawax\blog_mvc\Model;
require_once 'Manager.php';

class CommentManager extends Manager
{
	/**
	 * @param $postId
	 * @return \PDOStatement
	 */
	public function getComments($postId) {
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\')
																	AS comment_date_fr
																FROM comments
															 WHERE post_id = ?
														ORDER BY comment_date DESC');
		$comments->execute([$postId]);

		return $comments;
	}

	/**
	 * @param $postId
	 * @param $author
	 * @param $comment
	 * @return bool
	 */
	public function postComment($postId, $author, $comment) {
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?,?,?, NOW())');
		$affectedLines = $comments->execute([$postId, $author, $comment]);

		return $affectedLines;
	}
	
}
