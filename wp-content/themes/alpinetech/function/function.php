<?php

function h14s_han2zen(&$str)
{
    $str = str_replace("&amp;", "＆", $str);
    $str = str_replace("&quot;", "”", $str);
    $str = str_replace("&lt;", "＜", $str);
    $str = str_replace("&gt;", "＞", $str);
    $str = str_replace("&#39", "’", $str);
    $str = str_replace("'", "’", $str);
    $str = str_replace("&", "＆", $str);
    $str = str_replace("%", "%25", $str);
    $str = str_replace("+", "%2b", $str);

    return $str;
}

function getInitData($colum = "")
{
    global $PDO;
    if (!$colum) {
        $colum = "EMAIL1";
    }
    $sql = "SELECT {$colum} FROM APP_INIT_DATA WHERE(RES_ID = '1')";
    $fetch = $PDO->fetch($sql);
    return $fetch[0][$colum];
}


function getPermitIPList($bo_id)
{
    global $PDO;
    if (!$bo_id || empty($bo_id)) {
        return false;
    }
    $sql = "SELECT PERMIT_IP_LST FROM APP_ID_PASS WHERE(BO_ID = '".utilLib::strRep($bo_id, 5)."')";
    $fetch = $PDO -> fetch($sql);
    return explode(",", $fetch[0]["PERMIT_IP_LST"]);
}

function location($url)
{
    echo '<html><head><title></title></head>';
    echo '<body onLoad="Javascript:document.location.submit();">';
    echo '<form name="location" action="'.$url.'" method="post">';
    echo '</form></body></html>';
    echo '<noscript>header("Location: '.$url.'");</noscript>';
    exit();
}

function html_tag($str)
{
    $str = mb_convert_kana($str, "KV");
    $str = strip_tags($str, "<span><p><a><b><i><strong><em><u><iframe><object><param><embed>");
    $str = utilLib::strRep($str, 7); 
    $str = utilLib::strRep($str, 4); 
    $str = utilLib::strRep($str, 5); 

    return $str;
}
$layer_free = "Layer_free";

function nl2br2($str)
{
    return preg_replace('/(\r\n)|\n|\r/', "<br>", $str);
}
function search_file_disp($path, $con, $option = "", $size_lock = null)
{
    $disp_image = "";

    if ($path && $con) {
        $s_data = glob($path.$con);

        if (file_exists($s_data[0]) && !empty($s_data[0])) {
            if ($size_lock == 2) {
                $disp_image = $s_data[0];
            } elseif ($size_lock == 1) {
                $size = getimagesize($s_data[0]);
                $disp_image = "<img src=\"".$s_data[0]."?r=".rand()."\" width=\"".$size[0]."\" height=\"".$size[1]."\" ".$option.">";
            } else {
                $disp_image = "<img src=\"".$s_data[0]."?r=".rand()."\" ".$option.">";
            }
        }
    }

    return $disp_image;
}

function search_file_flg($path, $con)
{

    if ($path && $con) {
        $s_data = glob($path.$con);

        if (file_exists($s_data[0]) && !empty($s_data[0])) {
            return true;
        }
    }

    return false;
}

function search_file_del($path, $con)
{

  
    if ($path && $con && ($con != "*")) {

        if (glob($path.$con)) {
            foreach (glob($path.$con) as $filename) {
                if (($filename != "") && file_exists($filename)) {
                    unlink($filename) or die("ファイルの削除に失敗しました。");
                }
            }
        }
    }
}

