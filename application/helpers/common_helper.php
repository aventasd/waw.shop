<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generateRandomString()  {
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '1234567890';
    $randomString = '';
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $letters[rand(0, strlen($letters) - 1)];
    }
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $digits[rand(0, strlen($digits) - 1)];
    }
    return strtolower($randomString);
}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function cleanXML($string) {
    //&amp;quot;

  //  $string = htmlspecialchars($string);
    $string =  trim($string);
    $string =  str_replace('  ', ' ',  $string);
    $string =  str_replace('&#39;', 'd ',  $string);
    $string =  str_replace('&quot;', 's ', $string);
    $string =  str_replace('&amp;', ' and ',  $string);
    $string =  str_replace('&', '&amp;', $string);
    $string = substr($string, 0, 10);

    return  ($string);
}

if ( ! function_exists('paginate'))
{
    function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
    {
        $pagination = '';
        if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
            $pagination .= '<ul class="pagination">';

            $right_links    = $current_page + 3;
            $previous       = $current_page - 3; //previous link
            $next           = $current_page + 1; //next link
            $first_link     = true; //boolean var to decide our first link

            if($current_page > 1){
                $previous_link = ($previous==0)?1:$previous;
                //  $pagination .= '<li class="first"><a href="'.$page_url.'?page=1" title="First">&laquo;</a></li>'; //first link


                if($previous_link < 2) {
                    $pagination .= '<li class="prev_pagination"><a  href="'.$page_url.'" title="Previous">&nbsp;</a></li>';
                }else{
                    $pagination .= '<li class="prev_pagination"><a  href="'.$page_url.'?page='.$previous_link.'" title="Previous">&nbsp;</a></li>'; //previous link &lt;
                }
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){

                        if($i < 2) {
                            $pagination .= '<li><a href="'.$page_url.'">'.$i.'</a></li>';
                        }else{
                            $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
                        }

                    }
                }
                $first_link = false; //set first link to false
            }

            if($first_link){ //if current active page is first link
                $pagination .= '<li class="first active">'.$current_page.'</li>';
            }elseif($current_page == $total_pages){ //if it's the last active link
                $pagination .= '<li class="last active">'.$current_page.'</li>';
            }else{ //regular current link
                $pagination .= '<li class="active">'.$current_page.'</li>';
            }

            for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
                if($i<=$total_pages){
                    $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
                }
            }
            if($current_page < $total_pages){
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li class="next_pagination"><a  href="'.$page_url.'?page='.$next_link.'" >&nbsp;</a></li>'; //next link &gt;
                // $pagination .= '<li class="last"><a href="'.$page_url.'?page='.$total_pages.'" title="Last">&gt;&gt;</a></li>'; //last link
            }

            $pagination .= '</ul>';
        }
        return $pagination; //return pagination links
    }
}

if ( ! function_exists('statesUS'))
{
    function statesUS($code) {
        $statesUS = Array('Alabama','Alaska','American Samoa','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','District of Columbia','Federated States of Micronesia','Florida','Georgia','Guam','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Marshall Islands','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Northern Mariana Islands','Ohio','Oklahoma','Oregon','Palau','Pennsylvania','Puerto Rico','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virgin Island','Virginia','Washington','West Virginia','Wisconsin','Wyoming');
        return $statesUS[$code];
    }
}

