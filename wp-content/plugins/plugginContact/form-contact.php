<?php
/*
Plugin Name: plugin form contact

*/

	function form_contact()
	{
		$content = '';
		$content .= '<h2>Contactez nous </h2>';
		$content .= '<form method="POST" action="http://localhost/PlugginWordpress/index.php/accueil/" />';
		$content .= '<label for="nom"> Nom </label>';
		$content .= '<input type="text" name="nom" class="form-control" placeholder="Entrer votre nom"/>';
		$content .= '<label for="email"> Email </label>';
		$content .= '<input type="email" name="email" class="form-control" placeholder="Entrer votre email"/>';

		$content .= '<label for="message"> Message </label>';
		$content .= '<input type="textarea" name="message" class="form-control" placeholder="Entrer votre message"/>';

		$content .= '<br/> <input type="submit" name="envoyer" class="btn btn-md btn-primary" value="Envoyer"/>';
		$content .= '</form>';
		return $content;

	}

	add_shortcode('contact_form', 'form_contact');

	function form_capture()
	{
		if (isset($_POST['envoyer'])) 
		{
			$nom = sanitize_text_field($_POST['nom']);
			$email = sanitize_text_field($_POST['email']);
			$message = sanitize_text_field($_POST['message']);

			$to = 'thiatatou@gmail.com';
			$objet = 'Test de connexion';
			$mes = ''.$nom.' - '.$email.' - '.$message;

			wp_mail($to, $objet, $mes);
		}
	}
	add_action('wp_head', 'form_capture');