function mbody_auto_lf($body = "")
{
    $part_length = 400;
   
    $line        = mb_split("\n", $body);
    $body_tmp    = null;
    $line_length = 0;

    
    for ($i = 0; $i < count($line); $i++) {
        $line_length = strlen($line[$i]);
        $one_line    = null;

        if ($line_length > ($part_length * 2)) {

            $mb_length = mb_strlen($line[$i]);

            if (($mb_length % $part_length) == 0) {
                $loop_cnt = $mb_length / $part_length;

            } else {
                $loop_cnt = ceil(mb_strlen($line[$i]) / $part_length);
            }

            $start_num = 0;

            for ($j = 1; $j <= $loop_cnt; $j++) {

                $one_line .= mb_substr($line[$i], $start_num, $part_length) . "\n";
                $start_num = $part_length * $j;
            }
        } else {
            $one_line = $line[$i] . "\n";
        }
        $body_tmp .= $one_line;
    }

    $search_replace = array(
            "①"=>"(1)",
            "②"=>"(2)",
            "③"=>"(3)",
            "④"=>"(4)",
            "⑤"=>"(5)",
            "⑥"=>"(6)",
            "⑦"=>"(7)",
            "⑧"=>"(8)",
            "⑨"=>"(9)",
            "⑩"=>"(10)",
            "⑪"=>"(11)",
            "⑫"=>"(12)",
            "⑬"=>"(13)",
            "⑭"=>"(14)",
            "⑮"=>"(15)",
            "⑯"=>"(16)",
            "⑰"=>"(17)",
            "⑱"=>"(18)",
            "⑲"=>"(19)",
            "⑳"=>"(20)",
            "Ⅰ"=>"I",
            "Ⅱ"=>"II",
            "Ⅲ"=>"III",
            "Ⅳ"=>"IV",
            "Ⅴ"=>"V",
            "Ⅵ"=>"VI",
            "Ⅶ"=>"VII",
            "Ⅷ"=>"VIII",
            "Ⅸ"=>"IX",
            "Ⅹ"=>"X",
            "㍉"=>"ミリ",
            "㌔"=>"キロ",
            "㌢"=>"センチ",
            "㍍"=>"メートル",
            "㌘"=>"グラム",
            "㌧"=>"トン",
            "㌃"=>"アール",
            "㌶"=>"ヘクタール",
            "㍑"=>"リットル",
            "㍗"=>"ワット",
            "㌍"=>"カロリー",
            "㌦"=>"ドル",
            "㌣"=>"セント",
            "㌫"=>"パーセント",
            "㍊"=>"ミリバール",
            "㌻"=>"ページ",
            "㎜"=>"mm",
            "㎝"=>"cm",
            "㎞"=>"km",
            "㎎"=>"mg",
            "㎏"=>"kg",
            "㏄"=>"cc",
            "㎡"=>"m2",
            "㍻"=>"平成",
            "㍾"=>"明治",
            "㍽"=>"大正",
            "㍼"=>"昭和",
            "№"=>"No.",
            "℡"=>"TEL",
            "㈱"=>"(株)",
            "㈲"=>"(有)",
            "㈹"=>"(代)",
            "ⅰ"=>"i",
            "ⅱ"=>"ii",
            "ⅲ"=>"iii",
            "ⅳ"=>"iv",
            "ⅴ"=>"v",
            "ⅵ"=>"vi",
            "ⅶ"=>"vii",
            "ⅷ"=>"viii",
            "ⅸ"=>"ix",
            "ⅹ"=>"x",
            "–"=>"-",
            "‒"=>"-",
            "亞"=>"亜",
            "惡"=>"悪",
            "壓"=>"圧",
            "圍"=>"囲",
            "爲"=>"為",
            "醫"=>"医",
            "壹"=>"壱",
            "稻"=>"稲",
            "飮"=>"飲",
            "隱"=>"隠",
            "羽"=>"羽",
            "營"=>"営",
            "榮"=>"栄",
            "衞"=>"衛",
            "益"=>"益",
            "驛"=>"駅",
            "悅"=>"悦",
            "圓"=>"円",
            "艷"=>"艶",
            "鹽"=>"塩",
            "奧"=>"奥",
            "應"=>"応",
            "橫"=>"横",
            "歐"=>"欧",
            "毆"=>"殴",
            "穩"=>"穏",
            "假"=>"仮",
            "價"=>"価",
            "畫"=>"画",
            "會"=>"会",
            "囘"=>"回",
            "懷"=>"懐",
            "繪"=>"絵",
            "擴"=>"拡",
            "殼"=>"殻",
            "覺"=>"覚",
            "學"=>"学",
            "嶽"=>"岳",
            "樂"=>"楽",
            "勸"=>"勧",
            "卷"=>"巻",
            "寬"=>"寛",
            "歡"=>"歓",
            "罐"=>"缶",
            "觀"=>"観",
            "閒"=>"間",
            "關"=>"関",
            "陷"=>"陥",
            "館"=>"館",
            "巖"=>"巌",
            "顏"=>"顔",
            "歸"=>"帰",
            "氣"=>"気",
            "龜"=>"亀",
            "僞"=>"偽",
            "戲"=>"戯",
            "犧"=>"犠",
            "卻"=>"却",
            "糺"=>"糾",
            "舊"=>"旧",
            "據"=>"拠",
            "擧"=>"挙",
            "峽"=>"峡",
            "挾"=>"挟",
            "敎"=>"教",
            "狹"=>"狭",
            "鄕"=>"郷",
            "堯"=>"尭",
            "曉"=>"暁",
            "區"=>"区",
            "驅"=>"駆",
            "勳"=>"勲",
            "薰"=>"薫",
            "羣"=>"群",
            "徑"=>"径",
            "惠"=>"恵",
            "攜"=>"携",
            "溪"=>"渓",
            "經"=>"経",
            "繼"=>"継",
            "莖"=>"茎",
            "螢"=>"蛍",
            "輕"=>"軽",
            "鷄"=>"鶏",
            "藝"=>"芸",
            "缺"=>"欠",
            "儉"=>"倹",
            "劍"=>"剣",
            "圈"=>"圏",
            "檢"=>"検",
            "權"=>"権",
            "獻"=>"献",
            "縣"=>"県",
            "險"=>"険",
            "顯"=>"顕",
            "驗"=>"験",
            "嚴"=>"厳",
            "效"=>"効",
            "廣"=>"広",
            "恆"=>"恒",
            "鑛"=>"鉱",
            "號"=>"号",
            "國"=>"国",
            "黑"=>"黒",
            "濟"=>"済",
            "碎"=>"砕",
            "齋"=>"斎",
            "劑"=>"剤",
            "冱"=>"冴",
            "櫻"=>"桜",
            "册"=>"冊",
            "雜"=>"雑",
            "參"=>"参",
            "慘"=>"惨",
            "棧"=>"桟",
            "蠶"=>"蚕",
            "贊"=>"賛",
            "殘"=>"残",
            "絲"=>"糸",
            "飼"=>"飼",
            "齒"=>"歯",
            "兒"=>"児",
            "辭"=>"辞",
            "濕"=>"湿",
            "實"=>"実",
            "舍"=>"舎",
            "寫"=>"写",
            "釋"=>"釈",
            "壽"=>"寿",
            "收"=>"収",
            "從"=>"従",
            "澁"=>"渋",
            "獸"=>"獣",
            "縱"=>"縦",
            "肅"=>"粛",
            "處"=>"処",
            "緖"=>"緒",
            "諸"=>"諸",
            "敍"=>"叙",
            "奬"=>"奨",
            "將"=>"将",
            "牀"=>"床",
            "燒"=>"焼",
            "祥"=>"祥",
            "稱"=>"称",
            "證"=>"証",
            "乘"=>"乗",
            "剩"=>"剰",
            "壤"=>"壌",
            "孃"=>"嬢",
            "條"=>"条",
            "淨"=>"浄",
            "疊"=>"畳",
            "穰"=>"穣",
            "讓"=>"譲",
            "釀"=>"醸",
            "囑"=>"嘱",
            "觸"=>"触",
            "寢"=>"寝",
            "愼"=>"慎",
            "晉"=>"晋",
            "眞"=>"真",
            "神"=>"神",
            "刄"=>"刃",
            "盡"=>"尽",
            "圖"=>"図",
            "粹"=>"粋",
            "醉"=>"酔",
            "隨"=>"随",
            "髓"=>"髄",
            "數"=>"数",
            "樞"=>"枢",
            "瀨"=>"瀬",
            "晴"=>"晴",
            "淸"=>"清",
            "精"=>"精",
            "靑"=>"青",
            "聲"=>"声",
            "靜"=>"静",
            "齊"=>"斉",
            "蹟"=>"跡",
            "攝"=>"摂",
            "竊"=>"窃",
            "專"=>"専",
            "戰"=>"戦",
            "淺"=>"浅",
            "潛"=>"潜",
            "纖"=>"繊",
            "踐"=>"践",
            "錢"=>"銭",
            "禪"=>"禅",
            "曾"=>"曽",
            "雙"=>"双",
            "壯"=>"壮",
            "搜"=>"捜",
            "插"=>"挿",
            "爭"=>"争",
            "窗"=>"窓",
            "總"=>"総",
            "聰"=>"聡",
            "莊"=>"荘",
            "裝"=>"装",
            "騷"=>"騒",
            "增"=>"増",
            "臟"=>"臓",
            "藏"=>"蔵",
            "屬"=>"属",
            "續"=>"続",
            "墮"=>"堕",
            "體"=>"体",
            "對"=>"対",
            "帶"=>"帯",
            "滯"=>"滞",
            "臺"=>"台",
            "瀧"=>"滝",
            "擇"=>"択",
            "澤"=>"沢",
            "單"=>"単",
            "擔"=>"担",
            "膽"=>"胆",
            "團"=>"団",
            "彈"=>"弾",
            "斷"=>"断",
            "癡"=>"痴",
            "遲"=>"遅",
            "晝"=>"昼",
            "蟲"=>"虫",
            "鑄"=>"鋳",
            "猪"=>"猪",
            "廳"=>"庁",
            "聽"=>"聴",
            "敕"=>"勅",
            "鎭"=>"鎮",
            "塚"=>"塚",
            "遞"=>"逓",
            "鐵"=>"鉄",
            "轉"=>"転",
            "點"=>"点",
            "傳"=>"伝",
            "都"=>"都",
            "黨"=>"党",
            "盜"=>"盗",
            "燈"=>"灯",
            "當"=>"当",
            "鬪"=>"闘",
            "德"=>"徳",
            "獨"=>"独",
            "讀"=>"読",
            "屆"=>"届",
            "繩"=>"縄",
            "貳"=>"弐",
            "姙"=>"妊",
            "黏"=>"粘",
            "惱"=>"悩",
            "腦"=>"脳",
            "霸"=>"覇",
            "廢"=>"廃",
            "拜"=>"拝",
            "賣"=>"売",
            "麥"=>"麦",
            "發"=>"発",
            "髮"=>"髪",
            "拔"=>"抜",
            "飯"=>"飯",
            "蠻"=>"蛮",
            "祕"=>"秘",
            "濱"=>"浜",
            "甁"=>"瓶",
            "福"=>"福",
            "拂"=>"払",
            "佛"=>"仏",
            "竝"=>"並",
            "變"=>"変",
            "邊"=>"辺",
            "邉"=>"辺",
            "辨"=>"弁",
            "辯"=>"弁",
            "瓣"=>"弁",
            "舖"=>"舗",
            "穗"=>"穂",
            "寶"=>"宝",
            "萠"=>"萌",
            "襃"=>"褒",
            "豐"=>"豊",
            "沒"=>"没",
            "飜"=>"翻",
            "槇"=>"槙",
            "萬"=>"万",
            "滿"=>"満",
            "默"=>"黙",
            "餠"=>"餅",
            "彌"=>"弥",
            "藥"=>"薬",
            "譯"=>"訳",
            "藪"=>"薮",
            "豫"=>"予",
            "餘"=>"余",
            "與"=>"与",
            "譽"=>"誉",
            "搖"=>"揺",
            "樣"=>"様",
            "謠"=>"謡",
            "遙"=>"遥",
            "瑤"=>"瑶",
            "慾"=>"欲",
            "來"=>"来",
            "賴"=>"頼",
            "亂"=>"乱",
            "覽"=>"覧",
            "畧"=>"略",
            "隆"=>"隆",
            "龍"=>"竜",
            "兩"=>"両",
            "獵"=>"猟",
            "綠"=>"緑",
            "鄰"=>"隣",
            "凛"=>"凜",
            "壘"=>"塁",
            "勵"=>"励",
            "禮"=>"礼",
            "隸"=>"隷",
            "靈"=>"霊",
            "齡"=>"齢",
            "戀"=>"恋",
            "爐"=>"炉",
            "勞"=>"労",
            "朗"=>"朗",
            "樓"=>"楼",
            "郞"=>"郎",
            "祿"=>"禄",
            "亙"=>"亘",
            "灣"=>"湾",
            "琢"=>"琢",
            "渚"=>"渚",
            "瑤"=>"瑶",
            "禎"=>"禎",
            "遙"=>"遥",
            "髙"=>"高",
            "﨑"=>"崎",
            "㟢"=>"嵜",
            "濵"=>"濱",
            "槗"=>"橋",
            "耒"=>"来",
            "𠮷"=>"吉"
        );

    return htmlspecialchars_decode(strtr($body_tmp, $search_replace));
}