if ( ! function_exists('statesCA'))
{
    function statesCA($code) {
        $statesCA = Array('Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador', 'Northwest Territories', 'Nova Scotia', 'Nunavut', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan', 'Yukon Territory');
        return $statesCA[$code];
    }
}




if ( ! function_exists('ups_shipping_types'))
{
    function ups_shipping_types($code) {


        /*
         UPS 2nd Day Air 02
         UPS 2nd Day Air A.M. 59
         UPS 3 Day Select 12
         UPS Ground 03
         UPS Next Day Air 01
         UPS Next Day Air Early 14
         UPS Next Day Air Saver 13
         * *
         */


        if($code == '02'){
            return 'UPS 2nd Day Air';
        } else if($code == '59'){
            return 'UPS 2nd Day Air A.M.';
        }else if($code == '12'){
            return 'UPS 3 Day Select';
        }else if($code == '03'){
            return 'UPS Ground';
        }else if($code == '01'){
            return 'UPS Next Day Air';
        }else if($code == '14'){
            return 'UPS Next Day Air Early';
        }else if($code == '13'){
            return 'UPS Next Day Air Saver';
        }

    }
}




if ( ! function_exists('check_photo'))
{
    function check_photo() {
        return '/css/i/no_image_80.jpg';

    }
}

/*
	Highlight Words in Search Results
	http://www.beliefmedia.com/code/php-snippets/highlight-search
 *
 * $words = 'lorem,semper,ipsum';
$text = 'Lorem ipsum dolor sit semper amet, consectetur adipiscing elit. Semper vestibulum eu nulla auctor, vehicula sem vel, suscipit lorem ligula. Quisque libero lorem, semper eget fermentum id, condimentum at turpis.';
echo beliefmedia_highlights($text, $words, $case = false);
 *
 *
*/


function beliefmedia_highlights($text, $words, $case = false) {

    $words = trim($words);
    $words_array = explode(',', $words);

    $regex =
        ($case !== false)
            ?
            //  '/((?:^|>)[^<]*)('.$search.')/si'
            //  '/\b(' . implode('|', array_map('preg_quote', $words_array)) . ')\b/si'
            '/((?:^>)[^<]*)('. implode('|', array_map('preg_quote', $words_array)) . ')\b/si'
            :
            '/\b(' . implode('|', array_map('preg_quote', $words_array)) . ')\b/';

    foreach($words_array as $word) {
        if(strlen(trim($word)) != 0)
            $text = preg_replace($regex, '<font style="background: yellow";>$1</font>', $text);
    }

    return $text;
}





/**
 * Translates a number to a short alhanumeric version
 *
 * Translated any number up to 9007199254740992
 * to a shorter version in letters e.g.:
 * 9007199254740989 --> PpQXn7COf
 *
 * specifiying the second argument true, it will
 * translate back e.g.:
 * PpQXn7COf --> 9007199254740989
 *
 * this function is based on any2dec && dec2any by
 * fragmer[at]mail[dot]ru
 * see: http://nl3.php.net/manual/en/function.base-convert.php#52450
 *
 * If you want the alphaID to be at least 3 letter long, use the
 * $pad_up = 3 argument
 *
 * In most cases this is better than totally random ID generators
 * because this can easily avoid duplicate ID's.
 * For example if you correlate the alpha ID to an auto incrementing ID
 * in your database, you're done.
 *
 * The reverse is done because it makes it slightly more cryptic,
 * but it also makes it easier to spread lots of IDs in different
 * directories on your filesystem. Example:
 * $part1 = substr($alpha_id,0,1);
 * $part2 = substr($alpha_id,1,1);
 * $part3 = substr($alpha_id,2,strlen($alpha_id));
 * $destindir = "/".$part1."/".$part2."/".$part3;
 * // by reversing, directories are more evenly spread out. The
 * // first 26 directories already occupy 26 main levels
 *
 * more info on limitation:
 * - http://blade.nagaokaut.ac.jp/cgi-bin/scat.rb/ruby/ruby-talk/165372
 *
 * if you really need this for bigger numbers you probably have to look
 * at things like: http://theserverpages.com/php/manual/en/ref.bc.php
 * or: http://theserverpages.com/php/manual/en/ref.gmp.php
 * but I haven't really dugg into this. If you have more info on those
 * matters feel free to leave a comment.
 *
 * The following code block can be utilized by PEAR's Testing_DocTest
 * <code>
 * // Input //
 * $number_in = 2188847690240;
 * $alpha_in  = "SpQXn7Cb";
 *
 * // Execute //
 * $alpha_out  = alphaID($number_in, false, 8);
 * $number_out = alphaID($alpha_in, true, 8);
 *
 * if ($number_in != $number_out) {
 *   echo "Conversion failure, ".$alpha_in." returns ".$number_out." instead of the ";
 *   echo "desired: ".$number_in."\n";
 * }
 * if ($alpha_in != $alpha_out) {
 *   echo "Conversion failure, ".$number_in." returns ".$alpha_out." instead of the ";
 *   echo "desired: ".$alpha_in."\n";
 * }
 *
 * // Show //
 * echo $number_out." => ".$alpha_out."\n";
 * echo $alpha_in." => ".$number_out."\n";
 * echo alphaID(238328, false)." => ".alphaID(alphaID(238328, false), true)."\n";
 *
 * // expects:
 * // 2188847690240 => SpQXn7Cb
 * // SpQXn7Cb => 2188847690240
 * // aaab => 238328
 *
 * </code>
 *
 * @author  Kevin van Zonneveld &lt;kevin@vanzonneveld.net>
 * @author  Simon Franz
 * @author  Deadfish
 * @author  SK83RJOSH
 * @copyright 2008 Kevin van Zonneveld (http://kevin.vanzonneveld.net)
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD Licence
 * @version   SVN: Release: $Id: alphaID.inc.php 344 2009-06-10 17:43:59Z kevin $
 * @link    http://kevin.vanzonneveld.net/
 *
 * @param mixed   $in   String or long input to translate
 * @param boolean $to_num  Reverses translation when true
 * @param mixed   $pad_up  Number or boolean padds the result up to a specified length
 * @param string  $pass_key Supplying a password makes it harder to calculate the original ID
 *
 * @return mixed string or long
 */

function randomPassword() {
    $alphabet = 'abcdefghijklmnxyzABCDEFGHIJKLopqrstuvwMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function rrmdirscan($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir."/".$object))
                    rrmdir($dir."/".$object);
                else
                    unlink($dir."/".$object);
            }
        }
        rmdir($dir);
    }
}

