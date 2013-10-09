<?php
/**
*
* @package acp Modification of Terms of Use
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

/**
* @package acp
*/
class acp_terms
{
	function main($id, $mode)
	{
		global $template, $config, $user, $db, $phpbb_root_path, $phpEx;

		$this->page_title = 'ACP_TERMS_NAME';
		$this->tpl_name = 'acp_terms';

		if(!function_exists('terms_get'))
		{
			include($phpbb_root_path.'includes/functions_terms.'.$phpEx);
		}
		
		$update = request_var('update', '');


		if(empty($update))
		{
			$template->assign_vars(array(
				'TITLE'			=> $user->lang['ACP_TERMS_NAME'],
				'TITLE_EXPLAIN'		=> $user->lang['ACP_TERMS_CONFIG_EXPLAIN']
			));

			$sql = 'SELECT *
				FROM ' . LANG_TABLE . '
				ORDER BY lang_english_name';
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				decode_message($row['terms'], $row['terms_bbcode_uid']);
			
				$template->assign_block_vars('lang', array(
					'ID'			=> $row['lang_id'],
					'ISO'			=> $row['lang_iso'],
					'DIR'			=> $row['lang_dir'],
					'NAME'			=> $row['lang_local_name'],
					'TERMS_DEFAUT'		=> ((int)$row['terms_display'] == TERMS_DISP_DEFAUT) ? true : false,
					'TERMS_USER'		=> ((int)$row['terms_display'] == TERMS_DISP_USER) ? true : false,
					'TERMS_POST'		=> ((int)$row['terms_display'] == TERMS_DISP_POST) ? true : false,
					'TERMS_POST_ID'		=> $row['terms_post'],
					'DEFAUT_TERM'		=> terms_get_defaut_terms($row['lang_dir']),
					'TERMS'				=> $row['terms'],
				));
			}
			$db->sql_freeresult($result);

		}
		else
		{
			$config_type = request_var('type', array('' => 0));
			$config_post = request_var('post', array('' => 0));
			$config_user = request_var('terms', array('' => ''), true);
			
			//Verifications
			foreach($config_type as $lng => $val)
			{
				if($val == TERMS_DISP_USER)
				{
					if(utf8_clean_string($config_user[$lng]) === '')
					{
						$config_type[$lng] = TERMS_DISP_DEFAUT;
						$config_user[$lng] = '';
					}
				}
				else if($val == TERMS_DISP_POST)
				{
					$sql = 'SELECT COUNT(post_id) AS count
						FROM ' . POSTS_TABLE . '
						WHERE post_id = '.(int) $config_post[$lng];
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);
					if(empty($row['count']))
					{
						$config_type[$lng] = TERMS_DISP_DEFAUT;
					}
				}
				else if($val != TERMS_DISP_DEFAUT)
				{
					$config_type[$lng] = TERMS_DISP_DEFAUT;
				}
			}
			
			//Storage
			foreach($config_type as $lng => $val)
			{
				$sql_ary = array(
					'terms_display'	=> (int) $val,
				);

				terms_update($lng, $sql_ary);
			}

			foreach($config_post as $lng => $val)
			{
				$sql_ary = array(
					'terms_post'	=> (int) $val,
				);

				terms_update($lng, $sql_ary);
			}

			foreach($config_user as $lng => $val)
			{
				$val = utf8_normalize_nfc($val);
				$uid = $bitfield = $options = ''; // will be modified by generate_text_for_storage
				$allow_bbcode = $allow_urls = $allow_smilies = true;
				generate_text_for_storage($val, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);
				
				$sql_ary = array(
					'terms'					=> $val,
					'terms_bbcode_uid'		=> $uid,
					'terms_bbcode_bitfield'	=> $bitfield,
					'terms_bbcode_options'	=> $options,
				);

				terms_update($lng, $sql_ary);
			}

			add_log('admin', 'LOG_TERMS_UPDATE');
			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link(''));

		}
	}
}

?>