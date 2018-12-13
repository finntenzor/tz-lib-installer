<?php
namespace tiaozhan\lib\installer;

/**
 * Class Libraries 库地址配置类
 *
 * @package   tiaozhan\lib\installer
 * @author    dongjiangbin <dongjiangbin@tiaozhan.com>
 * @copyright Copyright (C) 2001-2018 TIAOZHAN. All rights reserved.
 * @link      https://www.tiaozhan.com
 */
class Libraries
{
    /**
     * @var array 私有库地址映射
     */
    public static $libraryMap = [
        'dinghaoran/tz-api-client' => [
            'type' => 'git',
            'url' => 'git@git.tiaozhan.com:tiaozhan-dev/tz-api-client.git'
        ],
    ];

    /**
     * 获取某个包对应的私有仓库配置
     * @return array 仓库配置
     */
    public static function getConfig($package)
    {
        foreach (static::$libraryMap as $name => $config) {
            if (strpos($package, $name) === 0) {
                return $config;
            }
        }
        return null;
    }
}