/* Start make SLUG -- */

function makeSlugs($string, $maxlen=0)
{
    $newStringTab=array();
    $string=strtolower(noDiacritics($string));
    if(function_exists('str_split'))
    {
        $stringTab=str_split($string);
    }
    else
    {
        $stringTab=my_str_split($string);
    }

    $numbers=array("0","1","2","3","4","5","6","7","8","9","-");
    //$numbers=array("0","1","2","3","4","5","6","7","8","9");

    foreach($stringTab as $letter)
    {
        if(in_array($letter, range("a", "z")) || in_array($letter, $numbers))
        {
            $newStringTab[]=$letter;
        }
        elseif($letter==" ")
        {
            $newStringTab[]="-";
        }
    }

    if(count($newStringTab))
    {
        $newString=implode($newStringTab);
        if($maxlen>0)
        {
            $newString=substr($newString, 0, $maxlen);
        }

        $newString = removeDuplicates('--', '-', $newString);
    }
    else
    {
        $newString='';
    }

    return $newString;
}


function my_str_split($string)
{
    $slen=strlen($string);
    for($i=0; $i<$slen; $i++)
    {
        $sArray[$i]=$string{$i};
    }
    return $sArray;
}

function noDiacritics($string)
{

    $string=str_replace("ый", "iy", $string);

    //cyrylic transcription
    $cyrylicFrom = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф',   'Х', 'Ц', 'Ч',  'Ш',   'Щ',   'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',   'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы',   'ь',       'э',         'ю',      'я');
    $cyrylicTo   = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Zh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Shch', '', 'Y', '',  'E',  'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', '', 'y', '', 'e', 'yu', 'ya');


    $from = array("Á", "À", "Â", "Ä", "A", "A", "Ã", "Å", "A", "Æ", "C", "C", "C", "C", "Ç", "D", "Ð", "Ð", "É", "È", "E", "Ê", "Ë", "E", "E", "E", "?", "G", "G", "G", "G", "á", "à", "â", "ä", "a", "a", "ã", "å", "a", "æ", "c", "c", "c", "c", "ç", "d", "d", "ð", "é", "è", "e", "ê", "ë", "e", "e", "e", "?", "g", "g", "g", "g", "H", "H", "I", "Í", "Ì", "I", "Î", "Ï", "I", "I", "?", "J", "K", "L", "L", "N", "N", "Ñ", "N", "Ó", "Ò", "Ô", "Ö", "Õ", "O", "Ø", "O", "Œ", "h", "h", "i", "í", "ì", "i", "î", "ï", "i", "i", "?", "j", "k", "l", "l", "n", "n", "ñ", "n", "ó", "ò", "ô", "ö", "õ", "o", "ø", "o", "œ", "R", "R", "S", "S", "Š", "S", "T", "T", "Þ", "Ú", "Ù", "Û", "Ü", "U", "U", "U", "U", "U", "U", "W", "Ý", "Y", "Ÿ", "Z", "Z", "Ž", "r", "r", "s", "s", "š", "s", "ß", "t", "t", "þ", "ú", "ù", "û", "ü", "u", "u", "u", "u", "u", "u", "w", "ý", "y", "ÿ", "z", "z", "ž");
    $to   = array("A", "A", "A", "A", "A", "A", "A", "A", "A", "AE", "C", "C", "C", "C", "C", "D", "D", "D", "E", "E", "E", "E", "E", "E", "E", "E", "G", "G", "G", "G", "G", "a", "a", "a", "a", "a", "a", "a", "a", "a", "ae", "c", "c", "c", "c", "c", "d", "d", "d", "e", "e", "e", "e", "e", "e", "e", "e", "g", "g", "g", "g", "g", "H", "H", "I", "I", "I", "I", "I", "I", "I", "I", "IJ", "J", "K", "L", "L", "N", "N", "N", "N", "O", "O", "O", "O", "O", "O", "O", "O", "CE", "h", "h", "i", "i", "i", "i", "i", "i", "i", "i", "ij", "j", "k", "l", "l", "n", "n", "n", "n", "o", "o", "o", "o", "o", "o", "o", "o", "o", "R", "R", "S", "S", "S", "S", "T", "T", "T", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "W", "Y", "Y", "Y", "Z", "Z", "Z", "r", "r", "s", "s", "s", "s", "B", "t", "t", "b", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "w", "y", "y", "y", "z", "z", "z");


    $from = array_merge($from, $cyrylicFrom);
    $to   = array_merge($to, $cyrylicTo);

    $newstring=str_replace($from, $to, $string);
    return $newstring;
}

