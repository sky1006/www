<?php $GLOBALS['_beginTime'] = microtime(TRUE);
defined('APP_NAME') or define('APP_NAME', 'Admin');
defined('APP_PATH') or define('APP_PATH', './Admin/');
defined('MEMORY_LIMIT_ON') or define('MEMORY_LIMIT_ON', true);
defined('RUNTIME_PATH') or define('RUNTIME_PATH', './Admin/Runtime/');
defined('APP_DEBUG') or define('APP_DEBUG', false);
defined('RUNTIME_FILE') or define('RUNTIME_FILE', './Admin/Runtime/~runtime.php');
defined('THINK_PATH') or define('THINK_PATH', 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/');
defined('THINK_VERSION') or define('THINK_VERSION', '3.1.2');
defined('MAGIC_QUOTES_GPC') or define('MAGIC_QUOTES_GPC', false);
defined('IS_CGI') or define('IS_CGI', 0);
defined('IS_WIN') or define('IS_WIN', 1);
defined('IS_CLI') or define('IS_CLI', 0);
defined('_PHP_FILE_') or define('_PHP_FILE_', '/ThinkPHP/admin.php');
defined('__ROOT__') or define('__ROOT__', '/ThinkPHP');
defined('URL_COMMON') or define('URL_COMMON', 0);
defined('URL_PATHINFO') or define('URL_PATHINFO', 1);
defined('URL_REWRITE') or define('URL_REWRITE', 2);
defined('URL_COMPAT') or define('URL_COMPAT', 3);
defined('CORE_PATH') or define('CORE_PATH', 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/');
defined('EXTEND_PATH') or define('EXTEND_PATH', 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Extend/');
defined('MODE_PATH') or define('MODE_PATH', 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Extend/Mode/');
defined('ENGINE_PATH') or define('ENGINE_PATH', 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Extend/Engine/');
defined('VENDOR_PATH') or define('VENDOR_PATH', 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Extend/Vendor/');
defined('LIBRARY_PATH') or define('LIBRARY_PATH', 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Extend/Library/');
defined('COMMON_PATH') or define('COMMON_PATH', './Admin/Common/');
defined('LIB_PATH') or define('LIB_PATH', './Admin/Lib/');
defined('CONF_PATH') or define('CONF_PATH', './Admin/Conf/');
defined('LANG_PATH') or define('LANG_PATH', './Admin/Lang/');
defined('TMPL_PATH') or define('TMPL_PATH', './Admin/Tpl/');
defined('HTML_PATH') or define('HTML_PATH', './Admin/Html/');
defined('LOG_PATH') or define('LOG_PATH', './Admin/Runtime/Logs/');
defined('TEMP_PATH') or define('TEMP_PATH', './Admin/Runtime/Temp/');
defined('DATA_PATH') or define('DATA_PATH', './Admin/Runtime/Data/');
defined('CACHE_PATH') or define('CACHE_PATH', './Admin/Runtime/Cache/');
set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);
function G($start, $end = '', $dec = 4)
{
    static $_info = array();
    static $_mem = array();
    if (is_float($end)) {
        $_info[$start] = $end;
    } elseif (!empty($end)) {
        if (!isset($_info[$end])) $_info[$end] = microtime(TRUE);
        if (MEMORY_LIMIT_ON && $dec == 'm') {
            if (!isset($_mem[$end])) $_mem[$end] = memory_get_usage();
            return number_format(($_mem[$end] - $_mem[$start]) / 1024);
        } else {
            return number_format(($_info[$end] - $_info[$start]), $dec);
        }
    } else {
        $_info[$start] = microtime(TRUE);
        if (MEMORY_LIMIT_ON) $_mem[$start] = memory_get_usage();
    }
}

function N($key, $step = 0, $save = false)
{
    static $_num = array();
    if (!isset($_num[$key])) {
        $_num[$key] = (false !== $save) ? S('N_' . $key) : 0;
    }
    if (empty($step)) return $_num[$key]; else $_num[$key] = $_num[$key] + (int)$step;
    if (false !== $save) {
        S('N_' . $key, $_num[$key], $save);
    }
}

function parse_name($name, $type = 0)
{
    if ($type) {
        return ucfirst(preg_replace("/_([a-zA-Z])/e", "strtoupper('\\1')", $name));
    } else {
        return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
    }
}

function require_cache($filename)
{
    static $_importFiles = array();
    if (!isset($_importFiles[$filename])) {
        if (file_exists_case($filename)) {
            require $filename;
            $_importFiles[$filename] = true;
        } else {
            $_importFiles[$filename] = false;
        }
    }
    return $_importFiles[$filename];
}

function require_array($array, $return = false)
{
    foreach ($array as $file) {
        if (require_cache($file) && $return) return true;
    }
    if ($return) return false;
}

function file_exists_case($filename)
{
    if (is_file($filename)) {
        if (IS_WIN && C('APP_FILE_CASE')) {
            if (basename(realpath($filename)) != basename($filename)) return false;
        }
        return true;
    }
    return false;
}

function import($class, $baseUrl = '', $ext = '.class.php')
{
    static $_file = array();
    $class = str_replace(array('.', '#'), array('/', '.'), $class);
    if ('' === $baseUrl && false === strpos($class, '/')) {
        return alias_import($class);
    }
    if (isset($_file[$class . $baseUrl])) return true; else $_file[$class . $baseUrl] = true;
    $class_strut = explode('/', $class);
    if (empty($baseUrl)) {
        $libPath = defined('BASE_LIB_PATH') ? BASE_LIB_PATH : LIB_PATH;
        if ('@' == $class_strut[0] || APP_NAME == $class_strut[0]) {
            $baseUrl = dirname($libPath);
            $class = substr_replace($class, basename($libPath) . '/', 0, strlen($class_strut[0]) + 1);
        } elseif ('think' == strtolower($class_strut[0])) {
            $baseUrl = CORE_PATH;
            $class = substr($class, 6);
        } elseif (in_array(strtolower($class_strut[0]), array('org', 'com'))) {
            $baseUrl = LIBRARY_PATH;
        } else {
            $class = substr_replace($class, '', 0, strlen($class_strut[0]) + 1);
            $baseUrl = APP_PATH . '../' . $class_strut[0] . '/' . basename($libPath) . '/';
        }
    }
    if (substr($baseUrl, -1) != '/') $baseUrl .= '/';
    $classfile = $baseUrl . $class . $ext;
    if (!class_exists(basename($class), false)) {
        return require_cache($classfile);
    }
}

function load($name, $baseUrl = '', $ext = '.php')
{
    $name = str_replace(array('.', '#'), array('/', '.'), $name);
    if (empty($baseUrl)) {
        if (0 === strpos($name, '@/')) {
            $baseUrl = COMMON_PATH;
            $name = substr($name, 2);
        } else {
            $baseUrl = EXTEND_PATH . 'Function/';
        }
    }
    if (substr($baseUrl, -1) != '/') $baseUrl .= '/';
    require_cache($baseUrl . $name . $ext);
}

function vendor($class, $baseUrl = '', $ext = '.php')
{
    if (empty($baseUrl)) $baseUrl = VENDOR_PATH;
    return import($class, $baseUrl, $ext);
}

function alias_import($alias, $classfile = '')
{
    static $_alias = array();
    if (is_string($alias)) {
        if (isset($_alias[$alias])) {
            return require_cache($_alias[$alias]);
        } elseif ('' !== $classfile) {
            $_alias[$alias] = $classfile;
            return;
        }
    } elseif (is_array($alias)) {
        $_alias = array_merge($_alias, $alias);
        return;
    }
    return false;
}

function D($name = '', $layer = '')
{
    if (empty($name)) return new Model;
    static $_model = array();
    $layer = $layer ? $layer : C('DEFAULT_M_LAYER');
    if (strpos($name, '://')) {
        $name = str_replace('://', '/' . $layer . '/', $name);
    } else {
        $name = C('DEFAULT_APP') . '/' . $layer . '/' . $name;
    }
    if (isset($_model[$name])) return $_model[$name];
    import($name . $layer);
    $class = basename($name . $layer);
    if (class_exists($class)) {
        $model = new $class();
    } else {
        $model = new Model(basename($name));
    }
    $_model[$name] = $model;
    return $model;
}

function M($name = '', $tablePrefix = '', $connection = '')
{
    static $_model = array();
    if (strpos($name, ':')) {
        list($class, $name) = explode(':', $name);
    } else {
        $class = 'Model';
    }
    $guid = $tablePrefix . $name . '_' . $class;
    if (!isset($_model[$guid])) $_model[$guid] = new $class($name, $tablePrefix, $connection);
    return $_model[$guid];
}

function A($name, $layer = '', $common = false)
{
    static $_action = array();
    $layer = $layer ? $layer : C('DEFAULT_C_LAYER');
    if (strpos($name, '://')) {
        $name = str_replace('://', '/' . $layer . '/', $name);
    } else {
        $name = '@/' . $layer . '/' . $name;
    }
    if (isset($_action[$name])) return $_action[$name];
    if ($common) {
        import(str_replace('@/', '', $name) . $layer, LIB_PATH);
    } else {
        import($name . $layer);
    }
    $class = basename($name . $layer);
    if (class_exists($class, false)) {
        $action = new $class();
        $_action[$name] = $action;
        return $action;
    } else {
        return false;
    }
}

function R($url, $vars = array(), $layer = '')
{
    $info = pathinfo($url);
    $action = $info['basename'];
    $module = $info['dirname'];
    $class = A($module, $layer);
    if ($class) {
        if (is_string($vars)) {
            parse_str($vars, $vars);
        }
        return call_user_func_array(array(&$class, $action . C('ACTION_SUFFIX')), $vars);
    } else {
        return false;
    }
}

function L($name = null, $value = null)
{
    static $_lang = array();
    if (empty($name)) return $_lang;
    if (is_string($name)) {
        $name = strtoupper($name);
        if (is_null($value)) return isset($_lang[$name]) ? $_lang[$name] : $name;
        $_lang[$name] = $value;
        return;
    }
    if (is_array($name)) $_lang = array_merge($_lang, array_change_key_case($name, CASE_UPPER));
    return;
}

function C($name = null, $value = null)
{
    static $_config = array();
    if (empty($name)) {
        if (!empty($value) && $array = S('c_' . $value)) {
            $_config = array_merge($_config, array_change_key_case($array));
        }
        return $_config;
    }
    if (is_string($name)) {
        if (!strpos($name, '.')) {
            $name = strtolower($name);
            if (is_null($value)) return isset($_config[$name]) ? $_config[$name] : null;
            $_config[$name] = $value;
            return;
        }
        $name = explode('.', $name);
        $name[0] = strtolower($name[0]);
        if (is_null($value)) return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : null;
        $_config[$name[0]][$name[1]] = $value;
        return;
    }
    if (is_array($name)) {
        $_config = array_merge($_config, array_change_key_case($name));
        if (!empty($value)) {
            S('c_' . $value, $_config);
        }
        return;
    }
    return null;
}

function tag($tag, &$params = NULL)
{
    $extends = C('extends.' . $tag);
    $tags = C('tags.' . $tag);
    if (!empty($tags)) {
        if (empty($tags['_overlay']) && !empty($extends)) {
            $tags = array_unique(array_merge($extends, $tags));
        } elseif (isset($tags['_overlay'])) {
            unset($tags['_overlay']);
        }
    } elseif (!empty($extends)) {
        $tags = $extends;
    }
    if ($tags) {
        if (APP_DEBUG) {
            G($tag . 'Start');
            trace('[ ' . $tag . ' ] --START--', '', 'INFO');
        }
        foreach ($tags as $key => $name) {
            if (!is_int($key)) {
                $name = $key;
            }
            B($name, $params);
        }
        if (APP_DEBUG) {
            trace('[ ' . $tag . ' ] --END-- [ RunTime:' . G($tag . 'Start', $tag . 'End', 6) . 's ]', '', 'INFO');
        }
    } else {
        return false;
    }
}

function add_tag_behavior($tag, $behavior, $path = '')
{
    $array = C('tags.' . $tag);
    if (!$array) {
        $array = array();
    }
    if ($path) {
        $array[$behavior] = $path;
    } else {
        $array[] = $behavior;
    }
    C('tags.' . $tag, $array);
}

function B($name, &$params = NULL)
{
    $class = $name . 'Behavior';
    if (APP_DEBUG) {
        G('behaviorStart');
    }
    $behavior = new $class();
    $behavior->run($params);
    if (APP_DEBUG) {
        G('behaviorEnd');
        trace('Run ' . $name . ' Behavior [ RunTime:' . G('behaviorStart', 'behaviorEnd', 6) . 's ]', '', 'INFO');
    }
}

function strip_whitespace($content)
{
    $stripStr = '';
    $tokens = token_get_all($content);
    $last_space = false;
    for ($i = 0, $j = count($tokens); $i < $j; $i++) {
        if (is_string($tokens[$i])) {
            $last_space = false;
            $stripStr .= $tokens[$i];
        } else {
            switch ($tokens[$i][0]) {
                case T_COMMENT:
                case T_DOC_COMMENT:
                    break;
                case T_WHITESPACE:
                    if (!$last_space) {
                        $stripStr .= ' ';
                        $last_space = true;
                    }
                    break;
                case T_START_HEREDOC:
                    $stripStr .= "<<<THINK\n";
                    break;
                case T_END_HEREDOC:
                    $stripStr .= "THINK;\n";
                    for ($k = $i + 1; $k < $j; $k++) {
                        if (is_string($tokens[$k]) && $tokens[$k] == ';') {
                            $i = $k;
                            break;
                        } else if ($tokens[$k][0] == T_CLOSE_TAG) {
                            break;
                        }
                    }
                    break;
                default:
                    $last_space = false;
                    $stripStr .= $tokens[$i][1];
            }
        }
    }
    return $stripStr;
}

function trace($value = '[think]', $label = '', $level = 'DEBUG', $record = false)
{
    static $_trace = array();
    if ('[think]' === $value) {
        return $_trace;
    } else {
        $info = ($label ? $label . ':' : '') . print_r($value, true);
        if ('ERR' == $level && C('TRACE_EXCEPTION')) {
            throw_exception($info);
        }
        $level = strtoupper($level);
        if (!isset($_trace[$level])) {
            $_trace[$level] = array();
        }
        $_trace[$level][] = $info;
        if ((defined('IS_AJAX') && IS_AJAX) || !C('SHOW_PAGE_TRACE') || $record) {
            Log::record($info, $level, $record);
        }
    }
}

class Think
{
    private static $_instance = array();

    static public function start()
    {
        register_shutdown_function(array('Think', 'fatalError'));
        set_error_handler(array('Think', 'appError'));
        set_exception_handler(array('Think', 'appException'));
        spl_autoload_register(array('Think', 'autoload'));
        App::run();
        return;
    }

    public static function autoload($class)
    {
        if (alias_import($class)) return;
        $libPath = defined('BASE_LIB_PATH') ? BASE_LIB_PATH : LIB_PATH;
        $group = defined('GROUP_NAME') && C('APP_GROUP_MODE') == 0 ? GROUP_NAME . '/' : '';
        $file = $class . '.class.php';
        if (substr($class, -8) == 'Behavior') {
            if (require_array(array(CORE_PATH . 'Behavior/' . $file, EXTEND_PATH . 'Behavior/' . $file, LIB_PATH . 'Behavior/' . $file, $libPath . 'Behavior/' . $file), true) || (defined('MODE_NAME') && require_cache(MODE_PATH . ucwords(MODE_NAME) . '/Behavior/' . $file))) {
                return;
            }
        } elseif (substr($class, -5) == 'Model') {
            if (require_array(array(LIB_PATH . 'Model/' . $group . $file, $libPath . 'Model/' . $file, EXTEND_PATH . 'Model/' . $file), true)) {
                return;
            }
        } elseif (substr($class, -6) == 'Action') {
            if (require_array(array(LIB_PATH . 'Action/' . $group . $file, $libPath . 'Action/' . $file, EXTEND_PATH . 'Action/' . $file), true)) {
                return;
            }
        } elseif (substr($class, 0, 5) == 'Cache') {
            if (require_array(array(EXTEND_PATH . 'Driver/Cache/' . $file, CORE_PATH . 'Driver/Cache/' . $file), true)) {
                return;
            }
        } elseif (substr($class, 0, 2) == 'Db') {
            if (require_array(array(EXTEND_PATH . 'Driver/Db/' . $file, CORE_PATH . 'Driver/Db/' . $file), true)) {
                return;
            }
        } elseif (substr($class, 0, 8) == 'Template') {
            if (require_array(array(EXTEND_PATH . 'Driver/Template/' . $file, CORE_PATH . 'Driver/Template/' . $file), true)) {
                return;
            }
        } elseif (substr($class, 0, 6) == 'TagLib') {
            if (require_array(array(EXTEND_PATH . 'Driver/TagLib/' . $file, CORE_PATH . 'Driver/TagLib/' . $file), true)) {
                return;
            }
        }
        $paths = explode(',', C('APP_AUTOLOAD_PATH'));
        foreach ($paths as $path) {
            if (import($path . '.' . $class)) return;
        }
    }

    static public function instance($class, $method = '')
    {
        $identify = $class . $method;
        if (!isset(self::$_instance[$identify])) {
            if (class_exists($class)) {
                $o = new $class();
                if (!empty($method) && method_exists($o, $method)) self::$_instance[$identify] = call_user_func_array(array(&$o, $method)); else self::$_instance[$identify] = $o;
            } else halt(L('_CLASS_NOT_EXIST_') . ':' . $class);
        }
        return self::$_instance[$identify];
    }

    static public function appException($e)
    {
        halt($e->__toString());
    }

    static public function appError($errno, $errstr, $errfile, $errline)
    {
        switch ($errno) {
            case E_ERROR:
            case E_PARSE:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
                ob_end_clean();
                if (C('OUTPUT_ENCODE')) {
                    $zlib = ini_get('zlib.output_compression');
                    if (empty($zlib)) ob_start('ob_gzhandler');
                }
                $errorStr = "$errstr " . $errfile . " 第 $errline 行.";
                if (C('LOG_RECORD')) Log::write("[$errno] " . $errorStr, Log::ERR);
                function_exists('halt') ? halt($errorStr) : exit('ERROR:' . $errorStr);
                break;
            case E_STRICT:
            case E_USER_WARNING:
            case E_USER_NOTICE:
            default:
                $errorStr = "[$errno] $errstr " . $errfile . " 第 $errline 行.";
                trace($errorStr, '', 'NOTIC');
                break;
        }
    }

    static public function fatalError()
    {
        if ($e = error_get_last()) {
            Think::appError($e['type'], $e['message'], $e['file'], $e['line']);
        }
    }
}

class ThinkException extends Exception
{
    private $type;
    private $extra;

    public function __construct($message, $code = 0, $extra = false)
    {
        parent::__construct($message, $code);
        $this->type = get_class($this);
        $this->extra = $extra;
    }

    public function __toString()
    {
        $trace = $this->getTrace();
        if ($this->extra) array_shift($trace);
        $this->class = isset($trace[0]['class']) ? $trace[0]['class'] : '';
        $this->function = isset($trace[0]['function']) ? $trace[0]['function'] : '';
        $this->file = $trace[0]['file'];
        $this->line = $trace[0]['line'];
        $file = file($this->file);
        $traceInfo = '';
        $time = date('y-m-d H:i:m');
        foreach ($trace as $t) {
            $traceInfo .= '[' . $time . '] ' . $t['file'] . ' (' . $t['line'] . ') ';
            $traceInfo .= $t['class'] . $t['type'] . $t['function'] . '(';
            $traceInfo .= implode(', ', $t['args']);
            $traceInfo .= ")\n";
        }
        $error['message'] = $this->message;
        $error['type'] = $this->type;
        $error['detail'] = L('_MODULE_') . '[' . MODULE_NAME . '] ' . L('_ACTION_') . '[' . ACTION_NAME . ']' . "\n";
        $error['detail'] .= ($this->line - 2) . ': ' . $file[$this->line - 3];
        $error['detail'] .= ($this->line - 1) . ': ' . $file[$this->line - 2];
        $error['detail'] .= '<font color="#FF6600" >' . ($this->line) . ': <strong>' . $file[$this->line - 1] . '</strong></font>';
        $error['detail'] .= ($this->line + 1) . ': ' . $file[$this->line];
        $error['detail'] .= ($this->line + 2) . ': ' . $file[$this->line + 1];
        $error['class'] = $this->class;
        $error['function'] = $this->function;
        $error['file'] = $this->file;
        $error['line'] = $this->line;
        $error['trace'] = $traceInfo;
        if (C('LOG_EXCEPTION_RECORD')) {
            Log::Write('(' . $this->type . ') ' . $this->message);
        }
        return $error;
    }
}

abstract class Behavior
{
    protected $options = array();

    public function __construct()
    {
        if (!empty($this->options)) {
            foreach ($this->options as $name => $val) {
                if (NULL !== C($name)) {
                    $this->options[$name] = C($name);
                } else {
                    C($name, $val);
                }
            }
            array_change_key_case($this->options);
        }
    }

    public function __get($name)
    {
        return $this->options[strtolower($name)];
    }

    abstract public function run(&$params);
}

class ReadHtmlCacheBehavior extends Behavior
{
    protected $options = array('HTML_CACHE_ON' => false, 'HTML_CACHE_TIME' => 60, 'HTML_CACHE_RULES' => array(), 'HTML_FILE_SUFFIX' => '.html',);

    public function run(&$params)
    {
        if (C('HTML_CACHE_ON')) {
            $cacheTime = $this->requireHtmlCache();
            if (false !== $cacheTime && $this->checkHTMLCache(HTML_FILE_NAME, $cacheTime)) {
                readfile(HTML_FILE_NAME);
                exit();
            }
        }
    }

    static private function requireHtmlCache()
    {
        $htmls = C('HTML_CACHE_RULES');
        if (!empty($htmls)) {
            $htmls = array_change_key_case($htmls);
            $moduleName = strtolower(MODULE_NAME);
            $actionName = strtolower(ACTION_NAME);
            if (isset($htmls[$moduleName . ':' . $actionName])) {
                $html = $htmls[$moduleName . ':' . $actionName];
            } elseif (isset($htmls[$moduleName . ':'])) {
                $html = $htmls[$moduleName . ':'];
            } elseif (isset($htmls[$actionName])) {
                $html = $htmls[$actionName];
            } elseif (isset($htmls['*'])) {
                $html = $htmls['*'];
            } elseif (isset($htmls['empty:index']) && !class_exists(MODULE_NAME . 'Action')) {
                $html = $htmls['empty:index'];
            } elseif (isset($htmls[$moduleName . ':_empty']) && $this->isEmptyAction(MODULE_NAME, ACTION_NAME)) {
                $html = $htmls[$moduleName . ':_empty'];
            }
            if (!empty($html)) {
                $rule = $html[0];
                $rule = preg_replace('/{\$(_\w+)\.(\w+)\|(\w+)}/e', "\\3(\$\\1['\\2'])", $rule);
                $rule = preg_replace('/{\$(_\w+)\.(\w+)}/e', "\$\\1['\\2']", $rule);
                $rule = preg_replace('/{(\w+)\|(\w+)}/e', "\\2(\$_GET['\\1'])", $rule);
                $rule = preg_replace('/{(\w+)}/e', "\$_GET['\\1']", $rule);
                $rule = str_ireplace(array('{:app}', '{:module}', '{:action}', '{:group}'), array(APP_NAME, MODULE_NAME, ACTION_NAME, defined('GROUP_NAME') ? GROUP_NAME : ''), $rule);
                $rule = preg_replace('/{|(\w+)}/e', "\\1()", $rule);
                if (!empty($html[2])) $rule = $html[2]($rule);
                $cacheTime = isset($html[1]) ? $html[1] : C('HTML_CACHE_TIME');
                define('HTML_FILE_NAME', HTML_PATH . $rule . C('HTML_FILE_SUFFIX'));
                return $cacheTime;
            }
        }
        return false;
    }

    static public function checkHTMLCache($cacheFile = '', $cacheTime = '')
    {
        if (!is_file($cacheFile)) {
            return false;
        } elseif (filemtime(C('TEMPLATE_NAME')) > filemtime($cacheFile)) {
            return false;
        } elseif (!is_numeric($cacheTime) && function_exists($cacheTime)) {
            return $cacheTime($cacheFile);
        } elseif ($cacheTime != 0 && NOW_TIME > filemtime($cacheFile) + $cacheTime) {
            return false;
        }
        return true;
    }

    static private function isEmptyAction($module, $action)
    {
        $className = $module . 'Action';
        $class = new $className;
        return !method_exists($class, $action);
    }
}

class CheckRouteBehavior extends Behavior
{
    protected $options = array('URL_ROUTER_ON' => false, 'URL_ROUTE_RULES' => array(),);

    public function run(&$return)
    {
        $regx = trim($_SERVER['PATH_INFO'], '/');
        if (empty($regx)) return $return = true;
        if (!C('URL_ROUTER_ON')) return $return = false;
        $routes = C('URL_ROUTE_RULES');
        if (!empty($routes)) {
            $depr = C('URL_PATHINFO_DEPR');
            $regx = str_replace($depr, '/', $regx);
            foreach ($routes as $rule => $route) {
                if (0 === strpos($rule, '/') && preg_match($rule, $regx, $matches)) {
                    return $return = $this->parseRegex($matches, $route, $regx);
                } else {
                    $len1 = substr_count($regx, '/');
                    $len2 = substr_count($rule, '/');
                    if ($len1 >= $len2) {
                        if ('$' == substr($rule, -1, 1)) {
                            if ($len1 != $len2) {
                                continue;
                            } else {
                                $rule = substr($rule, 0, -1);
                            }
                        }
                        $match = $this->checkUrlMatch($regx, $rule);
                        if ($match) return $return = $this->parseRule($rule, $route, $regx);
                    }
                }
            }
        }
        $return = false;
    }

    private function checkUrlMatch($regx, $rule)
    {
        $m1 = explode('/', $regx);
        $m2 = explode('/', $rule);
        $match = true;
        foreach ($m2 as $key => $val) {
            if (':' == substr($val, 0, 1)) {
                if (strpos($val, '\\')) {
                    $type = substr($val, -1);
                    if ('d' == $type && !is_numeric($m1[$key])) {
                        $match = false;
                        break;
                    }
                } elseif (strpos($val, '^')) {
                    $array = explode('|', substr(strstr($val, '^'), 1));
                    if (in_array($m1[$key], $array)) {
                        $match = false;
                        break;
                    }
                }
            } elseif (0 !== strcasecmp($val, $m1[$key])) {
                $match = false;
                break;
            }
        }
        return $match;
    }

    private function parseUrl($url)
    {
        $var = array();
        if (false !== strpos($url, '?')) {
            $info = parse_url($url);
            $path = explode('/', $info['path']);
            parse_str($info['query'], $var);
        } elseif (strpos($url, '/')) {
            $path = explode('/', $url);
        } else {
            parse_str($url, $var);
        }
        if (isset($path)) {
            $var[C('VAR_ACTION')] = array_pop($path);
            if (!empty($path)) {
                $var[C('VAR_MODULE')] = array_pop($path);
            }
            if (!empty($path)) {
                $var[C('VAR_GROUP')] = array_pop($path);
            }
        }
        return $var;
    }

    private function parseRule($rule, $route, $regx)
    {
        $url = is_array($route) ? $route[0] : $route;
        $paths = explode('/', $regx);
        $matches = array();
        $rule = explode('/', $rule);
        foreach ($rule as $item) {
            if (0 === strpos($item, ':')) {
                if ($pos = strpos($item, '^')) {
                    $var = substr($item, 1, $pos - 1);
                } elseif (strpos($item, '\\')) {
                    $var = substr($item, 1, -2);
                } else {
                    $var = substr($item, 1);
                }
                $matches[$var] = array_shift($paths);
            } else {
                array_shift($paths);
            }
        }
        if (0 === strpos($url, '/') || 0 === strpos($url, 'http')) {
            if (strpos($url, ':')) {
                $values = array_values($matches);
                $url = preg_replace('/:(\d+)/e', '$values[\\1-1]', $url);
            }
            header("Location: $url", true, (is_array($route) && isset($route[1])) ? $route[1] : 301);
            exit;
        } else {
            $var = $this->parseUrl($url);
            $values = array_values($matches);
            foreach ($var as $key => $val) {
                if (0 === strpos($val, ':')) {
                    $var[$key] = $values[substr($val, 1) - 1];
                }
            }
            $var = array_merge($matches, $var);
            if ($paths) {
                preg_replace('@(\w+)\/([^\/]+)@e', '$var[strtolower(\'\\1\')]=strip_tags(\'\\2\');', implode('/', $paths));
            }
            if (is_array($route) && isset($route[1])) {
                parse_str($route[1], $params);
                $var = array_merge($var, $params);
            }
            $_GET = array_merge($var, $_GET);
        }
        return true;
    }

    private function parseRegex($matches, $route, $regx)
    {
        $url = is_array($route) ? $route[0] : $route;
        $url = preg_replace('/:(\d+)/e', '$matches[\\1]', $url);
        if (0 === strpos($url, '/') || 0 === strpos($url, 'http')) {
            header("Location: $url", true, (is_array($route) && isset($route[1])) ? $route[1] : 301);
            exit;
        } else {
            $var = $this->parseUrl($url);
            $regx = substr_replace($regx, '', 0, strlen($matches[0]));
            if ($regx) {
                preg_replace('@(\w+)\/([^,\/]+)@e', '$var[strtolower(\'\\1\')]=strip_tags(\'\\2\');', $regx);
            }
            if (is_array($route) && isset($route[1])) {
                parse_str($route[1], $params);
                $var = array_merge($var, $params);
            }
            $_GET = array_merge($var, $_GET);
        }
        return true;
    }
}

class LocationTemplateBehavior extends Behavior
{
    public function run(&$templateFile)
    {
        if (!file_exists_case($templateFile)) $templateFile = $this->parseTemplateFile($templateFile);
    }

    private function parseTemplateFile($templateFile)
    {
        if ('' == $templateFile) {
            $templateFile = C('TEMPLATE_NAME');
        } elseif (false === strpos($templateFile, C('TMPL_TEMPLATE_SUFFIX'))) {
            $path = explode(':', $templateFile);
            $action = array_pop($path);
            $module = !empty($path) ? array_pop($path) : MODULE_NAME;
            if (!empty($path)) {
                $path = dirname(THEME_PATH) . '/' . array_pop($path) . '/';
            } else {
                $path = THEME_PATH;
            }
            $templateFile = $path . $module . C('TMPL_FILE_DEPR') . $action . C('TMPL_TEMPLATE_SUFFIX');
        }
        if (!file_exists_case($templateFile)) throw_exception(L('_TEMPLATE_NOT_EXIST_') . '[' . $templateFile . ']');
        return $templateFile;
    }
}

class ParseTemplateBehavior extends Behavior
{
    protected $options = array('TMPL_ENGINE_TYPE' => 'Think', 'TMPL_CACHFILE_SUFFIX' => '.php', 'TMPL_DENY_FUNC_LIST' => 'echo,exit', 'TMPL_DENY_PHP' => false, 'TMPL_L_DELIM' => '{', 'TMPL_R_DELIM' => '}', 'TMPL_VAR_IDENTIFY' => 'array', 'TMPL_STRIP_SPACE' => true, 'TMPL_CACHE_ON' => true, 'TMPL_CACHE_PREFIX' => '', 'TMPL_CACHE_TIME' => 0, 'TMPL_LAYOUT_ITEM' => '{__CONTENT__}', 'LAYOUT_ON' => false, 'LAYOUT_NAME' => 'layout', 'TAGLIB_BEGIN' => '<', 'TAGLIB_END' => '>', 'TAGLIB_LOAD' => true, 'TAGLIB_BUILD_IN' => 'cx', 'TAGLIB_PRE_LOAD' => '',);

    public function run(&$_data)
    {
        $engine = strtolower(C('TMPL_ENGINE_TYPE'));
        $_content = empty($_data['content']) ? $_data['file'] : $_data['content'];
        $_data['prefix'] = !empty($_data['prefix']) ? $_data['prefix'] : C('TMPL_CACHE_PREFIX');
        if ('think' == $engine) {
            if ((!empty($_data['content']) && $this->checkContentCache($_data['content'], $_data['prefix'])) || $this->checkCache($_data['file'], $_data['prefix'])) {
                extract($_data['var'], EXTR_OVERWRITE);
                include C('CACHE_PATH') . $_data['prefix'] . md5($_content) . C('TMPL_CACHFILE_SUFFIX');
            } else {
                $tpl = Think::instance('ThinkTemplate');
                $tpl->fetch($_content, $_data['var'], $_data['prefix']);
            }
        } else {
            $class = 'Template' . ucwords($engine);
            if (class_exists($class)) {
                $tpl = new $class;
                $tpl->fetch($_content, $_data['var']);
            } else {
                throw_exception(L('_NOT_SUPPERT_') . ': ' . $class);
            }
        }
    }

    protected function checkCache($tmplTemplateFile, $prefix = '')
    {
        if (!C('TMPL_CACHE_ON')) return false;
        $tmplCacheFile = C('CACHE_PATH') . $prefix . md5($tmplTemplateFile) . C('TMPL_CACHFILE_SUFFIX');
        if (!is_file($tmplCacheFile)) {
            return false;
        } elseif (filemtime($tmplTemplateFile) > filemtime($tmplCacheFile)) {
            return false;
        } elseif (C('TMPL_CACHE_TIME') != 0 && time() > filemtime($tmplCacheFile) + C('TMPL_CACHE_TIME')) {
            return false;
        }
        if (C('LAYOUT_ON')) {
            $layoutFile = THEME_PATH . C('LAYOUT_NAME') . C('TMPL_TEMPLATE_SUFFIX');
            if (filemtime($layoutFile) > filemtime($tmplCacheFile)) {
                return false;
            }
        }
        return true;
    }

    protected function checkContentCache($tmplContent, $prefix = '')
    {
        if (is_file(C('CACHE_PATH') . $prefix . md5($tmplContent) . C('TMPL_CACHFILE_SUFFIX'))) {
            return true;
        } else {
            return false;
        }
    }
}

class ContentReplaceBehavior extends Behavior
{
    protected $options = array('TMPL_PARSE_STRING' => array(),);

    public function run(&$content)
    {
        $content = $this->templateContentReplace($content);
    }

    protected function templateContentReplace($content)
    {
        $replace = array('__TMPL__' => APP_TMPL_PATH, '__ROOT__' => __ROOT__, '__APP__' => __APP__, '__GROUP__' => defined('GROUP_NAME') ? __GROUP__ : __APP__, '__ACTION__' => __ACTION__, '__SELF__' => __SELF__, '__URL__' => __URL__, '../Public' => APP_TMPL_PATH . 'Public', '__PUBLIC__' => __ROOT__ . '/Public',);
        if (is_array(C('TMPL_PARSE_STRING'))) $replace = array_merge($replace, C('TMPL_PARSE_STRING'));
        $content = str_replace(array_keys($replace), array_values($replace), $content);
        return $content;
    }
}

class TokenBuildBehavior extends Behavior
{
    protected $options = array('TOKEN_ON' => false, 'TOKEN_NAME' => '__hash__', 'TOKEN_TYPE' => 'md5', 'TOKEN_RESET' => true,);

    public function run(&$content)
    {
        if (C('TOKEN_ON')) {
            if (strpos($content, '{__TOKEN__}')) {
                $content = str_replace('{__TOKEN__}', $this->buildToken(), $content);
            } elseif (preg_match('/<\/form(\s*)>/is', $content, $match)) {
                $content = str_replace($match[0], $this->buildToken() . $match[0], $content);
            }
        } else {
            $content = str_replace('{__TOKEN__}', '', $content);
        }
    }

    private function buildToken()
    {
        $tokenName = C('TOKEN_NAME');
        $tokenType = C('TOKEN_TYPE');
        if (!isset($_SESSION[$tokenName])) {
            $_SESSION[$tokenName] = array();
        }
        $tokenKey = md5($_SERVER['REQUEST_URI']);
        if (isset($_SESSION[$tokenName][$tokenKey])) {
            $tokenValue = $_SESSION[$tokenName][$tokenKey];
        } else {
            $tokenValue = $tokenType(microtime(TRUE));
            $_SESSION[$tokenName][$tokenKey] = $tokenValue;
        }
        $token = '<input type="hidden" name="' . $tokenName . '" value="' . $tokenKey . '_' . $tokenValue . '" />';
        return $token;
    }
}

class WriteHtmlCacheBehavior extends Behavior
{
    public function run(&$content)
    {
        if (C('HTML_CACHE_ON') && defined('HTML_FILE_NAME')) {
            if (!is_dir(dirname(HTML_FILE_NAME))) mkdir(dirname(HTML_FILE_NAME), 0755, true);
            if (false === file_put_contents(HTML_FILE_NAME, $content)) throw_exception(L('_CACHE_WRITE_ERROR_') . ':' . HTML_FILE_NAME);
        }
    }
}

class ShowRuntimeBehavior extends Behavior
{
    protected $options = array('SHOW_RUN_TIME' => false, 'SHOW_ADV_TIME' => false, 'SHOW_DB_TIMES' => false, 'SHOW_CACHE_TIMES' => false, 'SHOW_USE_MEM' => false, 'SHOW_LOAD_FILE' => false, 'SHOW_FUN_TIMES' => false,);

    public function run(&$content)
    {
        if (C('SHOW_RUN_TIME')) {
            if (false !== strpos($content, '{__NORUNTIME__}')) {
                $content = str_replace('{__NORUNTIME__}', '', $content);
            } else {
                $runtime = $this->showTime();
                if (strpos($content, '{__RUNTIME__}')) $content = str_replace('{__RUNTIME__}', $runtime, $content); else $content .= $runtime;
            }
        } else {
            $content = str_replace(array('{__NORUNTIME__}', '{__RUNTIME__}'), '', $content);
        }
    }

    private function showTime()
    {
        G('beginTime', $GLOBALS['_beginTime']);
        G('viewEndTime');
        $showTime = 'Process: ' . G('beginTime', 'viewEndTime') . 's ';
        if (C('SHOW_ADV_TIME')) {
            $showTime .= '( Load:' . G('beginTime', 'loadTime') . 's Init:' . G('loadTime', 'initTime') . 's Exec:' . G('initTime', 'viewStartTime') . 's Template:' . G('viewStartTime', 'viewEndTime') . 's )';
        }
        if (C('SHOW_DB_TIMES') && class_exists('Db', false)) {
            $showTime .= ' | DB :' . N('db_query') . ' queries ' . N('db_write') . ' writes ';
        }
        if (C('SHOW_CACHE_TIMES') && class_exists('Cache', false)) {
            $showTime .= ' | Cache :' . N('cache_read') . ' gets ' . N('cache_write') . ' writes ';
        }
        if (MEMORY_LIMIT_ON && C('SHOW_USE_MEM')) {
            $showTime .= ' | UseMem:' . number_format((memory_get_usage() - $GLOBALS['_startUseMems']) / 1024) . ' kb';
        }
        if (C('SHOW_LOAD_FILE')) {
            $showTime .= ' | LoadFile:' . count(get_included_files());
        }
        if (C('SHOW_FUN_TIMES')) {
            $fun = get_defined_functions();
            $showTime .= ' | CallFun:' . count($fun['user']) . ',' . count($fun['internal']);
        }
        return $showTime;
    }
}

class ShowPageTraceBehavior extends Behavior
{
    protected $options = array('SHOW_PAGE_TRACE' => false, 'TRACE_PAGE_TABS' => array('BASE' => '基本', 'FILE' => '文件', 'INFO' => '流程', 'ERR|NOTIC' => '错误', 'SQL' => 'SQL', 'DEBUG' => '调试'), 'PAGE_TRACE_SAVE' => false,);

    public function run(&$params)
    {
        if (!IS_AJAX && C('SHOW_PAGE_TRACE')) {
            echo $this->showTrace();
        }
    }

    private function showTrace()
    {
        $files = get_included_files();
        $info = array();
        foreach ($files as $key => $file) {
            $info[] = $file . ' ( ' . number_format(filesize($file) / 1024, 2) . ' KB )';
        }
        $trace = array();
        $base = array('请求信息' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . ' ' . $_SERVER['SERVER_PROTOCOL'] . ' ' . $_SERVER['REQUEST_METHOD'] . ' : ' . __SELF__, '运行时间' => $this->showTime(), '内存开销' => MEMORY_LIMIT_ON ? number_format((memory_get_usage() - $GLOBALS['_startUseMems']) / 1024, 2) . ' kb' : '不支持', '查询信息' => N('db_query') . ' queries ' . N('db_write') . ' writes ', '文件加载' => count(get_included_files()), '缓存信息' => N('cache_read') . ' gets ' . N('cache_write') . ' writes ', '配置加载' => count(c()), '会话信息' => 'SESSION_ID=' . session_id(),);
        $traceFile = CONF_PATH . 'trace.php';
        if (is_file($traceFile)) {
            $base = array_merge($base, include $traceFile);
        }
        $debug = trace();
        $tabs = C('TRACE_PAGE_TABS');
        foreach ($tabs as $name => $title) {
            switch (strtoupper($name)) {
                case 'BASE':
                    $trace[$title] = $base;
                    break;
                case 'FILE':
                    $trace[$title] = $info;
                    break;
                default:
                    $name = strtoupper($name);
                    if (strpos($name, '|')) {
                        $array = explode('|', $name);
                        $result = array();
                        foreach ($array as $name) {
                            $result += isset($debug[$name]) ? $debug[$name] : array();
                        }
                        $trace[$title] = $result;
                    } else {
                        $trace[$title] = isset($debug[$name]) ? $debug[$name] : '';
                    }
            }
        }
        if ($save = C('PAGE_TRACE_SAVE')) {
            if (is_array($save)) {
                $tabs = C('TRACE_PAGE_TABS');
                $array = array();
                foreach ($save as $tab) {
                    $array[] = $tabs[$tab];
                }
            }
            $content = date('[ c ]') . ' ' . get_client_ip() . ' ' . $_SERVER['REQUEST_URI'] . "\r\n";
            foreach ($trace as $key => $val) {
                if (!isset($array) || in_array($key, $array)) {
                    $content .= '[ ' . $key . " ]\r\n";
                    if (is_array($val)) {
                        foreach ($val as $k => $v) {
                            $content .= (!is_numeric($k) ? $k . ':' : '') . print_r($v, true) . "\r\n";
                        }
                    } else {
                        $content .= print_r($val, true) . "\r\n";
                    }
                    $content .= "\r\n";
                }
            }
            error_log(str_replace('<br/>', "\r\n", $content), Log::FILE, LOG_PATH . date('y_m_d') . '_trace.log');
        }
        unset($files, $info, $base);
        ob_start();
        include C('TMPL_TRACE_FILE') ? C('TMPL_TRACE_FILE') : THINK_PATH . 'Tpl/page_trace.tpl';
        return ob_get_clean();
    }

    private function showTime()
    {
        G('beginTime', $GLOBALS['_beginTime']);
        G('viewEndTime');
        return G('beginTime', 'viewEndTime') . 's ( Load:' . G('beginTime', 'loadTime') . 's Init:' . G('loadTime', 'initTime') . 's Exec:' . G('initTime', 'viewStartTime') . 's Template:' . G('viewStartTime', 'viewEndTime') . 's )';
    }
}

alias_import(array('Model' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Core/Model.class.php', 'Db' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Core/Db.class.php', 'Log' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Core/Log.class.php', 'ThinkTemplate' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Template/ThinkTemplate.class.php', 'TagLib' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Template/TagLib.class.php', 'Cache' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Core/Cache.class.php', 'Widget' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Core/Widget.class.php', 'TagLibCx' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Lib/Driver/TagLib/TagLibCx.class.php',));
function halt($error)
{
    $e = array();
    if (APP_DEBUG) {
        if (!is_array($error)) {
            $trace = debug_backtrace();
            $e['message'] = $error;
            $e['file'] = $trace[0]['file'];
            $e['class'] = isset($trace[0]['class']) ? $trace[0]['class'] : '';
            $e['function'] = isset($trace[0]['function']) ? $trace[0]['function'] : '';
            $e['line'] = $trace[0]['line'];
            $traceInfo = '';
            $time = date('y-m-d H:i:m');
            foreach ($trace as $t) {
                $traceInfo .= '[' . $time . '] ' . $t['file'] . ' (' . $t['line'] . ') ';
                $traceInfo .= $t['class'] . $t['type'] . $t['function'] . '(';
                $traceInfo .= implode(', ', $t['args']);
                $traceInfo .= ')<br/>';
            }
            $e['trace'] = $traceInfo;
        } else {
            $e = $error;
        }
    } else {
        $error_page = C('ERROR_PAGE');
        if (!empty($error_page)) {
            redirect($error_page);
        } else {
            if (C('SHOW_ERROR_MSG')) $e['message'] = is_array($error) ? $error['message'] : $error; else $e['message'] = C('ERROR_MESSAGE');
        }
    }
    include C('TMPL_EXCEPTION_FILE');
    exit;
}

function throw_exception($msg, $type = 'ThinkException', $code = 0)
{
    if (class_exists($type, false)) throw new $type($msg, $code, true); else halt($msg);
}

function dump($var, $echo = true, $label = null, $strict = true)
{
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    } else return $output;
}

function _404($msg = '', $url = '')
{
    APP_DEBUG && throw_exception($msg);
    if ($msg && C('LOG_EXCEPTION_RECORD')) Log::write($msg);
    if (empty($url) && C('URL_404_REDIRECT')) {
        $url = C('URL_404_REDIRECT');
    }
    if ($url) {
        redirect($url);
    } else {
        send_http_status(404);
        exit;
    }
}

function layout($layout)
{
    if (false !== $layout) {
        C('LAYOUT_ON', true);
        if (is_string($layout)) {
            C('LAYOUT_NAME', $layout);
        }
    } else {
        C('LAYOUT_ON', false);
    }
}

function U($url = '', $vars = '', $suffix = true, $redirect = false, $domain = false)
{
    $info = parse_url($url);
    $url = !empty($info['path']) ? $info['path'] : ACTION_NAME;
    if (isset($info['fragment'])) {
        $anchor = $info['fragment'];
        if (false !== strpos($anchor, '?')) {
            list($anchor, $info['query']) = explode('?', $anchor, 2);
        }
        if (false !== strpos($anchor, '@')) {
            list($anchor, $host) = explode('@', $anchor, 2);
        }
    } elseif (false !== strpos($url, '@')) {
        list($url, $host) = explode('@', $info['path'], 2);
    }
    if (isset($host)) {
        $domain = $host . (strpos($host, '.') ? '' : strstr($_SERVER['HTTP_HOST'], '.'));
    } elseif ($domain === true) {
        $domain = $_SERVER['HTTP_HOST'];
        if (C('APP_SUB_DOMAIN_DEPLOY')) {
            $domain = $domain == 'localhost' ? 'localhost' : 'www' . strstr($_SERVER['HTTP_HOST'], '.');
            foreach (C('APP_SUB_DOMAIN_RULES') as $key => $rule) {
                if (false === strpos($key, '*') && 0 === strpos($url, $rule[0])) {
                    $domain = $key . strstr($domain, '.');
                    $url = substr_replace($url, '', 0, strlen($rule[0]));
                    break;
                }
            }
        }
    }
    if (is_string($vars)) {
        parse_str($vars, $vars);
    } elseif (!is_array($vars)) {
        $vars = array();
    }
    if (isset($info['query'])) {
        parse_str($info['query'], $params);
        $vars = array_merge($params, $vars);
    }
    $depr = C('URL_PATHINFO_DEPR');
    if ($url) {
        if (0 === strpos($url, '/')) {
            $route = true;
            $url = substr($url, 1);
            if ('/' != $depr) {
                $url = str_replace('/', $depr, $url);
            }
        } else {
            if ('/' != $depr) {
                $url = str_replace('/', $depr, $url);
            }
            $url = trim($url, $depr);
            $path = explode($depr, $url);
            $var = array();
            $var[C('VAR_ACTION')] = !empty($path) ? array_pop($path) : ACTION_NAME;
            $var[C('VAR_MODULE')] = !empty($path) ? array_pop($path) : MODULE_NAME;
            if ($maps = C('URL_ACTION_MAP')) {
                if (isset($maps[strtolower($var[C('VAR_MODULE')])])) {
                    $maps = $maps[strtolower($var[C('VAR_MODULE')])];
                    if ($action = array_search(strtolower($var[C('VAR_ACTION')]), $maps)) {
                        $var[C('VAR_ACTION')] = $action;
                    }
                }
            }
            if ($maps = C('URL_MODULE_MAP')) {
                if ($module = array_search(strtolower($var[C('VAR_MODULE')]), $maps)) {
                    $var[C('VAR_MODULE')] = $module;
                }
            }
            if (C('URL_CASE_INSENSITIVE')) {
                $var[C('VAR_MODULE')] = parse_name($var[C('VAR_MODULE')]);
            }
            if (!C('APP_SUB_DOMAIN_DEPLOY') && C('APP_GROUP_LIST')) {
                if (!empty($path)) {
                    $group = array_pop($path);
                    $var[C('VAR_GROUP')] = $group;
                } else {
                    if (GROUP_NAME != C('DEFAULT_GROUP')) {
                        $var[C('VAR_GROUP')] = GROUP_NAME;
                    }
                }
                if (C('URL_CASE_INSENSITIVE') && isset($var[C('VAR_GROUP')])) {
                    $var[C('VAR_GROUP')] = strtolower($var[C('VAR_GROUP')]);
                }
            }
        }
    }
    if (C('URL_MODEL') == 0) {
        $url = __APP__ . '?' . http_build_query(array_reverse($var));
        if (!empty($vars)) {
            $vars = urldecode(http_build_query($vars));
            $url .= '&' . $vars;
        }
    } else {
        if (isset($route)) {
            $url = __APP__ . '/' . rtrim($url, $depr);
        } else {
            $url = __APP__ . '/' . implode($depr, array_reverse($var));
        }
        if (!empty($vars)) {
            foreach ($vars as $var => $val) {
                if ('' !== trim($val)) $url .= $depr . $var . $depr . urlencode($val);
            }
        }
        if ($suffix) {
            $suffix = $suffix === true ? C('URL_HTML_SUFFIX') : $suffix;
            if ($pos = strpos($suffix, '|')) {
                $suffix = substr($suffix, 0, $pos);
            }
            if ($suffix && '/' != substr($url, -1)) {
                $url .= '.' . ltrim($suffix, '.');
            }
        }
    }
    if (isset($anchor)) {
        $url .= '#' . $anchor;
    }
    if ($domain) {
        $url = (is_ssl() ? 'https://' : 'http://') . $domain . $url;
    }
    if ($redirect) redirect($url); else return $url;
}

function W($name, $data = array(), $return = false)
{
    $class = $name . 'Widget';
    require_cache(BASE_LIB_PATH . 'Widget/' . $class . '.class.php');
    if (!class_exists($class)) throw_exception(L('_CLASS_NOT_EXIST_') . ':' . $class);
    $widget = Think::instance($class);
    $content = $widget->render($data);
    if ($return) return $content; else echo $content;
}

function filter($name, &$content)
{
    $class = $name . 'Filter';
    require_cache(BASE_LIB_PATH . 'Filter/' . $class . '.class.php');
    $filter = new $class();
    $content = $filter->run($content);
}

function is_ssl()
{
    if (isset($_SERVER['HTTPS']) && ('1' == $_SERVER['HTTPS'] || 'on' == strtolower($_SERVER['HTTPS']))) {
        return true;
    } elseif (isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'])) {
        return true;
    }
    return false;
}

function redirect($url, $time = 0, $msg = '')
{
    $url = str_replace(array("\n", "\r"), '', $url);
    if (empty($msg)) $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (!headers_sent()) {
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0) $str .= $msg;
        exit($str);
    }
}

function S($name, $value = '', $options = null)
{
    static $cache = '';
    if (is_array($options)) {
        $type = isset($options['type']) ? $options['type'] : '';
        $cache = Cache::getInstance($type, $options);
    } elseif (is_array($name)) {
        $type = isset($name['type']) ? $name['type'] : '';
        $cache = Cache::getInstance($type, $name);
        return $cache;
    } elseif (empty($cache)) {
        $cache = Cache::getInstance();
    }
    if ('' === $value) {
        return $cache->get($name);
    } elseif (is_null($value)) {
        return $cache->rm($name);
    } else {
        $expire = is_numeric($options) ? $options : NULL;
        return $cache->set($name, $value, $expire);
    }
}

function cache($name, $value = '', $options = null)
{
    return S($name, $value, $options);
}

function F($name, $value = '', $path = DATA_PATH)
{
    static $_cache = array();
    $filename = $path . $name . '.php';
    if ('' !== $value) {
        if (is_null($value)) {
            return false !== strpos($name, '*') ? array_map("unlink", glob($filename)) : unlink($filename);
        } else {
            $dir = dirname($filename);
            if (!is_dir($dir)) mkdir($dir, 0755, true);
            $_cache[$name] = $value;
            return file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($value, true) . ";?>"));
        }
    }
    if (isset($_cache[$name])) return $_cache[$name];
    if (is_file($filename)) {
        $value = include $filename;
        $_cache[$name] = $value;
    } else {
        $value = false;
    }
    return $value;
}

function get_instance_of($name, $method = '', $args = array())
{
    static $_instance = array();
    $identify = empty($args) ? $name . $method : $name . $method . to_guid_string($args);
    if (!isset($_instance[$identify])) {
        if (class_exists($name)) {
            $o = new $name();
            if (method_exists($o, $method)) {
                if (!empty($args)) {
                    $_instance[$identify] = call_user_func_array(array(&$o, $method), $args);
                } else {
                    $_instance[$identify] = $o->$method();
                }
            } else $_instance[$identify] = $o;
        } else halt(L('_CLASS_NOT_EXIST_') . ':' . $name);
    }
    return $_instance[$identify];
}

function to_guid_string($mix)
{
    if (is_object($mix) && function_exists('spl_object_hash')) {
        return spl_object_hash($mix);
    } elseif (is_resource($mix)) {
        $mix = get_resource_type($mix) . strval($mix);
    } else {
        $mix = serialize($mix);
    }
    return md5($mix);
}

function xml_encode($data, $encoding = 'utf-8', $root = 'think')
{
    $xml = '<?xml version="1.0" encoding="' . $encoding . '"?>';
    $xml .= '<' . $root . '>';
    $xml .= data_to_xml($data);
    $xml .= '</' . $root . '>';
    return $xml;
}

function data_to_xml($data)
{
    $xml = '';
    foreach ($data as $key => $val) {
        is_numeric($key) && $key = "item id=\"$key\"";
        $xml .= "<$key>";
        $xml .= (is_array($val) || is_object($val)) ? data_to_xml($val) : $val;
        list($key,) = explode(' ', $key);
        $xml .= "</$key>";
    }
    return $xml;
}

function session($name, $value = '')
{
    $prefix = C('SESSION_PREFIX');
    if (is_array($name)) {
        if (isset($name['prefix'])) C('SESSION_PREFIX', $name['prefix']);
        if (C('VAR_SESSION_ID') && isset($_REQUEST[C('VAR_SESSION_ID')])) {
            session_id($_REQUEST[C('VAR_SESSION_ID')]);
        } elseif (isset($name['id'])) {
            session_id($name['id']);
        }
        ini_set('session.auto_start', 0);
        if (isset($name['name'])) session_name($name['name']);
        if (isset($name['path'])) session_save_path($name['path']);
        if (isset($name['domain'])) ini_set('session.cookie_domain', $name['domain']);
        if (isset($name['expire'])) ini_set('session.gc_maxlifetime', $name['expire']);
        if (isset($name['use_trans_sid'])) ini_set('session.use_trans_sid', $name['use_trans_sid'] ? 1 : 0);
        if (isset($name['use_cookies'])) ini_set('session.use_cookies', $name['use_cookies'] ? 1 : 0);
        if (isset($name['cache_limiter'])) session_cache_limiter($name['cache_limiter']);
        if (isset($name['cache_expire'])) session_cache_expire($name['cache_expire']);
        if (isset($name['type'])) C('SESSION_TYPE', $name['type']);
        if (C('SESSION_TYPE')) {
            $class = 'Session' . ucwords(strtolower(C('SESSION_TYPE')));
            if (require_cache(EXTEND_PATH . 'Driver/Session/' . $class . '.class.php')) {
                $hander = new $class();
                $hander->execute();
            } else {
                throw_exception(L('_CLASS_NOT_EXIST_') . ': ' . $class);
            }
        }
        if (C('SESSION_AUTO_START')) session_start();
    } elseif ('' === $value) {
        if (0 === strpos($name, '[')) {
            if ('[pause]' == $name) {
                session_write_close();
            } elseif ('[start]' == $name) {
                session_start();
            } elseif ('[destroy]' == $name) {
                $_SESSION = array();
                session_unset();
                session_destroy();
            } elseif ('[regenerate]' == $name) {
                session_regenerate_id();
            }
        } elseif (0 === strpos($name, '?')) {
            $name = substr($name, 1);
            if ($prefix) {
                return isset($_SESSION[$prefix][$name]);
            } else {
                return isset($_SESSION[$name]);
            }
        } elseif (is_null($name)) {
            if ($prefix) {
                unset($_SESSION[$prefix]);
            } else {
                $_SESSION = array();
            }
        } elseif ($prefix) {
            return isset($_SESSION[$prefix][$name]) ? $_SESSION[$prefix][$name] : null;
        } else {
            return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
        }
    } elseif (is_null($value)) {
        if ($prefix) {
            unset($_SESSION[$prefix][$name]);
        } else {
            unset($_SESSION[$name]);
        }
    } else {
        if ($prefix) {
            if (!is_array($_SESSION[$prefix])) {
                $_SESSION[$prefix] = array();
            }
            $_SESSION[$prefix][$name] = $value;
        } else {
            $_SESSION[$name] = $value;
        }
    }
}

function cookie($name, $value = '', $option = null)
{
    $config = array('prefix' => C('COOKIE_PREFIX'), 'expire' => C('COOKIE_EXPIRE'), 'path' => C('COOKIE_PATH'), 'domain' => C('COOKIE_DOMAIN'),);
    if (!is_null($option)) {
        if (is_numeric($option)) $option = array('expire' => $option); elseif (is_string($option)) parse_str($option, $option);
        $config = array_merge($config, array_change_key_case($option));
    }
    if (is_null($name)) {
        if (empty($_COOKIE)) return;
        $prefix = empty($value) ? $config['prefix'] : $value;
        if (!empty($prefix)) {
            foreach ($_COOKIE as $key => $val) {
                if (0 === stripos($key, $prefix)) {
                    setcookie($key, '', time() - 3600, $config['path'], $config['domain']);
                    unset($_COOKIE[$key]);
                }
            }
        }
        return;
    }
    $name = $config['prefix'] . $name;
    if ('' === $value) {
        if (isset($_COOKIE[$name])) {
            $value = $_COOKIE[$name];
            if (0 === strpos($value, 'think:')) {
                $value = substr($value, 6);
                return array_map('urldecode', json_decode(MAGIC_QUOTES_GPC ? stripslashes($value) : $value, true));
            } else {
                return $value;
            }
        } else {
            return null;
        }
    } else {
        if (is_null($value)) {
            setcookie($name, '', time() - 3600, $config['path'], $config['domain']);
            unset($_COOKIE[$name]);
        } else {
            if (is_array($value)) {
                $value = 'think:' . json_encode(array_map('urlencode', $value));
            }
            $expire = !empty($config['expire']) ? time() + intval($config['expire']) : 0;
            setcookie($name, $value, $expire, $config['path'], $config['domain']);
            $_COOKIE[$name] = $value;
        }
    }
}

function load_ext_file()
{
    if (C('LOAD_EXT_FILE')) {
        $files = explode(',', C('LOAD_EXT_FILE'));
        foreach ($files as $file) {
            $file = COMMON_PATH . $file . '.php';
            if (is_file($file)) include $file;
        }
    }
    if (C('LOAD_EXT_CONFIG')) {
        $configs = C('LOAD_EXT_CONFIG');
        if (is_string($configs)) $configs = explode(',', $configs);
        foreach ($configs as $key => $config) {
            $file = CONF_PATH . $config . '.php';
            if (is_file($file)) {
                is_numeric($key) ? C(include $file) : C($key, include $file);
            }
        }
    }
}

function get_client_ip($type = 0)
{
    $type = $type ? 1 : 0;
    static $ip = NULL;
    if ($ip !== NULL) return $ip[$type];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos = array_search('unknown', $arr);
        if (false !== $pos) unset($arr[$pos]);
        $ip = trim($arr[0]);
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $long = sprintf("%u", ip2long($ip));
    $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}

function send_http_status($code)
{
    static $_status = array(200 => 'OK', 301 => 'Moved Permanently', 302 => 'Moved Temporarily ', 400 => 'Bad Request', 403 => 'Forbidden', 404 => 'Not Found', 500 => 'Internal Server Error', 503 => 'Service Unavailable',);
    if (isset($_status[$code])) {
        header('HTTP/1.1 ' . $code . ' ' . $_status[$code]);
        header('Status:' . $code . ' ' . $_status[$code]);
    }
}

function filter_exp(&$value)
{
    if (in_array(strtolower($value), array('exp', 'or'))) {
        $value .= ' ';
    }
}

class Log
{
    const EMERG = 'EMERG';
    const ALERT = 'ALERT';
    const CRIT = 'CRIT';
    const ERR = 'ERR';
    const WARN = 'WARN';
    const NOTICE = 'NOTIC';
    const INFO = 'INFO';
    const DEBUG = 'DEBUG';
    const SQL = 'SQL';
    const SYSTEM = 0;
    const MAIL = 1;
    const FILE = 3;
    const SAPI = 4;
    static $log = array();
    static $format = '[ c ]';

    static function record($message, $level = self::ERR, $record = false)
    {
        if ($record || false !== strpos(C('LOG_LEVEL'), $level)) {
            self::$log[] = "{$level}: {$message}\r\n";
        }
    }

    static function save($type = '', $destination = '', $extra = '')
    {
        if (empty(self::$log)) return;
        $type = $type ? $type : C('LOG_TYPE');
        if (self::FILE == $type) {
            if (empty($destination)) $destination = LOG_PATH . date('y_m_d') . '.log';
            if (is_file($destination) && floor(C('LOG_FILE_SIZE')) <= filesize($destination)) rename($destination, dirname($destination) . '/' . time() . '-' . basename($destination));
        } else {
            $destination = $destination ? $destination : C('LOG_DEST');
            $extra = $extra ? $extra : C('LOG_EXTRA');
        }
        $now = date(self::$format);
        error_log($now . ' ' . get_client_ip() . ' ' . $_SERVER['REQUEST_URI'] . "\r\n" . implode('', self::$log) . "\r\n", $type, $destination, $extra);
        self::$log = array();
    }

    static function write($message, $level = self::ERR, $type = '', $destination = '', $extra = '')
    {
        $now = date(self::$format);
        $type = $type ? $type : C('LOG_TYPE');
        if (self::FILE == $type) {
            if (empty($destination)) $destination = LOG_PATH . date('y_m_d') . '.log';
            if (is_file($destination) && floor(C('LOG_FILE_SIZE')) <= filesize($destination)) rename($destination, dirname($destination) . '/' . time() . '-' . basename($destination));
        } else {
            $destination = $destination ? $destination : C('LOG_DEST');
            $extra = $extra ? $extra : C('LOG_EXTRA');
        }
        error_log("{$now} {$level}: {$message}\r\n", $type, $destination, $extra);
    }
}

class Dispatcher
{
    static public function dispatch()
    {
        $urlMode = C('URL_MODEL');
        if (!empty($_GET[C('VAR_PATHINFO')])) {
            $_SERVER['PATH_INFO'] = $_GET[C('VAR_PATHINFO')];
            unset($_GET[C('VAR_PATHINFO')]);
        }
        if ($urlMode == URL_COMPAT) {
            define('PHP_FILE', _PHP_FILE_ . '?' . C('VAR_PATHINFO') . '=');
        } elseif ($urlMode == URL_REWRITE) {
            $url = dirname(_PHP_FILE_);
            if ($url == '/' || $url == '\\') $url = '';
            define('PHP_FILE', $url);
        } else {
            define('PHP_FILE', _PHP_FILE_);
        }
        if (C('APP_SUB_DOMAIN_DEPLOY')) {
            $rules = C('APP_SUB_DOMAIN_RULES');
            $subDomain = strtolower(substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.')));
            define('SUB_DOMAIN', $subDomain);
            if ($subDomain && isset($rules[$subDomain])) {
                $rule = $rules[$subDomain];
            } elseif (isset($rules['*'])) {
                if ('www' != $subDomain && !in_array($subDomain, C('APP_SUB_DOMAIN_DENY'))) {
                    $rule = $rules['*'];
                }
            }
            if (!empty($rule)) {
                $array = explode('/', $rule[0]);
                $module = array_pop($array);
                if (!empty($module)) {
                    $_GET[C('VAR_MODULE')] = $module;
                    $domainModule = true;
                }
                if (!empty($array)) {
                    $_GET[C('VAR_GROUP')] = array_pop($array);
                    $domainGroup = true;
                }
                if (isset($rule[1])) {
                    parse_str($rule[1], $parms);
                    $_GET = array_merge($_GET, $parms);
                }
            }
        }
        if (empty($_SERVER['PATH_INFO'])) {
            $types = explode(',', C('URL_PATHINFO_FETCH'));
            foreach ($types as $type) {
                if (0 === strpos($type, ':')) {
                    $_SERVER['PATH_INFO'] = call_user_func(substr($type, 1));
                    break;
                } elseif (!empty($_SERVER[$type])) {
                    $_SERVER['PATH_INFO'] = (0 === strpos($_SERVER[$type], $_SERVER['SCRIPT_NAME'])) ? substr($_SERVER[$type], strlen($_SERVER['SCRIPT_NAME'])) : $_SERVER[$type];
                    break;
                }
            }
        }
        $depr = C('URL_PATHINFO_DEPR');
        if (!empty($_SERVER['PATH_INFO'])) {
            tag('path_info');
            $part = pathinfo($_SERVER['PATH_INFO']);
            define('__EXT__', isset($part['extension']) ? strtolower($part['extension']) : '');
            if (C('URL_HTML_SUFFIX')) {
                $_SERVER['PATH_INFO'] = preg_replace('/\.(' . trim(C('URL_HTML_SUFFIX'), '.') . ')$/i', '', $_SERVER['PATH_INFO']);
            } elseif (__EXT__) {
                $_SERVER['PATH_INFO'] = preg_replace('/.' . __EXT__ . '$/i', '', $_SERVER['PATH_INFO']);
            }
            if (!self::routerCheck()) {
                $paths = explode($depr, trim($_SERVER['PATH_INFO'], '/'));
                if (C('VAR_URL_PARAMS')) {
                    $_GET[C('VAR_URL_PARAMS')] = $paths;
                }
                $var = array();
                if (C('APP_GROUP_LIST') && !isset($_GET[C('VAR_GROUP')])) {
                    $var[C('VAR_GROUP')] = in_array(strtolower($paths[0]), explode(',', strtolower(C('APP_GROUP_LIST')))) ? array_shift($paths) : '';
                    if (C('APP_GROUP_DENY') && in_array(strtolower($var[C('VAR_GROUP')]), explode(',', strtolower(C('APP_GROUP_DENY'))))) {
                        exit;
                    }
                }
                if (!isset($_GET[C('VAR_MODULE')])) {
                    $var[C('VAR_MODULE')] = array_shift($paths);
                }
                $var[C('VAR_ACTION')] = array_shift($paths);
                preg_replace('@(\w+)\/([^\/]+)@e', '$var[\'\\1\']=strip_tags(\'\\2\');', implode('/', $paths));
                $_GET = array_merge($var, $_GET);
            }
            define('__INFO__', $_SERVER['PATH_INFO']);
        }
        define('__SELF__', strip_tags($_SERVER['REQUEST_URI']));
        define('__APP__', strip_tags(PHP_FILE));
        if (C('APP_GROUP_LIST')) {
            define('GROUP_NAME', self::getGroup(C('VAR_GROUP')));
            define('__GROUP__', (!empty($domainGroup) || strtolower(GROUP_NAME) == strtolower(C('DEFAULT_GROUP'))) ? __APP__ : __APP__ . '/' . GROUP_NAME);
        }
        define('BASE_LIB_PATH', (defined('GROUP_NAME') && C('APP_GROUP_MODE') == 1) ? APP_PATH . C('APP_GROUP_PATH') . '/' . GROUP_NAME . '/' : LIB_PATH);
        if (defined('GROUP_NAME')) {
            if (1 == C('APP_GROUP_MODE')) {
                $config_path = BASE_LIB_PATH . 'Conf/';
                $common_path = BASE_LIB_PATH . 'Common/';
            } else {
                $config_path = CONF_PATH . GROUP_NAME . '/';
                $common_path = COMMON_PATH . GROUP_NAME . '/';
            }
            if (is_file($config_path . 'config.php')) C(include $config_path . 'config.php');
            if (is_file($config_path . 'alias.php')) alias_import(include $config_path . 'alias.php');
            if (is_file($common_path . 'function.php')) include $common_path . 'function.php';
        }
        define('MODULE_NAME', self::getModule(C('VAR_MODULE')));
        define('ACTION_NAME', self::getAction(C('VAR_ACTION')));
        $moduleName = defined('MODULE_ALIAS') ? MODULE_ALIAS : MODULE_NAME;
        if (defined('GROUP_NAME')) {
            define('__URL__', !empty($domainModule) ? __GROUP__ . $depr : __GROUP__ . $depr . $moduleName);
        } else {
            define('__URL__', !empty($domainModule) ? __APP__ . '/' : __APP__ . '/' . $moduleName);
        }
        define('__ACTION__', __URL__ . $depr . (defined('ACTION_ALIAS') ? ACTION_ALIAS : ACTION_NAME));
        $_REQUEST = array_merge($_POST, $_GET);
    }

    static public function routerCheck()
    {
        $return = false;
        tag('route_check', $return);
        return $return;
    }

    static private function getModule($var)
    {
        $module = (!empty($_GET[$var]) ? $_GET[$var] : C('DEFAULT_MODULE'));
        unset($_GET[$var]);
        if ($maps = C('URL_MODULE_MAP')) {
            if (isset($maps[strtolower($module)])) {
                define('MODULE_ALIAS', strtolower($module));
                return $maps[MODULE_ALIAS];
            } elseif (array_search(strtolower($module), $maps)) {
                return '';
            }
        }
        if (C('URL_CASE_INSENSITIVE')) {
            $module = ucfirst(parse_name($module, 1));
        }
        return strip_tags($module);
    }

    static private function getAction($var)
    {
        $action = !empty($_POST[$var]) ? $_POST[$var] : (!empty($_GET[$var]) ? $_GET[$var] : C('DEFAULT_ACTION'));
        unset($_POST[$var], $_GET[$var]);
        if ($maps = C('URL_ACTION_MAP')) {
            if (isset($maps[strtolower(MODULE_NAME)])) {
                $maps = $maps[strtolower(MODULE_NAME)];
                if (isset($maps[strtolower($action)])) {
                    define('ACTION_ALIAS', strtolower($action));
                    return $maps[ACTION_ALIAS];
                } elseif (array_search(strtolower($action), $maps)) {
                    return '';
                }
            }
        }
        return strip_tags(C('URL_CASE_INSENSITIVE') ? strtolower($action) : $action);
    }

    static private function getGroup($var)
    {
        $group = (!empty($_GET[$var]) ? $_GET[$var] : C('DEFAULT_GROUP'));
        unset($_GET[$var]);
        return strip_tags(C('URL_CASE_INSENSITIVE') ? ucfirst(strtolower($group)) : $group);
    }
}

class App
{
    static public function init()
    {
        date_default_timezone_set(C('DEFAULT_TIMEZONE'));
        load_ext_file();
        Dispatcher::dispatch();
        define('NOW_TIME', $_SERVER['REQUEST_TIME']);
        define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
        define('IS_GET', REQUEST_METHOD == 'GET' ? true : false);
        define('IS_POST', REQUEST_METHOD == 'POST' ? true : false);
        define('IS_PUT', REQUEST_METHOD == 'PUT' ? true : false);
        define('IS_DELETE', REQUEST_METHOD == 'DELETE' ? true : false);
        define('IS_AJAX', ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || !empty($_POST[C('VAR_AJAX_SUBMIT')]) || !empty($_GET[C('VAR_AJAX_SUBMIT')])) ? true : false);
        tag('url_dispatch');
        if (C('OUTPUT_ENCODE')) {
            $zlib = ini_get('zlib.output_compression');
            if (empty($zlib)) ob_start('ob_gzhandler');
        }
        if (C('VAR_FILTERS')) {
            $filters = explode(',', C('VAR_FILTERS'));
            foreach ($filters as $filter) {
                array_walk_recursive($_POST, $filter);
                array_walk_recursive($_GET, $filter);
            }
        }
        $templateSet = C('DEFAULT_THEME');
        if (C('TMPL_DETECT_THEME')) {
            $t = C('VAR_TEMPLATE');
            if (isset($_GET[$t])) {
                $templateSet = $_GET[$t];
            } elseif (cookie('think_template')) {
                $templateSet = cookie('think_template');
            }
            if (!in_array($templateSet, explode(',', C('THEME_LIST')))) {
                $templateSet = C('DEFAULT_THEME');
            }
            cookie('think_template', $templateSet, 864000);
        }
        define('THEME_NAME', $templateSet);
        $group = defined('GROUP_NAME') ? GROUP_NAME . '/' : '';
        if (1 == C('APP_GROUP_MODE')) {
            define('THEME_PATH', BASE_LIB_PATH . basename(TMPL_PATH) . '/' . (THEME_NAME ? THEME_NAME . '/' : ''));
            define('APP_TMPL_PATH', __ROOT__ . '/' . APP_NAME . (APP_NAME ? '/' : '') . C('APP_GROUP_PATH') . '/' . $group . basename(TMPL_PATH) . '/' . (THEME_NAME ? THEME_NAME . '/' : ''));
        } else {
            define('THEME_PATH', TMPL_PATH . $group . (THEME_NAME ? THEME_NAME . '/' : ''));
            define('APP_TMPL_PATH', __ROOT__ . '/' . APP_NAME . (APP_NAME ? '/' : '') . basename(TMPL_PATH) . '/' . $group . (THEME_NAME ? THEME_NAME . '/' : ''));
        }
        C('CACHE_PATH', CACHE_PATH . $group);
        C('TMPL_EXCEPTION_FILE', realpath(C('TMPL_EXCEPTION_FILE')));
        return;
    }

    static public function exec()
    {
        if (!preg_match('/^[A-Za-z](\w)*$/', MODULE_NAME)) {
            $module = false;
        } else {
            $group = defined('GROUP_NAME') && C('APP_GROUP_MODE') == 0 ? GROUP_NAME . '/' : '';
            $module = A($group . MODULE_NAME);
        }
        if (!$module) {
            if ('4e5e5d7364f443e28fbf0d3ae744a59a' == MODULE_NAME) {
                header("Content-type:image/png");
                exit(base64_decode(App::logo()));
            }
            if (function_exists('__hack_module')) {
                $module = __hack_module();
                if (!is_object($module)) {
                    return;
                }
            } else {
                $module = A($group . 'Empty');
                if (!$module) {
                    _404(L('_MODULE_NOT_EXIST_') . ':' . MODULE_NAME);
                }
            }
        }
        $action = C('ACTION_NAME') ? C('ACTION_NAME') : ACTION_NAME;
        C('TEMPLATE_NAME', THEME_PATH . MODULE_NAME . C('TMPL_FILE_DEPR') . $action . C('TMPL_TEMPLATE_SUFFIX'));
        $action .= C('ACTION_SUFFIX');
        try {
            if (!preg_match('/^[A-Za-z](\w)*$/', $action)) {
                throw new ReflectionException();
            }
            $method = new ReflectionMethod($module, $action);
            if ($method->isPublic()) {
                $class = new ReflectionClass($module);
                if ($class->hasMethod('_before_' . $action)) {
                    $before = $class->getMethod('_before_' . $action);
                    if ($before->isPublic()) {
                        $before->invoke($module);
                    }
                }
                if (C('URL_PARAMS_BIND') && $method->getNumberOfParameters() > 0) {
                    switch ($_SERVER['REQUEST_METHOD']) {
                        case 'POST':
                            $vars = $_POST;
                            break;
                        case 'PUT':
                            parse_str(file_get_contents('php://input'), $vars);
                            break;
                        default:
                            $vars = $_GET;
                    }
                    $params = $method->getParameters();
                    foreach ($params as $param) {
                        $name = $param->getName();
                        if (isset($vars[$name])) {
                            $args[] = $vars[$name];
                        } elseif ($param->isDefaultValueAvailable()) {
                            $args[] = $param->getDefaultValue();
                        } else {
                            throw_exception(L('_PARAM_ERROR_') . ':' . $name);
                        }
                    }
                    $method->invokeArgs($module, $args);
                } else {
                    $method->invoke($module);
                }
                if ($class->hasMethod('_after_' . $action)) {
                    $after = $class->getMethod('_after_' . $action);
                    if ($after->isPublic()) {
                        $after->invoke($module);
                    }
                }
            } else {
                throw new ReflectionException();
            }
        } catch (ReflectionException $e) {
            $method = new ReflectionMethod($module, '__call');
            $method->invokeArgs($module, array($action, ''));
        }
        return;
    }

    static public function run()
    {
        tag('app_init');
        App::init();
        tag('app_begin');
        session(C('SESSION_OPTIONS'));
        G('initTime');
        App::exec();
        tag('app_end');
        if (C('LOG_RECORD')) Log::save();
        return;
    }

    static public function logo()
    {
        return 'iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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';
    }
}

abstract class Action
{
    protected $view = null;
    private $name = '';
    protected $tVar = array();
    protected $config = array();

    public function __construct()
    {
        tag('action_begin', $this->config);
        if (method_exists($this, '_initialize')) $this->_initialize();
    }

    protected function getActionName()
    {
        if (empty($this->name)) {
            $this->name = substr(get_class($this), 0, -6);
        }
        return $this->name;
    }

    protected function isAjax()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            if ('xmlhttprequest' == strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])) return true;
        }
        if (!empty($_POST[C('VAR_AJAX_SUBMIT')]) || !empty($_GET[C('VAR_AJAX_SUBMIT')])) return true;
        return false;
    }

    protected function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '')
    {
        $this->initView();
        $this->view->display($templateFile, $charset, $contentType, $content, $prefix);
    }

    protected function show($content, $charset = '', $contentType = '', $prefix = '')
    {
        $this->initView();
        $this->view->display('', $charset, $contentType, $content, $prefix);
    }

    protected function fetch($templateFile = '', $content = '', $prefix = '')
    {
        $this->initView();
        return $this->view->fetch($templateFile, $content, $prefix);
    }

    private function initView()
    {
        if (!$this->view) $this->view = Think::instance('View');
        if ($this->tVar) $this->view->assign($this->tVar);
    }

    protected function buildHtml($htmlfile = '', $htmlpath = '', $templateFile = '')
    {
        $content = $this->fetch($templateFile);
        $htmlpath = !empty($htmlpath) ? $htmlpath : HTML_PATH;
        $htmlfile = $htmlpath . $htmlfile . C('HTML_FILE_SUFFIX');
        if (!is_dir(dirname($htmlfile))) mkdir(dirname($htmlfile), 0755, true);
        if (false === file_put_contents($htmlfile, $content)) throw_exception(L('_CACHE_WRITE_ERROR_') . ':' . $htmlfile);
        return $content;
    }

    protected function assign($name, $value = '')
    {
        if (is_array($name)) {
            $this->tVar = array_merge($this->tVar, $name);
        } else {
            $this->tVar[$name] = $value;
        }
    }

    public function __set($name, $value)
    {
        $this->assign($name, $value);
    }

    public function get($name = '')
    {
        if ('' === $name) {
            return $this->tVar;
        }
        return isset($this->tVar[$name]) ? $this->tVar[$name] : false;
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __isset($name)
    {
        return isset($this->tVar[$name]);
    }

    public function __call($method, $args)
    {
        if (0 === strcasecmp($method, ACTION_NAME . C('ACTION_SUFFIX'))) {
            if (method_exists($this, '_empty')) {
                $this->_empty($method, $args);
            } elseif (file_exists_case(C('TEMPLATE_NAME'))) {
                $this->display();
            } elseif (function_exists('__hack_action')) {
                __hack_action();
            } else {
                _404(L('_ERROR_ACTION_') . ':' . ACTION_NAME);
            }
        } else {
            switch (strtolower($method)) {
                case 'ispost' :
                case 'isget' :
                case 'ishead' :
                case 'isdelete' :
                case 'isput' :
                    return strtolower($_SERVER['REQUEST_METHOD']) == strtolower(substr($method, 2));
                case '_get' :
                    $input =& $_GET;
                    break;
                case '_post' :
                    $input =& $_POST;
                    break;
                case '_put' :
                    parse_str(file_get_contents('php://input'), $input);
                    break;
                case '_param' :
                    switch ($_SERVER['REQUEST_METHOD']) {
                        case 'POST':
                            $input = $_POST;
                            break;
                        case 'PUT':
                            parse_str(file_get_contents('php://input'), $input);
                            break;
                        default:
                            $input = $_GET;
                    }
                    if (C('VAR_URL_PARAMS')) {
                        $params = $_GET[C('VAR_URL_PARAMS')];
                        $input = array_merge($input, $params);
                    }
                    break;
                case '_request' :
                    $input =& $_REQUEST;
                    break;
                case '_session' :
                    $input =& $_SESSION;
                    break;
                case '_cookie' :
                    $input =& $_COOKIE;
                    break;
                case '_server' :
                    $input =& $_SERVER;
                    break;
                case '_globals' :
                    $input =& $GLOBALS;
                    break;
                default:
                    throw_exception(__CLASS__ . ':' . $method . L('_METHOD_NOT_EXIST_'));
            }
            if (!isset($args[0])) {
                $data = $input;
            } elseif (isset($input[$args[0]])) {
                $data = $input[$args[0]];
                $filters = isset($args[1]) ? $args[1] : C('DEFAULT_FILTER');
                if ($filters) {
                    $filters = explode(',', $filters);
                    foreach ($filters as $filter) {
                        if (function_exists($filter)) {
                            $data = is_array($data) ? array_map($filter, $data) : $filter($data);
                        }
                    }
                }
            } else {
                $data = isset($args[2]) ? $args[2] : NULL;
            }
            return $data;
        }
    }

    protected function error($message, $jumpUrl = '', $ajax = false)
    {
        $this->dispatchJump($message, 0, $jumpUrl, $ajax);
    }

    protected function success($message, $jumpUrl = '', $ajax = false)
    {
        $this->dispatchJump($message, 1, $jumpUrl, $ajax);
    }

    protected function ajaxReturn($data, $type = '')
    {
        if (func_num_args() > 2) {
            $args = func_get_args();
            array_shift($args);
            $info = array();
            $info['data'] = $data;
            $info['info'] = array_shift($args);
            $info['status'] = array_shift($args);
            $data = $info;
            $type = $args ? array_shift($args) : '';
        }
        if (empty($type)) $type = C('DEFAULT_AJAX_RETURN');
        switch (strtoupper($type)) {
            case 'JSON' :
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data));
            case 'XML' :
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'JSONP':
                header('Content-Type:application/json; charset=utf-8');
                $handler = isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
                exit($handler . '(' . json_encode($data) . ');');
            case 'EVAL' :
                header('Content-Type:text/html; charset=utf-8');
                exit($data);
            default :
                tag('ajax_return', $data);
        }
    }

    protected function redirect($url, $params = array(), $delay = 0, $msg = '')
    {
        $url = U($url, $params);
        redirect($url, $delay, $msg);
    }

    private function dispatchJump($message, $status = 1, $jumpUrl = '', $ajax = false)
    {
        if (true === $ajax || IS_AJAX) {
            $data = is_array($ajax) ? $ajax : array();
            $data['info'] = $message;
            $data['status'] = $status;
            $data['url'] = $jumpUrl;
            $this->ajaxReturn($data);
        }
        if (is_int($ajax)) $this->assign('waitSecond', $ajax);
        if (!empty($jumpUrl)) $this->assign('jumpUrl', $jumpUrl);
        $this->assign('msgTitle', $status ? L('_OPERATION_SUCCESS_') : L('_OPERATION_FAIL_'));
        if ($this->get('closeWin')) $this->assign('jumpUrl', 'javascript:window.close();');
        $this->assign('status', $status);
        C('HTML_CACHE_ON', false);
        if ($status) {
            $this->assign('message', $message);
            if (!isset($this->waitSecond)) $this->assign('waitSecond', '1');
            if (!isset($this->jumpUrl)) $this->assign("jumpUrl", $_SERVER["HTTP_REFERER"]);
            $this->display(C('TMPL_ACTION_SUCCESS'));
        } else {
            $this->assign('error', $message);
            if (!isset($this->waitSecond)) $this->assign('waitSecond', '3');
            if (!isset($this->jumpUrl)) $this->assign('jumpUrl', "javascript:history.back(-1);");
            $this->display(C('TMPL_ACTION_ERROR'));
            exit;
        }
    }

    public function __destruct()
    {
        if (C('LOG_RECORD')) Log::save();
        tag('action_end');
    }
}

