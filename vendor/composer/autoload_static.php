<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteaa397e4208c5aaf839a701470f327dd
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Minulhasanrokan\\CustomerSocialFinder\\' => 37,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Minulhasanrokan\\CustomerSocialFinder\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticIniteaa397e4208c5aaf839a701470f327dd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteaa397e4208c5aaf839a701470f327dd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteaa397e4208c5aaf839a701470f327dd::$classMap;

        }, null, ClassLoader::class);
    }
}