function checkSlug($sSlug)
{
    if(preg_match("/^[a-zA-Z0-9]+[a-zA-Z0-9\-]*$/", $sSlug) == 1)
    {
        return true;
    }

    return false;
}

function removeDuplicates($sSearch, $sReplace, $sSubject)
{
    $i=0;
    do{

        $sSubject=str_replace($sSearch, $sReplace, $sSubject);
        $pos=strpos($sSubject, $sSearch);

        $i++;
        if($i>100)
        {
            die('removeDuplicates() loop error');
        }

    }while($pos!==false);

    return $sSubject;
}



/* end make SLUG -- */


function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function transliterate($textcyr = null, $textlat = null) {
    if($textcyr){
        $textcyr = str_replace("ый", "iy", $textcyr);
    }
    $cyr = array(
        'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
        'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
        'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
        'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я');
    $lat = array(
        'a','b','v','g','d','e','e','zh','z','i','y','k','l','m','n','o','p',
        'r','s','t','u','f','h','c','ch','sh','shch','','y','','e','yu','ya',
        'A','B','V','G','D','E','E','Zh','Z','I','Y','K','L','M','N','O','P',
        'R','S','T','U','F','H','C','Ch','Sh','Shch','','Y','','E','Yu','Ya');
    if($textcyr) return str_replace($cyr, $lat, $textcyr);
    else if($textlat) return str_replace($lat, $cyr, $textlat);
    else return null;
}


function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}


function email_reminder($time){
    if($time == '1') { return '1 hour'; }
    else if($time == '2') { return '2 hours'; }
    else if($time == '3') { return '3 hours'; }
    else if($time == '24') { return '1 day'; }
    else if($time == '48') { return '2 days'; }
}

function alphaID($in, $to_num = false, $pad_up = false, $pass_key = null)
{
    $out   =   '';
    $index = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base  = strlen($index);

    if ($pass_key !== null) {
        // Although this function's purpose is to just make the
        // ID short - and not so much secure,
        // with this patch by Simon Franz (http://blog.snaky.org/)
        // you can optionally supply a password to make it harder
        // to calculate the corresponding numeric ID

        for ($n = 0; $n < strlen($index); $n++) {
            $i[] = substr($index, $n, 1);
        }

        $pass_hash = hash('sha256',$pass_key);
        $pass_hash = (strlen($pass_hash) < strlen($index) ? hash('sha512', $pass_key) : $pass_hash);

        for ($n = 0; $n < strlen($index); $n++) {
            $p[] =  substr($pass_hash, $n, 1);
        }

        array_multisort($p, SORT_DESC, $i);
        $index = implode($i);
    }

    if ($to_num) {
        // Digital number  <<--  alphabet letter code
        $len = strlen($in) - 1;

        for ($t = $len; $t >= 0; $t--) {
            $bcp = bcpow($base, $len - $t);
            $out = $out + strpos($index, substr($in, $t, 1)) * $bcp;
        }

        if (is_numeric($pad_up)) {
            $pad_up--;

            if ($pad_up > 0) {
                $out -= pow($base, $pad_up);
            }
        }
    } else {
        // Digital number  -->>  alphabet letter code
        if (is_numeric($pad_up)) {
            $pad_up--;

            if ($pad_up > 0) {
                $in += pow($base, $pad_up);
            }
        }

        for ($t = ($in != 0 ? floor(log($in, $base)) : 0); $t >= 0; $t--) {
            $bcp = bcpow($base, $t);
            $a   = floor($in / $bcp) % $base;
            $out = $out . substr($index, $a, 1);
            $in  = $in - ($a * $bcp);
        }
    }

    return $out;
}