function key_word_con($str="")
{

    $str = strip_tags($str);
    $str = utilLib::strRep($str, 7);
    $str = utilLib::strRep($str, 4);
    $str = mb_convert_kana($str, "KV");
    $str = mb_convert_kana($str, "AK", "UTF-8");
    $str = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
    $str = addslashes($str);
    return $str;
}

function get_top_url($type=0, $ht="")
{
    $base_path = dirname(__FILE__)."/";
    $base_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $base_path);

    if ($type==1) {
        $base_path = $_SERVER["HTTP_HOST"].$base_path;
        $url = empty($_SERVER["HTTPS"]) ? "http://".$base_path : "https://".$base_path;

    } elseif ($type==2) {
        $url = $_SERVER['DOCUMENT_ROOT'];

    } else {
        $url = $base_path;
    }

    return $url;
}


if ( ! function_exists( 'divclassid_the_custom_logo' ) ) :
    /**
     * Displays the optional custom logo.
     *
     * Does nothing if the custom logo is not available.
     *
     * @since DivClassID_Theme 1.2
     */
    function divclassid_the_custom_logo() {
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
    }
    endif;
    

add_filter('all_plugins', 'hide_acf_plugins_from_list');
function hide_acf_plugins_from_list($plugins) {
    $plugins_to_hide = array(
        'advanced-custom-fields/acf.php',
        'advanced-custom-fields-pro/acf.php'
    );
    
    foreach ($plugins_to_hide as $plugin) {
        if (isset($plugins[$plugin])) {
            unset($plugins[$plugin]);
        }
    }
    
    return $plugins;
}
add_action('admin_menu', 'remove_custom_fields_menu');
function remove_custom_fields_menu() {
    remove_menu_page('edit.php?post_type=acf-field-group');
}
    