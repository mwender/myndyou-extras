<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3cc83174a2b3ae01aac9e93be43312bb
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LightnCandy\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LightnCandy\\' => 
        array (
            0 => __DIR__ . '/..' . '/zordius/lightncandy/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3cc83174a2b3ae01aac9e93be43312bb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3cc83174a2b3ae01aac9e93be43312bb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3cc83174a2b3ae01aac9e93be43312bb::$classMap;

        }, null, ClassLoader::class);
    }
}