/*
* php delete function that deals with directories recursively
*/

if ( ! function_exists('delete_files'))
{
    function getcronSet($endTime, $fireTime, $startTime) {


        // GMT time zone
        $gmtTimezone = new DateTimeZone('GMT');
        $myDateTime = new DateTime($startTime, $gmtTimezone);
        $startTime =  $myDateTime->format('Y-m-d H:i:s'); //2

        $myDateTime2 = new DateTime($endTime, $gmtTimezone);
        $endTime =  $myDateTime2->format('Y-m-d H:i:s');//3

        $time = new DateTime($endTime);
        $time->sub(new DateInterval('PT' . $fireTime . 'S'));
        $fire_time = $time->format('Y-m-d H:i:s'); //4

        $php_sleep = $time->format('s'); //1
        $minute = $time->format('i');
        $minute = ltrim($minute, '0');
        $hour = $time->format('H');
        $day = $time->format('j');
        $month = $time->format('n');

        $cronSet = $minute.' '.$hour.' '.$day.' '.$month.' *'; //0
        $result = array($cronSet, $php_sleep, $startTime, $endTime, $fire_time);

        return $result;

    }
}



if ( ! function_exists('delete_files'))
{
    function delete_files($target) {
        if(is_dir($target)){
            $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

            foreach( $files as $file )
            {
                delete_files( $file );
            }

            rmdir( $target );
        } elseif(is_file($target)) {
            unlink( $target );
        }
    }

}
if ( ! function_exists('seoUrl'))
{
    function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}

if ( ! function_exists('truncate'))
{
    function truncate($input, $maxWords, $maxChars)
    {
        $words = preg_split('/\s+/', $input);
        $words = array_slice($words, 0, $maxWords);
        $words = array_reverse($words);

        $chars = 0;
        $truncated = array();

        while(count($words) > 0)
        {
            $fragment = trim(array_pop($words));
            $chars += strlen($fragment);

            if($chars > $maxChars) break;

            $truncated[] = $fragment;
        }

        $result = implode($truncated, ' ');

        return $result . ($input == $result ? '' : '...');
    }
}



if ( ! function_exists('service_phone_number'))
{
    function service_phone_number() {
        $string = '888-705-0777';
        return $string;
    }
}





setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    }

    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

    return $clean;
}




