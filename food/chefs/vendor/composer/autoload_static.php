<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1af97f8002d25142724b580318c255c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1af97f8002d25142724b580318c255c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1af97f8002d25142724b580318c255c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc1af97f8002d25142724b580318c255c::$classMap;

        }, null, ClassLoader::class);
    }
}
