<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e2b9ecab6a2ad2ea9884969c0a3f098
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e2b9ecab6a2ad2ea9884969c0a3f098::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e2b9ecab6a2ad2ea9884969c0a3f098::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3e2b9ecab6a2ad2ea9884969c0a3f098::$classMap;

        }, null, ClassLoader::class);
    }
}