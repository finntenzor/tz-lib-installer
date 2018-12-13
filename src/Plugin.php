<?php
namespace tiaozhan\lib\installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Repository\RepositoryFactory;

/**
 * Class Plugin 插件入口类
 *
 * @package   tiaozhan\lib\installer
 * @author    dongjiangbin <dongjiangbin@tiaozhan.com>
 * @copyright Copyright (C) 2001-2018 TIAOZHAN. All rights reserved.
 * @link      https://www.tiaozhan.com
 */
class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        // 添加挑战lib安装插件
        $manager = $composer->getInstallationManager();
        $manager->addInstaller(new TiaozhanLibInstaller($io, $composer));
        // 查看当前试图安装/更新的库配置
        $repoConfig = $this->getRepoConfig($io);
        // 如果是属于私有库中，则添加仓库配置映射并安装插件
        if ($repoConfig) {
            $pkg = RepositoryFactory::createRepo($io, $composer->getConfig(), $repoConfig);
            $composer->getRepositoryManager()->addRepository($pkg);
        }
    }

    /**
     * 获取当前包对应的库配置
     * @return array 包对应的库配置
     */
    private function getRepoConfig(IOInterface $io)
    {
        try {
            // 暂时没有更好的办法，找到其他方案后考虑替换
            $package = $_SERVER['argv'][2];
            // 返回该package对应的配置
            return Libraries::getConfig($package);
        } catch (\Exception $e) {
            // 发生错误当做什么都没有发生
            return null;
        }
    }
}
