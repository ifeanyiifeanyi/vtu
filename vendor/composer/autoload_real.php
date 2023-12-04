<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit98818efb8b18801c38dbb279d7f3e2dd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit98818efb8b18801c38dbb279d7f3e2dd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit98818efb8b18801c38dbb279d7f3e2dd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit98818efb8b18801c38dbb279d7f3e2dd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}