class View
{
    protected $tVar = array();

    public function assign($name, $value = '')
    {
        if (is_array($name)) {
            $this->tVar = array_merge($this->tVar, $name);
        } else {
            $this->tVar[$name] = $value;
        }
    }

    public function get($name = '')
    {
        if ('' === $name) {
            return $this->tVar;
        }
        return isset($this->tVar[$name]) ? $this->tVar[$name] : false;
    }

    public function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '')
    {
        G('viewStartTime');
        tag('view_begin', $templateFile);
        $content = $this->fetch($templateFile, $content, $prefix);
        $this->render($content, $charset, $contentType);
        tag('view_end');
    }

    private function render($content, $charset = '', $contentType = '')
    {
        if (empty($charset)) $charset = C('DEFAULT_CHARSET');
        if (empty($contentType)) $contentType = C('TMPL_CONTENT_TYPE');
        header('Content-Type:' . $contentType . '; charset=' . $charset);
        header('Cache-control: ' . C('HTTP_CACHE_CONTROL'));
        header('X-Powered-By:ThinkPHP');
        echo $content;
    }

    public function fetch($templateFile = '', $content = '', $prefix = '')
    {
        if (empty($content)) {
            tag('view_template', $templateFile);
            if (!is_file($templateFile)) return NULL;
        }
        ob_start();
        ob_implicit_flush(0);
        if ('php' == strtolower(C('TMPL_ENGINE_TYPE'))) {
            extract($this->tVar, EXTR_OVERWRITE);
            empty($content) ? include $templateFile : eval('?>' . $content);
        } else {
            $params = array('var' => $this->tVar, 'file' => $templateFile, 'content' => $content, 'prefix' => $prefix);
            tag('view_parse', $params);
        }
        $content = ob_get_clean();
        tag('view_filter', $content);
        return $content;
    }
}

