<?php


class FacebookwallModel extends \Model
{
    protected static $strTable = 'tl_facebookwall';

    public function escapeTags($value='')
	{
		$val =  preg_replace('/</i', '&lt;', $value);
		return  preg_replace('/>/i', '&gt;', $val);
	}

	public function nl2br($value="")
	{
		return  preg_replace('/(\r\n)|(\n\r)|\r|\n/i', '<br>', $value);
	}

	public function autoLink($value="")
	{
		return  preg_replace('/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/i', '<a href="$1" target="_blank">$1</a>', $value);
	}

	public function modText($value="")
	{
		return $this->nl2br($this->autoLink($this->escapeTags($value)));
	}
}