if ( ! function_exists('setcron')) {

    function setcron($method, $id, $time) {
        $output = '';

        date_default_timezone_set('America/Los_Angeles');
        $ci =& get_instance();

        /* $ci->db->where ('id', '1');
         $qu = $ci->db->get ( 'settings' );
         $settings = $qu->result_array ();
         $document_root = $settings[0]['document_root']; */

        $document_root = getcwd();

        $uri2 = $method;
        $uri3 = $id;
        $lockwait = 2;       // seconds to wait for lock
        $waittime = 250000;  // microseconds to wait between lock attempts     // 2s / 250000us = 8 attempts.
        $cron_file = '/tmp/crontab.txt';
        //Clean all Cron Jobs
        file_put_contents($cron_file, "");

        if($method === 'delete') {
            //lets delete it ALL
            echo exec('crontab -r');
        }

        else if($method === 'add') {

            $output = shell_exec('crontab -l');

            if( $fh = fopen($cron_file, 'a') ) {
                $waitsum = 0;
                // attempt to get exclusive, non-blocking lock
                $locked = flock($fh, LOCK_EX | LOCK_NB);
                while( !$locked && ($waitsum <= $lockwait) ) {
                    $waitsum += $waittime/1000000; // microseconds to seconds
                    usleep($waittime);
                    $locked = flock($fh, LOCK_EX | LOCK_NB);
                }
                if( !$locked ) {
                    // echo "Could not lock $myfile for write within $lockwait seconds.";
                } else {
                    // write out your data here
                    file_put_contents($cron_file, $output.$time.' php '.$document_root.'cron.php --run=/functions/crontools/'.$id.PHP_EOL);

                    flock($fh, LOCK_UN);  // ALWAYS unlock
                }
                fclose($fh);            // ALWAYS close your file handle

            } else {
                //  echo "Could not open $myfile";
                // exit 1;
            }
            echo exec('crontab /tmp/crontab.txt');
        } else if($method === 'view') {
            echo exec('crontab -l');
        } else if($method === 'update') {
            $output = shell_exec('crontab -l');
            $remove_cron = $time.' php '.$document_root.'cron.php --run=/functions/crontools/'.$id;
            $remove_cron = str_replace($remove_cron."\n", "", $output);


            if( $fh = fopen($cron_file, 'a') ) {
                $waitsum = 0;
                // attempt to get exclusive, non-blocking lock
                $locked = flock($fh, LOCK_EX | LOCK_NB);
                while( !$locked && ($waitsum <= $lockwait) ) {
                    $waitsum += $waittime/1000000; // microseconds to seconds
                    usleep($waittime);
                    $locked = flock($fh, LOCK_EX | LOCK_NB);
                }
                if( !$locked ) {
                    // echo "Could not lock $myfile for write within $lockwait seconds.";
                } else {
                    // write out your data here
                    $remove_cron = $time.' php '.$document_root.'cron.php --run=/functions/crontools/'.$id;
                    $remove_cron = str_replace($remove_cron."\n", "", $output);
                    file_put_contents($cron_file, $remove_cron.PHP_EOL);

                    flock($fh, LOCK_UN);  // ALWAYS unlock
                }
                fclose($fh);            // ALWAYS close your file handle
            } else {
                //  echo "Could not open $myfile";
                // exit 1;
            }
            echo exec("crontab $cron_file");
        }

        //  print $uri2;



    }


}



if ( ! function_exists('formate_news_date'))
{
    function formate_news_date($date) {

        $date = strtotime( $date);
        $date = date( 'd.m.Y H:i', $date );

        return $date;
    }
}


if ( ! function_exists('formate_news_date_short'))
{
    function formate_news_date_short($date) {

        $date = strtotime( $date);
        $date = date( 'm/d/Y', $date );

        return $date;
    }
}
if ( ! function_exists('short_date'))
{
    function short_date($date) {
        if(!empty ($date)) {
            $date = strtotime( $date);
            $date = date( 'M d', $date );

            return $date;

        } else {
            return $date;
        }
    }
}


if ( ! function_exists('show_time'))
{
    function show_time($date) {

        $date = strtotime( $date);
        $date = date( 'H:i', $date );

        return $date;
    }
}




if ( ! function_exists('add_zero'))
{
    function add_zero($part){


        $r =0;
        do {
            $part .=  '0';
            $i = strlen($part);
        } while ($i <5);

        return $part;
    }
}







if ( ! function_exists('check_onbehalfof')) {
    function check_onbehalfof($val) {
        $out ='';
        if(! empty($val)){


            $out = ($val);



            return $out;
        }
    }

}




if ( ! function_exists('category_type_url'))
{
    function category_type_url($val) {
        $out ='';


        if($val == '1') {
            $out = 'tops';
        } else {
            $out = 'legs';
        }


        return $out;
    }

}

if ( ! function_exists('category_type_title'))
{
    function category_type_title($val) {
        $out ='';


        if($val == '1') {
            $out = 'Tops';
        } else {
            $out = 'Bases';
        }


        return $out;
    }

}



if ( ! function_exists('account_status'))
{
    function account_status($val) {
        $out ='';
        if(! empty($val)){
            if($val == '1') {$out ='Active'; }
            if($val == '2') {$out ='Disabled'; }


        }

        return $out;
    }

}


if ( ! function_exists('format_ru_mouth'))
{
    function format_ru_mouth($val) {
        $out ='';
        if(! empty($val)){

            if($val == 'January') {$out ='января'; }
            if($val == 'February') {$out ='февраля'; }
            if($val == 'March') {$out ='марта'; }
            if($val == 'April') {$out ='апреля';  }
            if($val == 'May') {$out ='мая';  }
            if($val == 'June') {$out ='июня';  }
            if($val == 'July') {$out ='июля';  }
            if($val == 'August') {$out ='августа';  }
            if($val == 'September') {$out ='сентября';  }
            if($val == 'October') {$out ='октября';  }
            if($val == 'November') {$out ='ноября';  }
            if($val == 'December') {$out ='декабря';  }

        }

        return $out;
    }

}




