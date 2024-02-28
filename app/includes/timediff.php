<?php
function times_diff($time_from,$time_to,$result_in="m")
	{
		if( (strstr($time_from,'.') || strstr($time_from,':')) && (strstr($time_to,'.') || strstr($time_to,':')) )
		{
			$time_from=str_replace(':','.',$time_from);
			$time_to=str_replace(':','.',$time_to);
			
			$t1=explode('.',$time_from);
			$t2=explode('.',$time_to);
			
			$h1=$t1[0];
			$m1=$t1[1];
			
			$h2=$t2[0];
			$m2=$t2[1];
			
			if($h1<=24 && $h2<=24 && $h1>=0 && $h2>=0 && $m1<=59 && $m2<=59 && $m1>=0 && $m2>=0)
			{
				$diff=($h2*3600+$m2*60)-($h1*3600+$m1*60);
				if($result_in=="s")
					return $diff;
				elseif($result_in=="m")
				{
					return $diff/60;
				}
				elseif($result_in=="h")
				{
					$r=$diff/3600;
					$t=explode('.',$r);
					$h=$t[0];
					if($h>24)
						$h-=24;					
					$m=round("0.$t[1]"*60);
					return $h.'h'.$m.'m';
				}			
			}
			else
			{
				$this->error='Time range not valid. Must be 0 to 24 for hours and 0 to 59 for minutes!';
				
			}							
		}
		else
		{
			$this->error='Time format not valid. Must be in format HH:mm or HH.mm';
					
		}	
	}

function times_add($time,$add,$what)
	{
		if( (strstr($time,'.') || strstr($time,':')))
		{
			$time=str_replace(':','.',$time);			
			$t1=explode('.',$time);			
			$h1=$t1[0];
			$m1=$t1[1];
			if($h1<=24 && $h1>=0  && $m1<=59 && $m1>=0)
			{
				if($what=="m")
				{
					$res=($h1*60)+$m1+$add;
					$r=$res/60;
					$t=explode('.',$r);
					$h=$t[0];
					if($h>24)
						$h-=24;					
					$m=round("0.$t[1]"*60);
					return $h.':'.$m;
				}
				elseif($what=="h")
				{
					$res=($h1*60)+$m1+($add*60);
					$r=$res/60;
					$t=explode('.',$r);
					$h=$t[0];
					if($h>24)
						$h-=24;					
					$m=round("0.$t[1]"*60);
					return $h.':'.$m;				
				}
				elseif($what=="t")
				{
					if( (strstr($add,'.') || strstr($add,':')))
					{
						$add=str_replace(':','.',$add);			
						$t1=explode('.',$add);			
						$h2=$t1[0];
						$m2=$t1[1];
						if($h2<=24 && $h2>=0  && $m2<=59 && $m2>=0)
						{
							$res=($h1*60)+($h2*60)+$m1+$m2;
							$r=$res/60;
							$t=explode('.',$r);
							$h=$t[0];
							if($h>24)
								$h-=24;
							$m=round("0.$t[1]"*60);
							return $h.':'.$m;											
						}						
					}					
					else
					{
						$this->error='Time format not valid. Must be in format HH:mm or HH.mm';
								
					}	
				}
			}
			else
			{
				$this->error='Time range not valid. Must be 0 to 24 for hours and 0 to 59 for minutes!';
				
			}							
		}
		else
		{
			$this->error='Time format not valid. Must be in format HH:mm or HH.mm';
					
		}	
	}
?>