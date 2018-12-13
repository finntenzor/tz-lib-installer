# Tz Lib Installer

## Author

 - www.tiaozhan.com
 - FinnTenzor finntenzor@gmail.com  

此Composer插件针对挑战私有库设计，针对部分私有库使用git克隆下载。
在您使用此安装插件时请注意，您必须先配置好ssh，否则无法安装依赖。

_重要：请您安装依赖时请注意，私有代码可以复制但不要外泄_

当前最新版本：`v1.0.0`

## 使用方法

通过Composer安装

```bash
composer require finntenzor/tz-lib-installer
```

之后再安装部分私有库时，将自动转为使用git.tiaozhan.com作为依赖源。

## 私有库列表

持续更新中

| package                  | 作用           |
| :--------                | :-----        |
| dinghaoran/tz-api-client | 基础api库      |

&copy; 2001-2018 TIAOZHAN. All rights reserved.
