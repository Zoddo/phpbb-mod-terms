<?php
/**
*
* Modification of Terms of Use [French]
*
* @package language
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_TERMS_NAME'			=> 'Modification des conditions d’utilisation',
	'ACP_TERMS_CONFIG_EXPLAIN'	=> 'Cette page vous permet de modifier les conditions d’utilisation.',
	'ACP_TERMS_TYPE'			=> 'Types de conditions d’utilisation ',
	'ACP_TERMS_TYPE_DEFAUT'		=> 'Par défaut',
	'ACP_TERMS_TYPE_POST'		=> 'Message',
	'ACP_TERMS_TYPE_USER'		=> 'Tel que défini',
	'ACP_TERMS_TYPE_EXPLAIN'	=> '- Choisissez «Par défaut» pour laisser les conditions d’utilisation par défaut.<br />- Choisissez «Message» pour utiliser le contenu d’un message comme conditions d’utilisation.<br />- Choisissez «Tel que défini» pour utiliser le texte écrit dans la case juste en dessous comme conditions d’utilisation.',
	'ACP_TERMS_TOPIC'			=> 'ID du message des conditions d’utilisation',
	'ACP_TERMS_TOPIC_EXPLAIN'	=> 'Si vous avez choisi «Message» juste au dessus, entrez ici l’ID du message à utiliser comme conditions d’utilisation.',
	'ACP_TERMS_PREFILL'			=> 'Préremplir avec les conditions d’utilisation par défaut',
	'ACP_TERMS_EDIT'			=> 'Conditions d’utilisation ',
	'ACP_TERMS_EDIT_EXPLAIN'	=> 'Si vous avez choisi «Tel que défini» juste au dessus, entrez les conditions d’utilisation à afficher ici. Vous pouvez préremplir la case avec les conditions d’utilisation par défaut de phpBB en cliquant sur le bouton «Préremplir avec les conditions d’utilisation par défaut».',
));

$lang = array_merge($lang, array(
	'LOG_TERMS_UPDATE'			=> '<strong>Les conditions d’utilisation ont été mises à jour</strong>',
	'LOG_TERMS_TOPIC_NOT_FOUND'	=> 'Le message ayant l’ID <strong>%1$d</strong> est introuvable.<br />» Remise en place des conditions d’utilisation par défaut pour la langue <strong>%2$s</strong>.',
));

?>