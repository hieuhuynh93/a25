<?php 
class BingPositionChecker {
	private $website="";
	private $keyword="";
	private $url="";
	private $start=0;
	private $page=false;
	private $records=false;


		public function __construct($keyword, $website, $pages){


		$website=strtolower(trim($website));
		$website=str_replace("http://www.","",$website);
		$website=str_replace("http://","",$website);
		$website=str_replace("www.","",$website);
		$website=str_replace("/","",$website);
	
		$this->website=$website;
		$this->pages=$pages;		
		$this->keyword=trim($keyword);
		$this->enableVerbose=@$enableVerbose;		
		$this->url=$this->updateUrl($keyword, $this->start);
	}


	public function initSpider(){
		$i=10;
		$c=1;
		$r=0;
		$link_array	=	array();		
			while($c<=$this->pages) {			
			flush();ob_flush();
			$records= $this->getRecordsAsArray($this->url);
			//print_r($records); 
			$count=count($records);
			for($k=0;$k<$count;$k++){
				$j=$k+1;
				$link=$records[$k][1];
				$link=str_replace("https://","",trim(strip_tags($link)));
				$link = str_replace("www.","",$link);
				$parse_domain	=	parse_url("http://".$link);
				$link   =   $parse_domain['host'];
				//preg_match("#([^\s]+)#is",$link,$link_domain);
				$link_array[] = $link;				
			
				
			}

			$c++;
			$r = $r + 10;
			$this->updateUrl($this->keyword, $i * ($c-1));
		}
				
		if($this->page==false){
			$domain=$this->website;
			$keyword=$this->keyword;
			return $link_array;
		}

	}
	

	private function getRecordsAsArray($url){
		$matches=array();
		$html=$this->getCodeViaFopen($url);
		preg_match_all('#<cite>(.*?)</cite>#is', $html, $matches, PREG_SET_ORDER);
		return $matches;
	}
	

	private function updateUrl($keyword, $start){
		$this->start=$this->start+$start;	
		$keyword=trim($keyword);
		$keyword=urlencode($keyword);
		$new_url =  "http://www.bing.com/search?first=".$start."&q=$keyword";
		$this->url = $new_url;
		return $new_url;
	}


	private function getCodeViaFopen($url){
		return $this->get_web_page($url);		 
	}
	
	private function get_web_page( $url )
	{
		
		$proxies_array	=	array(
								'173.208.13.98:17338',
								'173.208.14.100:17338',
								'173.208.24.58:17338',
								'173.208.67.92:17338',
								'173.234.27.103:17338',
								'173.234.28.164:17338',
								'173.234.29.155:17338',
								'173.234.30.138:17338',
								'173.234.31.129:17338',
								'173.234.54.253:17338'
							);
							
		$random_key 		= array_rand($proxies_array);
		$random_proxy 		= $proxies_array[$random_key];					
							
		$useragents_array	=	array(
								'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.11) Gecko Kazehakase/0.5.4 Debian/0.5.4-2.1ubuntu3',
								'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.13) Gecko/20080311 (Debian-1.8.1.13+nobinonly-0ubuntu1) Kazehakase/0.5.2',
								'Mozilla/5.0 (X11; Linux x86_64; U;) Gecko/20060207 Kazehakase/0.3.5 Debian/0.3.5-1',
								'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KKman2.0)',
								'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.8.1.4) Gecko/20070511 K-Meleon/1.1',
								'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9) Gecko/2008052906 K-MeleonCCFME 0.09',
								'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.8.0.7) Gecko/20060917 K-Meleon/1.02',
								'Mozilla/5.0 (Windows; U; Win 9x 4.90; en-US; rv:1.7.5) Gecko/20041220 K-Meleon/0.9',
								'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.5) Gecko/20031016 K-Meleon/0.8.2',
								'Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.5) Gecko/20031016 K-Meleon/0.8.2',
								'Mozilla/5.0 (Windows; U; WinNT4.0; en-US; rv:1.5) Gecko/20031016 K-Meleon/0.8',
								'Mozilla/5.0 (Windows; U; WinNT4.0; en-US; rv:1.2b) Gecko/20021016 K-Meleon 0.7',
								'Mozilla/5.0 (Windows; U; WinNT4.0; en-US; rv:0.9.5) Gecko/20011011',
								'Mozilla/5.0(Windows;N;Win98;m18)Gecko/20010124',
								'Mozilla/5.0 (compatible; Konqueror/4.0; Linux) KHTML/4.0.5 (like Gecko)',
								'Mozilla/5.0 (compatible; Konqueror/4.0; Microsoft Windows) KHTML/4.0.80 (like Gecko)',
								'Mozilla/5.0 (compatible; Konqueror/3.92; Microsoft Windows) KHTML/3.92.0 (like Gecko)',
								'Mozilla/5.0 (compatible; Konqueror/3.5; GNU/kFreeBSD) KHTML/3.5.9 (like Gecko) (Debian)',
								'Mozilla/5.0 (compatible; Konqueror/3.5; Darwin) KHTML/3.5.6 (like Gecko)'
							);
							
		$random_key 		= array_rand($useragents_array);
		$random_useragent 	= $useragents_array[$random_key];							

													
		$options = array(
			CURLOPT_RETURNTRANSFER 	=> true,     			// return web page
			CURLOPT_HEADER         	=> false,    			// don't return headers
			//CURLOPT_PROXY 			=> $random_proxy,     		// the HTTP proxy to tunnel request through
			//CURLOPT_HTTPPROXYTUNNEL => 1,    				// tunnel through a given HTTP proxy			
			CURLOPT_FOLLOWLOCATION 	=> true,     			// follow redirects
			CURLOPT_ENCODING       	=> "",       			// handle compressed
			CURLOPT_USERAGENT      	=> $random_useragent, 	// who am i
			CURLOPT_SSL_VERIFYPEER  => false,			
			CURLOPT_AUTOREFERER    	=> true,     			// set referer on redirect
			CURLOPT_CONNECTTIMEOUT 	=> 20,      			// timeout on connect
			CURLOPT_TIMEOUT        	=> 20,      			// timeout on response
			CURLOPT_MAXREDIRS      	=> 10,       			// stop after 10 redirects
		);
	
		$ch      = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		curl_close( $ch );
		
		return $content;
	}	
}
?>