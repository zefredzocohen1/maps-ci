<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1580a0966933db485dab3883a70c344f
{
    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpssdb\\' => 8,
            'phpFastCache\\' => 13,
        ),
        'P' => 
        array (
            'Psr\\Cache\\' => 10,
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpssdb\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpfastcache/phpssdb/src/phpssdb',
        ),
        'phpFastCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpfastcache/phpfastcache/src/phpFastCache',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1580a0966933db485dab3883a70c344f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1580a0966933db485dab3883a70c344f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
