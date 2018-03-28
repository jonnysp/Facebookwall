<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['facebookwall_viewer'] = '{type_legend},type;{facebookwall_legend},facebookwall;{protected_legend:hide},protected;{expert_legend:hide},cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['facebookwall'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['facebookwall_viewer'],
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_facebookwall', 'getFacebookwall'),
	'eval'                    => array('mandatory'=>true, 'chosen'=>true, 'submitOnChange'=>true),
	'wizard' 				  => array(array('tl_content_facebookwall', 'editFacebookwall')),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);


class tl_content_facebookwall extends Backend 
{

	public function getFacebookwall()
	{
		$objCats =  \FacebookwallModel::findAll();
		$arrCats = array();
		if (isset($objCats)) {
			foreach ($objCats as $objCat)
			{
				$arrCats[$objCat->id] =  $objCat->title .' (ID ' . $objCat->id . ')';
			}
		}
		return $arrCats;
	}

	public function editFacebookwall(DataContainer $dc)
	{
		$this->loadLanguageFile('tl_facebookwall');
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=facebookwall&amp;act=edit&amp;id=' . $dc->value . '&amp;popup=1&amp;nb=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(StringUtil::specialchars($GLOBALS['TL_LANG']['tl_facebookwall']['edit'][1]), $dc->value) . '" onclick="Backend.openModalIframe({\'title\':\'' . StringUtil::specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_facebookwall']['edit'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.svg', $GLOBALS['TL_LANG']['tl_facebookwall']['edit'][0]) . '</a>';
	}


}
