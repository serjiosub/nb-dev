<?php

// Base class for language detection
// https://la2ha.ru/dev-seo-diy/web/lang_detect
// 
class LanguageDetector
{
	var $language = null;

    public function __construct()
    {
        if ($list = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']) : null) {
            if (preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', $list, $list)) {
                $this->language = array_combine($list[1], $list[2]);
                foreach ($this->language as $n => $v)
                    $this->language[$n] = $v ? $v : 1;
                arsort($this->language, SORT_NUMERIC);
            }

        } else $this->language = array();
    }

    public function getBestMatch($default, $langs)
    {
        $languages=array();
        foreach ($langs as $lang => $alias) {
            if (is_array($alias)) {
                foreach ($alias as $alias_lang) {
                    $languages[strtolower($alias_lang)] = strtolower($lang);
                }
            }else $languages[strtolower($alias)]=strtolower($lang);
        }
        foreach ($this->language as $l => $v) {
            $s = strtok($l, '-'); // убираем то что идет после тире в языках вида "en-us, ru-ru"
            if (isset($languages[$s]))
                return $languages[$s];
        }
        return $default;
    }
}



// Language detection entry point
$langs = array(
  'ru' => array('ru', 'be', 'ky', 'ab', 'mo', 'et', 'lv'),
  'ua' => 'uk' 
);

$objLanguageDetector = new LanguageDetector;

$lang = $objLanguageDetector->getBestMatch('en', $langs);

// Redirect to new language
header('Status: 301 Moved Permanently', false, 301);
header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $lang);
//header("Location: /" . $lang);

//echo($lang);

exit();

?>