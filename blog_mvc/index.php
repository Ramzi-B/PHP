<?php

	require_once 'Controler/frontend.php';

	try {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 'listPosts') {
				listPosts();
			} elseif ($_GET['action'] == 'post') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					post();
				} else {
					throw new Exception('Aucun identifiant de billet envoyé !');
				}
			} elseif ($_GET['action'] == 'addComment') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					
				}
			}
		}	else {
			listPosts();
		}
	} catch (Exception $e) {
		$errorMessage = $e->getMessage();
		require 'view/errorView.php';
	}
