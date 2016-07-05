<?php
class magic_params_generator
{
	private $type='ALL'; // other supported values are: AUTH DEBUG
	private $debug_phrases='list-debug.txt';
	private $netscape_output_domain='.example.org';
	private $debug_verbs='list-debug-verbs.txt';
	private $auth_words='list_auth.txt';
	private $output_cookies='output_cookies.txt';
	private $output_query='output_query.txt';
	private $positive_values=array(1,'true','yes','YES','TRUE','Y','y','True');
	private $query_byte_limit=2500;
	private	$output2_query=array();
	private $output2_cookie=array();
	private $output2_netscape=array();
	private function generate_params_set($words)
	{
		for($i=0;$i<count($this->positive_values);$i++)
		{
			$output=array();
			$output_netscape=array();
			foreach($words as $w)
			{
				$w=trim($w);
				$output[]="$w=".$this->positive_values[$i];					
				$output_netscape[]=$this->netscape_output_domain."\tFALSE\t/\tFALSE\t0\t$w\t{$this->positive_values[$i]}";
			}
			if(!isset($this->output2_cookie[$i])) $this->output2_cookie[$i]=array();
			if(!isset($this->output2_query[$i])) $this->output2_query[$i]=array();
			if(!isset($this->output2_netscape[$i])) $this->output2_netscape[$i]=array();
			$this->output2_cookie[$i]=array_merge($this->output2_cookie[$i],$output);
			$this->output2_query[$i]=array_merge($this->output2_query[$i],$output);
			$this->output2_netscape[$i]=array_merge($this->output2_netscape[$i],$output_netscape);
		}
	}
	public function __construct()
	{
		file_put_contents($this->output_cookies,'');
		file_put_contents($this->output_query,'');
		if($this->type=='ALL'||$this->type=='AUTH')
		{
			// START OF AUTH-SPECIFIC
			$words_tmp=$words=file($this->auth_words);
			foreach($words_tmp as $w)
			{
				if(strstr($w,'-')===FALSE) 
				{
					$w=trim($w);
					$words[]=ucfirst($w);
					$words[]=strtoupper($w);
				}
			}		
			$this->generate_params_set($words);
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
			//
			$byte_count=0;
			$query2_part=array();
			$cookie2_part=array();
			for($j=0;$j<count($this->output2_query[$i]);$j++) // output2_query has the same number of elements as output2_cookie, we split them (in order to avoid 413) to the same number of payloads to make the output Pitchfork-friendly
			{

				$byte_count+=strlen($this->output2_query[$i][$j]);
				$query2_part[]=$this->output2_query[$i][$j];
				$cookie2_part[]=$this->output2_cookie[$i][$j];		
				if($byte_count>$this->query_byte_limit||$j==count($this->output2_query[$i])-1)
				{
					file_put_contents($this->output_query,join('&',$query2_part)."\n",FILE_APPEND);
					file_put_contents($this->output_cookies,join('; ',$cookie2_part)."\n",FILE_APPEND);	
					$query_part2=array();
					$cookie_part2=array();
					$byte_count=0;
				}		
			}
			
			file_put_contents("cookies.{$i}.txt",join("\n",$this->output2_netscape[$i]));
		}
	}
// END OF AUTH-SPECIFIC
}
$magic_paramc = new magic_params_generator();
?>
