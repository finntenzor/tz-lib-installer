<?php
namespace tiaozhan\lib\installer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

/**
 * Class TiaozhanLibInstaller 挑战依赖安装器
 *
 * @package   tiaozhan\lib\installer
 * @author    dongjiangbin <dongjiangbin@tiaozhan.com>
 * @copyright Copyright (C) 2001-2018 TIAOZHAN. All rights reserved.
 * @link      https://www.tiaozhan.com
 */
class TiaozhanLibInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);

        $this->removeDotGit($package);
    }

    /**
     * {@inheritDoc}
     */
    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        parent::update($repo, $initial, $target);

        $this->removeDotGit($target);
    }

    /**
     * 删除多余的.git文件夹以防止.gitignore文件失效
     */
    private function removeDotGit(PackageInterface $package)
    {
        $dir = $this->getInstallPath($package) . DIRECTORY_SEPARATOR . '.git';
        $this->filesystem->remove($dir);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'tiaozhan-lib' === $packageType;
    }
}
