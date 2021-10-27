<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf8dd1a1f50e8cc34a08d3c0d83675da8
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Ngannguyen\\Autoload\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ngannguyen\\Autoload\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf8dd1a1f50e8cc34a08d3c0d83675da8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf8dd1a1f50e8cc34a08d3c0d83675da8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf8dd1a1f50e8cc34a08d3c0d83675da8::$classMap;

        }, null, ClassLoader::class);
    }
}