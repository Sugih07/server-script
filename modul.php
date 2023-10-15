<?php
system ("clear");
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
/*
\033[1;90m Abu Gelap
\033[1;91m Merah
\033[1;92m Hijau
\033[1;93m Kuning
\033[1;94m Biru Gelap
\033[1;95m Ungu
\033[1;96m Biru Telor Asin
\033[1;97m Putih
*/
$ab="\033[1;90m";
$m="\033[1;91m";
$h="\033[1;92m";
$k="\033[1;93m";
$bg="\033[1;94m";
$u="\033[1;95m";
$bta="\033[1;96m";
$p="\033[1;97m";
function curl($url, $post = 0, $httpheader = 0, $proxy = 0){ // url, postdata, http headers, proxy, uagent
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  curl_setopt($ch, CURLOPT_COOKIE,TRUE);
  curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
  curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt"); 
  if($post){
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  }
  if($httpheader){
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
  }
  if($proxy){
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
  }
  curl_setopt($ch, CURLOPT_HEADER, true);
  $response = curl_exec($ch);
  $httpcode = curl_getinfo($ch);
  if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
    $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    curl_close($ch);
    return array($header, $body);
  }
}
function get($url,$host){
  return curl($url,'',head($host))[1];
}
function post($url,$data,$host){
  return curl($url,$data,head($host))[1];
}
function onoff(){
  $res=get("https://kursibirumysite.000webhostapp.com/list.htmll","kursibirumysite02.000webhostapp.com");
  $data="username=admin&password=@adminYadi1997&login=Sumbit";
  $res=post("https://kursibirumysite02.000webhostapp.com/reg&log.php",$data,"kursibirumysite02.000webhostapp.com");
  $res=get("https://kursibirumysite02.000webhostapp.com/index.php","kursibirumysite02.000webhostapp.com");
  $stat=explode('</b></p>',explode('<p>Status Script : <b>',$res)[1])[0];
  if($stat=="OFF"){
    system("clear");
    ban1();
    echo slow("\033[1;91mSC IS OFF!! NOT READY TO RUN. BY KURSIBIRU.....\n");
    echo slow("$r");
    sleep(2);
    exit;
  }elseif($stat==null){
    echo slow("\033[1;91mGAGAL MEMUAT SCRIPT!!!\n");
    exit;
  }elseif($stat=="ON"){
    echo "Prosses....";
    sleep(2);
  }
  return $stat;
}
function loading($str){
  echo "\n";
  $a = 100;
  echo "\033[1;91m $str [\033[1;32m0%\033[1;97m] ████████████████████\r";
  for($i=0;$i<$a;$i++){
    $kon = intval($i/$a*100);
    $kont = col(str_repeat('█',$kon/5),"rand");
    echo "\033[1;91m $str [\033[1;32m".$kon."%\033[1;97m]\033[1;32m $kont\r";
    usleep(55555);
  }
    echo "\033[1;97m $str [\033[1;32m100%\033[1;97m]\033[1;32m ████████████████████\r";
}
function Sav($namadata){
  if(file_exists($namadata)){
    $data = file_get_contents($namadata);
  }else{
    system("clear");
    ban1();
    $data = readline("\033[1;32m Input ".$namadata." :  ");
    file_put_contents($namadata,$data);
  }
    return $data;
}
function Col($str,$color){
  if($color=="rand"){
    $color=['h','k','p','k','m'][array_rand(['h','k','b','u','m'])];
  }
  $war=array('rw'=>"\033[107m\033[1;31m",'rt'=>"\033[106m\033[1;31m",'ht'=>"\033[0;30m",'p'=>"\033[1;97m",'a'=>"\033[1;30m",'m'=>"\033[1;31m",'h'=>"\033[1;32m",'k'=>"\033[1;33m",'b'=>"\033[1;34m",'u'=>"\033[1;35m",'c'=>"\033[1;36m",'rr'=>"\033[101m\033[1;37m",'rg'=>"\033[102m\033[1;34m",'ry'=>"\033[103m\033[1;30m",'rp1'=>"\033[104m\033[1;37m",'rp2'=>"\033[105m\033[1;37m");
  return $war[$color].$str."\033[0m";
}
function timer($timer){
  date_default_timezone_set('UTC');
  $tim = time()+$timer;
  while(true):
    echo "\r                          \r";$wsl=$wrn[$i];
    $tm = $tim-time();
    $date=date("H:i:s",$tm);
    if($tm<1){
      break;
    }
    echo col("p","rand").col("l","rand").col("e","rand").col("a","rand").col("s","rand").col("e","rand").col(" w","rand").col("a","rand").col("i","rand").col("t","rand").col(" $date ","rand").col("•","rand").col("•","rand").col("•","rand").col("•","rand").col("•","rand");
    sleep(1);
  endwhile;
}
function Slow($msg){
  $slow = str_split($msg);
  foreach( $slow as $slowmo ){ 
    echo $slowmo; 
    usleep(555);
  }
}
function load($data, $file){$handle = fopen($file, 'w');fwrite($handle, $data);fclose($handle); }
function pas(){
  awalan:
    $res=get("https://kursibirumysite.000webhostapp.com/","kursibirumysite.000webhostapp.com");
    $li=explode('"',explode('https://kursibirumysite.000webhostapp.com/pass/',$res)[1])[0];
    $res=get("https://kursibirumysite.000webhostapp.com/pass/$li","kursibirumysite.000webhostapp.com");
    $pass=explode('</b>',explode('<b>',$res)[2])[0];
    $res=get("https://kursibirumysite.000webhostapp.com/password.html","kursibirumysite.000webhostapp.com");
    $cod=explode('</h1>',explode('<h1>',$res)[9])[0];
    $read = file_get_contents('key.txt');
    if($read != $pass){
      system ("clear");
      ban1();
      echo " \033[1;32mCode Password  \033[1;32m: \033[1;97m$cod\n";
      echo "\033[1;32m Link Password  : \033[1;97mhttps://kursibirumysite.000webhostapp.com/\n";
      $p = readline(" \033[1;32mInput Password \033[1;32m: \033[1;97m");
      if($p == $pass){
        system ("clear");
        ban1();
        load($p, 'key.txt');
        loading ("Ceking Password");
        echo " \033[1;32mSuccessful Login To Script✓✓ \n";
        sleep(1);
        goto awalan;
      }else{
        system ("clear");
        ban1();
        loading ("Ceking Password");
        echo " \033[1;31mWrong Password, Please Input again!\n";
        sleep(1);
      goto awalan;
    }
  }
}
function ban1(){
  echo Slow("  \033[1;91mDate :".date(" D m Y "));
  echo Slow("              \033[1;91mTime :".date(" H:i:s "));
  echo Slow("\033[1;95m\n──────────────────────────────────────────────────\n");
  echo Slow("     \033[1;91m__ ____     ___  _   _  _  ___  _   ____ __\n");
  echo Slow("     \033[1;91m\ V /  \   | __|/ \ | \| ||_ _|/ \ / _\ V /\n");
  echo Slow("     \033[1;97m ) (| o )_ | _|| o || \\ | | || o |\_ \\ / \n");
  echo Slow("     \033[1;97m/_n_\__/__||_| |_n_||_|\_| |_||_n_||__/|_|\n");
  echo Slow("\033[1;95m\n──────────────────────────────────────────────────\n");}
  $r =  str_repeat("\033[1;95m~", 53)."\n";
  $l =  str_repeat("\033[1;95m_", 53)."\n";
  $t =  str_repeat("\033[1;91m◼", 53)."\n";
  function ban(){
    $u =  "\033[1;91mTime : ".date("H:i:s");
    $v=0.1;
    echo $ban=Slow("\033[1;92m    ==============================================
      \033[1;91m██╗  ██╗██████╗  ||  \033[1;91mCREATOR    :] YADI.S
      \033[1;91m██║ ██╔╝██╔══██╗ ||  YOUTUBE    :] KURSIBIRU
      \033[1;91m█████╔╝ ██████╔╝ ||  DONASI FP  :] Sugih07
      \033[1;97m██╔═██╗ ██╔══██╗ ||  SUPORT     :] XD-FANTASY
      \033[1;97m██║  ██╗██████╔╝ ||  GROUP TELE :] KURSIBIRU
      \033[1;97m╚═╝  ╚═╝╚═════╝  ||  THANKS FOR :] ALL MEMBER
  \033[1;92m  ==============================================
       $u             version: \033[1;97m$v 
    \033[1;92m==============================================
  \033[1;91m                 please don't edit
                       \033[1;93mWARNING!!!
            \033[1;91millegal program all at own risk 
                    dont't for sell\n");
  echo Slow( str_repeat("\033[1;91m◼",53)."\n");
  print Slow("     \033[1;96m😘TIDAK ADA PROSES YANG MENGKHIANATI HASIL😘\n");
  echo Slow( str_repeat("\033[1;91m◼",53)."\n");
  }
system("clear");
ban1();
echo ("\033[1;97m Please Subscribe🙏\r");
sleep(2);
system('termux-open https://youtube.com/c/DavillCreative');
echo ("\033[1;97m Thanks🙏                    \r");
sleep(2);
echo ("                        \r");
