<?php

/**
 * Configuration for webgrind
 * @author Jacob Oettinger
 * @author Joakim Nygård
 */
class Webgrind_Config
{
    /**
     * Automatically check if a newer version of webgrind is available for download
     */
    static $checkVersion = true;
    static $hideWebgrindProfiles = true;

    /**
     * Writable dir for information storage.
     * If empty, will use system tmp folder or xdebug tmp
     */
    static $storageDir = '';
    static $profilerDir = '';

    /**
     * Suffix for preprocessed files
     */
    static $preprocessedSuffix = '.webgrind';

    static $defaultTimezone = 'Europe/France';
    static $dateFormat = 'd-m-Y H:i:s';
    static $defaultCostformat = 'percent'; // 'percent', 'usec' or 'msec'
    static $defaultFunctionPercentage = 90;
    static $defaultHideInternalFunctions = false;

    /**
     * sprintf compatible format for generating links to source files.
     * %1$s will be replaced by the full path name of the file
     * %2$d will be replaced by the linenumber
     */
    static $fileUrlFormat = 'reg.php?op=fileviewer&file=%1$s&line=%2$d'; // Built in fileviewer
    //static $fileUrlFormat = 'txmt://open/?url=file://%1$s&line=%2$d'; // Textmate
    //static $fileUrlFormat = 'file://%1$s'; // ?


    #########################
    # BELOW NOT FOR EDITING #
    #########################

    static $webgrindVersion = '1.0';

    /**
     * Regex that matches the trace files generated by xdebug
     */
    static function xdebugOutputFormat()
    {
        $outputName = ini_get('xdebug.profiler_output_name');
        if ($outputName == '') // Ini value not defined
            $outputName = '/^cachegrind\.out\..+$/';
        else
            $outputName = '/^' . preg_replace('/(%[^%])+/', '.+', $outputName) . '$/';
        return $outputName;
    }

    /**
     * Directory to search for trace files
     */
    static function xdebugOutputDir()
    {
        $dir = ini_get('xdebug.profiler_output_dir');
        if ($dir == '') // Ini value not defined
            return realpath(Webgrind_Config::$profilerDir) . '/';
        return realpath($dir) . '/';
    }

    /**
     * Writable dir for information storage
     */
    static function storageDir()
    {
        if (!empty(Webgrind_Config::$storageDir))
            return realpath(Webgrind_Config::$storageDir) . '/';

        if (!function_exists('sys_get_temp_dir') || !is_writable(sys_get_temp_dir())) {
            # use xdebug setting
            return Webgrind_Config::xdebugOutputDir();
        }
        return realpath(sys_get_temp_dir()) . '/';
    }
}
