<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita499863e6bf8f98f4370cd469975e16d
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita499863e6bf8f98f4370cd469975e16d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita499863e6bf8f98f4370cd469975e16d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita499863e6bf8f98f4370cd469975e16d::$classMap;

        }, null, ClassLoader::class);
    }
}
