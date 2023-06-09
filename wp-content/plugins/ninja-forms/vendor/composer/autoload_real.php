<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2410bafcf6bf995e2f6ee01bba8824ef
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

        spl_autoload_register(array('ComposerAutoloaderInit2410bafcf6bf995e2f6ee01bba8824ef', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2410bafcf6bf995e2f6ee01bba8824ef', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2410bafcf6bf995e2f6ee01bba8824ef::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
