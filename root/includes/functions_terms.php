<?php
/**
*
* @package function Modification of Terms of Use
* @version $Id$
* @copyright (c) 2013 Zoddo
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

//Update the configuration
function terms_update($lang, array $sql_ary)
{
	global $db, $cache, $config;
	
	// Check if installed
	if(!isset($config['terms_version']))
	{
		return false;
	}

	$sql = 'UPDATE ' . LANG_TABLE . '
		SET ' . $db->sql_build_array('UPDATE', $sql_ary) . "
		WHERE lang_dir = '" . $db->sql_escape($lang) . "'";
	$db->sql_query($sql);
	
	if(($cache_ary = $cache->get('terms')) === false || is_array($cache_ary) || is_array($cache_ary[$lang]))
	{
		$cache_ary[$lang] = array();
		$cache->put('terms', $cache_ary);
	}
	$cache->put('terms',array($lang => $sql_ary + $cache_ary[$lang]));
}

//Get the configuration
function terms_get($value)
{
	global $db, $cache, $user, $config;
	
	// Check if installed
	if(!isset($config['terms_version']))
	{
		return false;
	}
	
	$cache_ary = $cache->get('terms');
	if(!isset($cache_ary[$user->data['user_lang']][$value]))
	{
		$sql = 'SELECT * FROM ' . LANG_TABLE . "
			WHERE lang_dir = '" . $db->sql_escape($user->data['user_lang']) . "'";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		$cache_ary[$user->data['user_lang']][$value] = $row[$value];
		$cache->put('terms', $cache_ary);
	}

	return $cache_ary[$user->data['user_lang']][$value];
}

//Get the key language 'TERMS_OF_USE_CONTENT' in a language other than the user
function terms_get_defaut_terms($dir)
{
	global $config, $phpbb_root_path, $phpEx;

	require($phpbb_root_path.'language/'.$dir.'/ucp.'.$phpEx);
	$return = trim($lang['TERMS_OF_USE_CONTENT']);
	$return = str_replace(array('<br />', "\n", "\r", "'"), array('', '\n', '', "\'"), $return);
	$return = sprintf($return, $config['sitename'], generate_board_url());
	return preg_replace('#<a href="(https?://[a-zA-Z0-9.-]+.+)">(.+)</a>#iU', '[url=$1]$2[/url]', $return);
}