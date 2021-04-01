<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit614f62751556948729097d9ee46a7032
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit614f62751556948729097d9ee46a7032::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit614f62751556948729097d9ee46a7032::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit614f62751556948729097d9ee46a7032::$classMap;

        }, null, ClassLoader::class);
    }
}