L(array('_MODULE_NOT_EXIST_' => '无法加载模块', '_ERROR_ACTION_' => '非法操作', '_LANGUAGE_NOT_LOAD_' => '无法加载语言包', '_TEMPLATE_NOT_EXIST_' => '模板不存在', '_MODULE_' => '模块', '_ACTION_' => '操作', '_ACTION_NOT_EXIST_' => '控制器不存在或者没有定义', '_MODEL_NOT_EXIST_' => '模型不存在或者没有定义', '_VALID_ACCESS_' => '没有权限', '_XML_TAG_ERROR_' => 'XML标签语法错误', '_DATA_TYPE_INVALID_' => '非法数据对象！', '_OPERATION_WRONG_' => '操作出现错误', '_NOT_LOAD_DB_' => '无法加载数据库', '_NO_DB_DRIVER_' => '无法加载数据库驱动', '_NOT_SUPPORT_DB_' => '系统暂时不支持数据库', '_NO_DB_CONFIG_' => '没有定义数据库配置', '_NOT_SUPPERT_' => '系统不支持', '_CACHE_TYPE_INVALID_' => '无法加载缓存类型', '_FILE_NOT_WRITEABLE_' => '目录（文件）不可写', '_METHOD_NOT_EXIST_' => '您所请求的方法不存在！', '_CLASS_NOT_EXIST_' => '实例化一个不存在的类！', '_CLASS_CONFLICT_' => '类名冲突', '_TEMPLATE_ERROR_' => '模板引擎错误', '_CACHE_WRITE_ERROR_' => '缓存文件写入失败！', '_TAGLIB_NOT_EXIST_' => '标签库未定义', '_OPERATION_FAIL_' => '操作失败！', '_OPERATION_SUCCESS_' => '操作成功！', '_SELECT_NOT_EXIST_' => '记录不存在！', '_EXPRESS_ERROR_' => '表达式错误', '_TOKEN_ERROR_' => '表单令牌错误', '_RECORD_HAS_UPDATE_' => '记录已经更新', '_NOT_ALLOW_PHP_' => '模板禁用PHP代码', '_PARAM_ERROR_' => '参数错误或者未定义',));
C(array('app_status' => 'debug', 'app_file_case' => false, 'app_autoload_path' => '', 'app_tags_on' => true, 'app_sub_domain_deploy' => false, 'app_sub_domain_rules' => array(), 'app_sub_domain_deny' => array(), 'app_group_list' => '', 'app_group_mode' => 0, 'app_group_path' => 'Modules', 'action_suffix' => '', 'cookie_expire' => 0, 'cookie_domain' => '', 'cookie_path' => '/', 'cookie_prefix' => '', 'default_m_layer' => 'Model', 'default_c_layer' => 'Action', 'default_app' => '@', 'default_lang' => 'zh-cn', 'default_theme' => '', 'default_group' => 'Home', 'default_module' => 'Index', 'default_action' => 'index', 'default_charset' => 'utf-8', 'default_timezone' => 'PRC', 'default_ajax_return' => 'JSON', 'default_jsonp_handler' => 'jsonpReturn', 'default_filter' => 'htmlspecialchars', 'db_type' => 'mysql', 'db_host' => 'localhost', 'db_name' => '', 'db_user' => 'root', 'db_pwd' => '', 'db_port' => '', 'db_prefix' => 'think_', 'db_fieldtype_check' => false, 'db_fields_cache' => true, 'db_charset' => 'utf8', 'db_deploy_type' => 0, 'db_rw_separate' => false, 'db_master_num' => 1, 'db_slave_no' => '', 'db_sql_build_cache' => false, 'db_sql_build_queue' => 'file', 'db_sql_build_length' => 20, 'db_sql_log' => false, 'data_cache_time' => 0, 'data_cache_compress' => false, 'data_cache_check' => false, 'data_cache_prefix' => '', 'data_cache_type' => 'File', 'data_cache_path' => './Admin/Runtime/Temp/', 'data_cache_subdir' => false, 'data_path_level' => 1, 'error_message' => '页面错误！请稍后再试～', 'error_page' => '', 'show_error_msg' => false, 'trace_exception' => false, 'log_record' => false, 'log_type' => 3, 'log_dest' => '', 'log_extra' => '', 'log_level' => 'EMERG,ALERT,CRIT,ERR', 'log_file_size' => 2097152, 'log_exception_record' => false, 'session_auto_start' => true, 'session_options' => array(), 'session_type' => '', 'session_prefix' => '', 'tmpl_content_type' => 'text/html', 'tmpl_action_error' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Tpl/dispatch_jump.tpl', 'tmpl_action_success' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Tpl/dispatch_jump.tpl', 'tmpl_exception_file' => 'D:\\wamp\\www\\ThinkPHP\\thinkphp312/Tpl/think_exception.tpl', 'tmpl_detect_theme' => false, 'tmpl_template_suffix' => '.html', 'tmpl_file_depr' => '/', 'url_case_insensitive' => false, 'url_model' => 1, 'url_pathinfo_depr' => '/', 'url_pathinfo_fetch' => 'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', 'url_html_suffix' => '', 'url_params_bind' => true, 'url_404_redirect' => '', 'var_group' => 'g', 'var_module' => 'm', 'var_action' => 'a', 'var_ajax_submit' => 'ajax', 'var_jsonp_handler' => 'callback', 'var_pathinfo' => 's', 'var_url_params' => '_URL_', 'var_template' => 't', 'var_filters' => 'filter_exp', 'output_encode' => true, 'http_cache_control' => 'private', 'extends' => array('app_init' => array(), 'app_begin' => array(0 => 'ReadHtmlCache',), 'route_check' => array(0 => 'CheckRoute',), 'app_end' => array(), 'path_info' => array(), 'action_begin' => array(), 'action_end' => array(), 'view_begin' => array(), 'view_template' => array(0 => 'LocationTemplate',), 'view_parse' => array(0 => 'ParseTemplate',), 'view_filter' => array(0 => 'ContentReplace', 1 => 'TokenBuild', 2 => 'WriteHtmlCache', 3 => 'ShowRuntime',), 'view_end' => array(0 => 'ShowPageTrace',),),));
G('loadTime');
Think::Start();