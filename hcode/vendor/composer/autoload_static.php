<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5fd0f4b11953c18c60846724c6004109
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

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5fd0f4b11953c18c60846724c6004109::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5fd0f4b11953c18c60846724c6004109::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5fd0f4b11953c18c60846724c6004109::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
