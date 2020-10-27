<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2070a1238f4e43fbbd3c20997a425487
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2070a1238f4e43fbbd3c20997a425487::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2070a1238f4e43fbbd3c20997a425487::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
