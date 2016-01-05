<?php
namespace common\components; 
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class UtilHelper extends Component
{
	function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
	{
		$str = '';
		$count = strlen($charset);
		while ($length--) {
			$str .= $charset[mt_rand(0, $count-1)];
		}
		return $str;
	}
}