<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitecce429f74ed408e9658301f32054605
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TechnoCelebes\\BasicController\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TechnoCelebes\\BasicController\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitecce429f74ed408e9658301f32054605::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitecce429f74ed408e9658301f32054605::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitecce429f74ed408e9658301f32054605::$classMap;

        }, null, ClassLoader::class);
    }
}
