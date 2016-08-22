<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf165211effac0e13cca123a9190f084d
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Larubel\\' => 8,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Larubel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/larubel',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Larubel/app',
        ),
    );

    public static $classMap = array (
        'App\\Controllers\\Controller' => __DIR__ . '/../..' . '/Larubel/app/controllers/Controller.php',
        'App\\Controllers\\HomeController' => __DIR__ . '/../..' . '/Larubel/app/controllers/HomeController.php',
        'App\\Controllers\\PostController' => __DIR__ . '/../..' . '/Larubel/app/controllers/PostController.php',
        'App\\Model\\Post' => __DIR__ . '/../..' . '/Larubel/app/model/Post.php',
        'App\\Model\\User' => __DIR__ . '/../..' . '/Larubel/app/model/User.php',
        'Larubel\\Core\\Router\\Router' => __DIR__ . '/../..' . '/larubel/core/router/Router.php',
        'Larubel\\Core\\View\\Loader' => __DIR__ . '/../..' . '/larubel/core/view/Loader.php',
        'Larubel\\Core\\View\\View' => __DIR__ . '/../..' . '/larubel/core/view/View.php',
        'Larubel\\Database\\Bond' => __DIR__ . '/../..' . '/larubel/database/Bond.php',
        'Larubel\\Database\\Connection' => __DIR__ . '/../..' . '/larubel/database/Connection.php',
        'Larubel\\Database\\Database' => __DIR__ . '/../..' . '/larubel/database/Database.php',
        'Larubel\\Database\\Interfaces\\ORMInterface' => __DIR__ . '/../..' . '/larubel/database/interfaces/ORMIngerface.php',
        'Larubel\\Libs\\Helpers\\Helper' => __DIR__ . '/../..' . '/larubel/libs/helpers/Helper.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf165211effac0e13cca123a9190f084d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf165211effac0e13cca123a9190f084d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf165211effac0e13cca123a9190f084d::$classMap;

        }, null, ClassLoader::class);
    }
}
