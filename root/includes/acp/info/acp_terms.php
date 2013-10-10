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
* @package module_install
*/
class acp_terms_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_terms',
			'title'		=> 'ACP_TERMS_NAME',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'config'	=> array('title' => 'ACP_TERMS_NAME', 'auth' => 'acl_a_terms_config', 'cat' => array('ACP_GENERAL_TASKS')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}

?>