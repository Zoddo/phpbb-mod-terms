<?php
/**
*
* Modification of Terms of Use [English]
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
	'ACP_TERMS_NAME'			=> 'Modification of terms of use',
	'ACP_TERMS_CONFIG_EXPLAIN'	=> 'This page allows you to modify terms of use',
	'ACP_TERMS_TYPE'			=> 'Type of terms of use',
	'ACP_TERMS_TYPE_DEFAUT'		=> 'By default',
	'ACP_TERMS_TYPE_POST'		=> 'Post',
	'ACP_TERMS_TYPE_USER'		=> 'Such as defined',
	'ACP_TERMS_TYPE_EXPLAIN'	=> '- Choose “By default” to leave the default terms of use<br />- Choose “Post” to use the contents of a post as terms of use.<br />- Choose “Such as defined” to use the written text below as terms of use.',
	'ACP_TERMS_TOPIC'			=> 'ID of post of terms of use',
	'ACP_TERMS_TOPIC_EXPLAIN'	=> 'If you chose “Post” below, type here the ID of the message to use as terms of use.',
	'ACP_TERMS_PREFILL'			=> 'Pre-fill with default terms of use',
	'ACP_TERMS_EDIT'			=> 'Terms of use',
	'ACP_TERMS_EDIT_EXPLAIN'	=> 'If you chose “Such as defined” below, type terms of use to post here. You can pre-fill the input with default terms of use of phpBB by clicking on the button “Pre-fill with default terms of use”.',
));

$lang = array_merge($lang, array(
	'LOG_TERMS_UPDATE'			=> '<strong>Terms of use have been updated</strong>',
	'LOG_TERMS_TOPIC_NOT_FOUND'	=> 'Missing post having the ID <strong>%d</strong>.<br />» Putting back default terms of use of the language : <strong>%s</strong>.',
));

?>