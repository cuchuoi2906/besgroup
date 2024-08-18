<?php

class utilLib
{
    public function errorDisp($error)
    {
        echo "<html><head><title>Error!!</title></head>";
        echo "<body bgcolor=\"*FFFFFF\">";
        echo "<h2 align=\"center\">";

        echo "<font color=\"red\">$error</font>";

        echo "</h2><h2 align=\"center\"></h2>";
        echo "<p></p><p align=\"center\">";
        echo "<form><div align=\"center\">";
        echo "<input type=\"button\" value=\"戻る\" onClick=\"history.back()\"></div>";
        echo "</form>";
        echo "<p></p><h2 align=\"center\"></h2>";
        echo "</body></html>";
    }
    public static function strRep($str, $mode)
    {
        switch ($mode) {
            case 0:
                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = preg_replace("/\\\\/", "", $str[$i]);
                            $str[$i] = preg_replace("/\|/", "", $str[$i]);
                            $str[$i] = preg_replace("/&/", "", $str[$i]);
                            $str[$i] = preg_replace("/\@/", "", $str[$i]);
                            $str[$i] = preg_replace("/;/", "", $str[$i]);
                            $str[$i] = preg_replace("/`/", "", $str[$i]);
                        }
                    } else {
                        $str = preg_replace("/\\\\/", "", $str);
                        $str = preg_replace("/\|/", "", $str);
                        $str = preg_replace("/&/", "", $str);
                        $str = preg_replace("/\@/", "", $str);
                        $str = preg_replace("/;/", "", $str);
                        $str = preg_replace("/`/", "", $str);
                    }
                }
                break;
            case 1:
                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = htmlspecialchars($str[$i]);
                        }
                    } else {
                        $str = htmlspecialchars($str);
                    }
                }

                break;
            case 2:

                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = preg_replace("/[\r\n]/", "", $str[$i]);
                        }
                    } else {
                        $str = preg_replace("/[\r\n]/", "", $str);
                    }
                }
                break;
            case 3:
                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = preg_replace("/[\r\n]/", "<br>", $str[$i]);
                        }
                    } else {
                        $str = preg_replace("/[\r\n]/", "<br>", $str);
                    }
                }

                break;

            case 4:
                if (!empty($str) && get_magic_quotes_gpc()) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = stripslashes($str[$i]);
                        }
                    } else {
                        $str = stripslashes($str);
                    }
                }

                break;

            case 5:
                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = addslashes($str[$i]);
                        }
                    } else {
                        $str = addslashes($str);
                    }
                }

                break;

            case 6:
                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = str_replace(",", "&*44;", $str[$i]);
                        }
                    } else {
                        $str = str_replace(",", "&*44;", $str);
                    }
                }

                break;

            case 7:
                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = preg_replace("/^[[:space:]]{0,}/", "", $str[$i]);
                            $str[$i] = preg_replace("/[[:space:]]{0,}$/", "", $str[$i]);
                            $str[$i] = mb_ereg_replace("^(　){0,}", "", $str[$i]);
                            $str[$i] = mb_ereg_replace("(　){0,}$", "", $str[$i]);
                            $str[$i] = trim($str[$i]);    
                        }
                    } else {
                        $str = preg_replace("/^[[:space:]]{0,}/", "", $str);
                        $str = preg_replace("/[[:space:]]{0,}$/", "", $str);
                        $str = mb_ereg_replace("^(　){0,}", "", $str);
                        $str = mb_ereg_replace("(　){0,}$", "", $str);
                        $str = trim($str);    
                    }
                }
                break;

            case 8:
                if (!empty($str)) {
                    if (is_array($str)) {
                        for ($i=0;$i<count($str);$i++) {
                            $str[$i] = strip_tags($str[$i]);
                        }
                    } else {
                        $str = strip_tags($str);
                    }
                }

                break;
        }

        return $str;   

    }
  
    public static function strCheck($str, $mode, $mes)
    {
        $errmes = "";    
        switch ($mode) {

            
            case 0:
                if ($str == "") {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 1:
                if (preg_match("/[[:blank:]]|[[:space:]]/", $str)) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 2:
                if (preg_match("/[^0-9]/", $str)) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 3:
                if (preg_match("/[^_a-zA-Z0-9]/", $str)) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 4:
                if (preg_match("/\.$|\/$|\@$|,$/", $str)) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 5:
                if (preg_match("/\||&|\/|\"|\\\/", $str)) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 6:
                if (!preg_match("/^(.+)@(.+)\\.(.+)$/", $str)) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 7:
                if ($str == true) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 8:
                if ($str == false) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;
            
            case 9:
                if ($str == null) {
                    $errmes .= "{$mes}<br>\n";
                }
                break;

        }

        return $errmes;
    }
    
    
    public static function returnstrCheck($str, $mode)
    {
        switch ($mode) {

            
            case 0:
                if ($str == "") {
                    return false; 
                }else {
                    return true; 
                }
                break;
            
            case 1:
                if (preg_match("/[[:blank:]]|[[:space:]]/", $str)) {
                    return false;
                }else {
                    return true; 
                }
                break;
            
            case 2:
                if (preg_match("/[^0-9]/", $str)) {
                    return false;
                }else {
                    return true; 
                }
                break;
            
            case 3:
                if (preg_match("/[^_a-zA-Z0-9]/", $str)) {
                    return false;
                }else {
                    return true; 
                }
                break;
            
            case 4:
                if (preg_match("/\.$|\/$|\@$|,$/", $str)) {
                    return false;
                }else {
                    return true; 
                }
                break;
            
            case 5:
                if (preg_match("/\||&|\/|\"|\\\/", $str)) {
                    return false;
                }else {
                    return true; 
                }
                break;
            
            case 6:
                if (!preg_match("/^(.+)@(.+)\\.(.+)$/", $str)) {
                    return false;
                }else {
                    return true; 
                }
                break;
            
            case 7:
                if ($str == true) {
                   return false;
                }else {
                    return true; 
                }
                break;
            
            case 8:
                if ($str == false) {
                    return false;
                }else {
                    return true; 
                }
                break;
            
            case 9:
                if ($str == null) {
                    return false;
                }else {
                    return true; 
                }
                break;

        }

        
    }
    
    public static function httpHeadersPrint($charset="", $css_js_flg=false, $time_flg=false, $cache_flg=false, $robot_flg=false)
    {

        if (!$charset) {
            $charset = "utf-8P";
        }
        header("Content-Type: text/html; charset={$charset}");
        header("Content-Language: ja");

        if ($css_js_flg) {
            header("Content-Style-Type: text/css");
            header("Content-Script-Type: text/javascript");
        }

        if ($time_flg) {
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        }

        if ($cache_flg) {
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Cache-Control: no-cache, no-store");
            header("Pragma: no-cache");
        }

        if ($robot_flg) {
            header("Robots: noindex,nofollow");
            header("Robots: noarchive");
        }
    }
  
    public function browserChk()
    {
        $ua_chk = $_SERVER['HTTP_USER_AGENT'];

        if (stristr($ua_chk, "MSIE")) {
            $result = false;
        } elseif (stristr($ua_chk, "Opera")) {
            $result = false;
        } elseif (stristr($ua_chk, "Netscape")) {
            $result = false;
        } elseif (stristr($ua_chk, "Safari")) {
            $result = false;
        } elseif (stristr($ua_chk, "Gecko")) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
   
    public function limitExec($start_arr, $end_arr="")
    {

        if (empty($start_arr)) {
            die("開始時間が設定されていません");
        } elseif (is_array($start_arr)) {
            $st = sprintf("%04d", $start_arr[0]);
            for ($i=1;$i<=5;$i++) {
                $st .= sprintf("%02d", $start_arr[$i]);
            }
        } else {
            die("開始時間は年月日時分秒をそれぞれ配列で指定してください");
        }

        if (!empty($end_arr)) {
            if (is_array($end_arr)) {
                $et = sprintf("%04d", $end_arr[0]);
                for ($i=1;$i<=5;$i++) {
                    $et .= sprintf("%02d", $end_arr[$i]);
                }
            } else {
                die("終了時間を設定する場合は年月日時分秒をそれぞれ配列で指定してください");
            }
        }

        $nt = date("YmdHis");
        if (empty($end_arr)) {
            $result = ($nt > $st)?true:false;
            return $result;
        } else {
            $result = (($nt > $st) && ($nt < $et))?true:false;
            return $result;
        }
    }
    
    public static function getRequestParams($type = "", $rep_mode = array(), $HanToZen = true)
    {

        $method_type = array();
        $param = array();

        if (strtoupper($type) == 'GET') {
            $method_type = $_GET;
        } else {
            $method_type = $_POST;
        }

        foreach ($method_type as $k=>$e) {

            if (!empty($rep_mode)) {
                foreach ($rep_mode as $mode) {
                    $e = utilLib::strRep($e, $mode);
                }
            }

            if (is_string($e) && $HanToZen) {
                switch ($HanToZen) {
                    case "m":
                        $e = mb_convert_kana($e, "KV");
                        break;
                    case "i":
                        $e = i18n_ja_jp_hantozen($e, "KV");
                        break;
                    default:
                        $e = mb_convert_kana($e, "KV");
                        break;
                }
            }

            $params[$k] = $e;
        }

        return $params;
    }

}
