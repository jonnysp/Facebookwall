<?php

/**
 * Table tl_facebookwall
 */
$GLOBALS['TL_DCA']['tl_facebookwall'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'      => 'Table',
		'enableVersioning'   => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),
	

// List
	'list' => array
	(

 		'sorting' => array
		(
			'mode'                => 1,
			'fields'              => array('title'),
			'flag'        		  => 1,
			'panelLayout'         => 'sort,filter;search,limit'
		),
		
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_facebookwall']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.svg'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_facebookwall']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.svg'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_facebookwall']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{title_legend},title,count,userid,appid,secret'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'    				=> &$GLOBALS['TL_LANG']['tl_facebookwall']['title'],
			'search'              	=> true,
			'inputType'          	=> 'text',
			'eval'                  => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w100','allowHtml'=>true,'preserveTags'=>true),
			'sql'            		=> "varchar(128) NOT NULL default ''"
		),
		'appid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_facebookwall']['appid'],
			'search'               => true,
			'inputType'          => 'text',
			'eval'                  => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                    => "varchar(128) NOT NULL default ''"
		),
		'secret' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_facebookwall']['secret'],
			'search'               => true,
			'inputType'          => 'text',
			'eval'                  => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                    => "varchar(128) NOT NULL default ''"
		),
		'userid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_facebookwall']['userid'],
			'search'               => true,
			'inputType'          => 'text',
			'eval'                  => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                    => "varchar(128) NOT NULL default ''"
		),
		'count' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_facebookwall']['count'],
			'default'				  => 20,
			'inputType'               => 'select',
			'search'                  => true,
			'options'            	  => array(5,10,20,30,40,50),
			'reference'               => &$GLOBALS['TL_LANG']['tl_facebookwall'], 
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => "int(10) unsigned NOT NULL default '20'"
		)
	)
);


class tl_facebookwall extends Backend{



}