if ( ! function_exists('format_ua_mouth'))
{
    function format_ua_mouth($val) {
        $out ='';
        if(! empty($val)){

            if($val == 'January') {$out ='січня'; }
            if($val == 'February') {$out ='лютого'; }
            if($val == 'March') {$out ='березня'; }
            if($val == 'April') {$out ='квітня';  }
            if($val == 'May') {$out ='травня';  }
            if($val == 'June') {$out ='червня';  }
            if($val == 'July') {$out ='липня';  }
            if($val == 'August') {$out ='серпня';  }
            if($val == 'September') {$out ='вересня';  }
            if($val == 'October') {$out ='жовтня';  }
            if($val == 'November') {$out ='листопада';  }
            if($val == 'December') {$out ='грудня';  }

        }

        return $out;
    }

}
function getStartAndEndDate($week, $year) {

    return $ret;
}

function getLastWeeks($weekOffset) {
    $i = 0;
    $dateArray = array();
    while ($i <= $weekOffset) {
        $week = date('W', strtotime("-$i week"));
        $year = date('Y', strtotime("-$i week"));
        //$ret = $this->getStartAndEndDate($week, $year);

        $dto = new DateTime();
        $ret['week_start'] = $dto->setISODate($year, $week)->format('d.m');
        $ret['week_end'] = $dto->modify('+6 days')->format('d.m');


        $dateArray[] = $ret['week_start'] . ' - '. $ret['week_end']; //1 week ago

        $i++;
    }
    //array_reverse
    return array_reverse($dateArray);
}

function getPeriodWeeks($weekOffset) {
    $i = 0;
    $dateArray = '';

    $week = date('W', $weekOffset);
    $year = date('Y', $weekOffset);
    //$ret = $this->getStartAndEndDate($week, $year);

    $dto = new DateTime();
    $ret['week_start'] = $dto->setISODate($year, $week)->format('d.m');
    $ret['week_end'] = $dto->modify('+6 days')->format('d.m');


    $dateArray  = $ret['week_start'] . ' - '. $ret['week_end']; //1 week ago

    //array_reverse
    return ($dateArray);
}


function getLastMonth($monthOffset) {
    $i = 0;
    $dateArray = array();
    while ($i <= $monthOffset) {
        $month = date('m', strtotime("-$i month"));
        $year = date('Y', strtotime("-$i month"));
        //$ret = $this->getStartAndEndDate($week, $year);

        $dto = new DateTime();
        $ret['week_start'] = $dto->setDate ($year, $month, 1)->format('m.y');

        $dateArray[] = $ret['week_start']; //1 week ago

        $i++;
    }
    //array_reverse
    return array_reverse($dateArray);
}


function getLastNDays($days, $format = 'd/m'){
    $m = date("m"); $de= date("d"); $y= date("Y");
    $dateArray = array();
    for($i=0; $i<=$days-1; $i++){
        $dateArray[] = '"' . date($format, mktime(0,0,0,$m,($de-$i),$y)) . '"';
    }
    return array_reverse($dateArray);
}

if ( ! function_exists('format_ru_week'))
{
    function format_ru_week($val) {
        $out ='';
        if(! empty($val)){
            $val = str_replace('"', '', $val);
            if($val == 'Monday') {$out ='Пн'; }
            if($val == 'Tuesday') {$out ='Вт'; }
            if($val == 'Wednesday') {$out ='Ср'; }
            if($val == 'Thursday') {$out ='Чт';  }
            if($val == 'Friday') {$out ='Пт';  }
            if($val == 'Saturday') {$out ='Сб';  }
            if($val == 'Sunday') {$out ='Вс';  }
        }

        return $out;
    }

}


// $biggs would be the biggest num in your set
// (assuming a "max" value graph-building situation
function RoundUptoNearestN($biggs){

    $rounders = (strlen($biggs)-2) * -1;
    $places = strlen($biggs)-2;
    $holder = '';
    $counter = 0;
    while ($counter <= $places) {
        $counter++;
        if($counter==1) {
            $holder = $holder.'1'; }
        else {
            $holder = $holder.'0'; }
    }

    $biggs = $biggs + $holder;
    $biggs = round($biggs, $rounders);

    if($biggs<100 ) {

        if($biggs > 10) {
            $biggs = 100;
        } else {
            $biggs = 10; }
    }
    return $biggs;
}




