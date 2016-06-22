<?php

class magic_params_generator
{
	private $type='ALL'; // other supported values are: AUTH DEBUG
	private $debug_phrases='list-debug.txt';
	private $debug_verbs='list-debug-verbs.txt';
	private $auth_words='list_auth.txt';

	private $output_cookies='output_cookies.txt';
	private $output_query='output_query.txt';
	private $positive_values=array(1,'true','yes','YES','TRUE','Y','y');

	private	$output2_query=array();
	private $output2_cookie=array();

	private function generate_params_set($words)
	{
		for($i=0;$i<count($this->positive_values);$i++)
		{
			$output=array();
			foreach($words as $w)
			{
				$w=trim($w);
				$output[]="$w=".$this->positive_values[$i];
			}
			if(!isset($this->output2_cookie[$i])) $this->output2_cookie[$i]=array();
			if(!isset($this->output2_query[$i])) $this->output2_query[$i]=array();

			$this->output2_cookie[$i]=array_merge($this->output2_cookie[$i],$output);
			$this->output2_query[$i]=array_merge($this->output2_query[$i],$output);
		}

	}
	public function __construct()
	{
		file_put_contents($this->output_cookies,'');
		file_put_contents($this->output_query,'');
		if($this->type=='ALL'||$this->type=='AUTH')
		{

			// START OF AUTH-SPECIFIC
			$this->generate_params_set(file($this->auth_words));
		}
		if($this->type=='ALL'||$this->type=='DEBUG')
		{
			// START OF DEBUG-SPECIFIC

			$verbs=file($this->debug_verbs);
			$phrases=file($this->debug_phrases);
			$words=array_merge($verbs,$phrases);

			$words_tmp=$words;
			foreach($words_tmp as $w)
			{
				$words[]=strtoupper(trim($w));
			}		

			foreach($phrases as $phrase)
			{
				foreach($verbs as $verb)
				{
					$words[]=trim($verb).'-'.trim($phrase);
					$words[]=trim($verb).'_'.trim($phrase);
					$words[]=trim($verb).trim($phrase);
					$words[]=trim($verb).ucfirst(trim($phrase));
				}
			}
			// END OF DEBUG-SPECIFIC
			$this->generate_params_set($words);
		}
		//print_r($this->output2_query);

		for($i=0;$i<count($this->positive_values);$i++)
		{
			file_put_contents($this->output_query,join('&',$this->output2_query[$i])."\n",FILE_APPEND);
			file_put_contents($this->output_cookies,join('; ',$this->output2_cookie[$i])."\n",FILE_APPEND);
		}

	}
// END OF AUTH-SPECIFIC
}

$magic_paramc = new magic_params_generator();
?>
