<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fb09512b6cfb991384f91dd9ed29c2a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fb09512b6cfb991384f91dd9ed29c2a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fb09512b6cfb991384f91dd9ed29c2a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