if ( ! function_exists('format_ua_week'))
{
    function format_ua_week($val) {
        $out ='';
        if(! empty($val)){
            $val = str_replace('"', '', $val);
            if($val == 'Monday') {$out ='Пн'; }
            if($val == 'Tuesday') {$out ='Вт'; }
            if($val == 'Wednesday') {$out ='Ср'; }
            if($val == 'Thursday') {$out ='Чт';  }
            if($val == 'Friday') {$out ='Пт';  }
            if($val == 'Saturday') {$out ='Сб';  }
            if($val == 'Sunday') {$out ='Нд';  }
        }

        return $out;
    }

}

if ( ! function_exists('format_en_week'))
{
    function format_en_week($val) {
        $out ='';
        if(! empty($val)){
            $val = str_replace('"', '', $val);
            if($val == 'Monday') {$out ='Mo'; }
            if($val == 'Tuesday') {$out ='Tu'; }
            if($val == 'Wednesday') {$out ='We'; }
            if($val == 'Thursday') {$out ='Th';  }
            if($val == 'Friday') {$out ='Fr';  }
            if($val == 'Saturday') {$out ='Sa';  }
            if($val == 'Sunday') {$out ='Su';  }
        }

        return $out;
    }

}




if ( ! function_exists('conditions_full_name'))
{
    function conditions_full_name($val) {
        $out ='';
        if(! empty($val)){

            if($val == '3000') {$out ='Used'; }
            if($val == '1000') {$out ='New'; }
            if($val == '7000') {$out ='For parts or not working'; }
            if($val == '1500') {$out ='New other (see details)';  }
            if($val == '2500') {$out ='Seller refurbished';  }
            if($val == '2000') {$out ='Manufacturer refurbished';  }

        }

        return $out;
    }

}





if ( ! function_exists('main_category_name'))
{
    function main_category_name($val) {
        $out ='';
        if(! empty($val)){
            if($val == '9355') {$out ='Cell Phones & Smartphones'; }
            if($val == '175672') {$out ='Laptops & Netbooks';  }
            if($val == '171485') {$out ='COMPUTERS & TABLETS > <b>iPads, Tablets & eBook Readers</b>';  }
            if($val == '176970') {$out ='COMPUTERS & TABLETS > iPad/Tablet/eBook Accessories';  }
            if($val == '73839') {$out ='iPods & MP3 Players';  }
            if($val == '58297') {$out ='Watches';  }
            if($val == '58297') {$out ='Home Networking & Connectivity > Modems'; }
            if($val == '31530') {$out ='Laptop & Desktop Accessories'; }
            if($val == '9394') {$out ='Cell Phone Accessories';}
            if($val == '175673') {$out ='Computer Components & Parts'; }



        }

        return $out;
    }

}




function langPlans($title, $current_lang) {
    if($current_lang == 'uk') {
        $title = str_replace("этаж", 'поверх', $title);
        $title = str_replace("-й уровень", '-й рівень', $title);
        $title = str_replace("Террасы", 'Тераси', $title);
        $title = str_replace("Пентхаус", 'Пентхаус', $title);
        $title = str_replace("Офис", 'Офіс', $title);
        $title   = str_replace("м²", 'm²', $title);


    } else  if($current_lang == 'en') {
        $title = str_replace("Секция", 'Section', $title);
        $title = str_replace("этаж", 'floor', $title);
        $title = str_replace("-й уровень", 'st level', $title);
        $title = str_replace("Террасы", 'Terraces', $title);
        $title = str_replace("Офис", 'Office', $title);
        $title = str_replace("Пентхаус", 'Penthouse', $title);
        $title   = str_replace("м²", 'м²', $title);
        $title   = str_replace("№", 'No. ', $title);

        $title   = str_replace("к", 'r.', $title);
        $title   = str_replace("пент.", 'penth.', $title);
        $title   = str_replace("офис", 'office', $title);
    }

    return $title;
}




















if ( ! function_exists('rrmdir'))
{


    function rrmdir($path) {
        // Open the source directory to read in files
        $i = new DirectoryIterator($path);
        foreach($i as $f) {
            if($f->isFile()) {
                unlink($f->getRealPath());
            } else if(!$f->isDot() && $f->isDir()) {
                rrmdir($f->getRealPath());
            }
        }
        rmdir($path);
    }

}