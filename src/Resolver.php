<?php

namespace Src;

class Resolver {
    protected static $namespacePrefix = 'Kvbishnoi\\mypackage\\';

    public static function getNamespacePrefix() {
        // You could load this dynamically from a config file, environment variable, or something else
        return self::$namespacePrefix;
    }

    public static function resolveClassName($class) {
        return self::getNamespacePrefix() . $class;
    }
}