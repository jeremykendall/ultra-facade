<?php

/**
 * UltraFacade
 *
 * @link      http://github.com/jeremykendall/ultra-facade for the canonical source repository
 * @copyright Copyright (c) 2014 Jeremy Kendall (http://about.me/jeremykendall)
 * @license   http://github.com/jeremykendall/ultra-facade/blob/master/LICENSE MIT License
 */
namespace JeremyKendall\UltraFacade;

/**
 * Concrete Facade implementation. Returns an SPL Iterator
 */
class SplIteratorFacade
{
    /**
     * Map of SPL Iterator names
     */
    private static $iteratorMap = array(
        'AppendIterator',
        'ArrayIterator',
        'CachingIterator',
        'CallbackFilterIterator',
        'DirectoryIterator',
        'EmptyIterator',
        'FilesystemIterator',
        'FilterIterator',
        'GlobIterator',
        'InfiniteIterator',
        'IteratorIterator',
        'LimitIterator',
        'MultipleIterator',
        'NoRewindIterator',
        'ParentIterator',
        'RecursiveArrayIterator',
        'RecursiveCachingIterator',
        'RecursiveCallbackFilterIterator',
        'RecursiveDirectoryIterator',
        'RecursiveFilterIterator',
        'RecursiveIteratorIterator',
        'RecursiveRegexIterator',
        'RecursiveTreeIterator',
        'RegexIterator',
    );

    /**
     * Utilizes Facade pattern to create an SPL Iterator
     *
     * @param  string                   $type    Iterator name, dropping "Iterator" from the string.
     * @param  array                    $options Used to pass required constructor args to Iterator
     * @return mixed                    Instance of an SplIterator
     * @throws InvalidArgumentException If requested SPL Iterator does not exist
     */
    public static function facade($type, array $options = array())
    {
        $className = self::getIteratorName($type);

        if ($className === null) {
            throw new \InvalidArgumentException('No such SPL iterator exists.');
        }

        $class = sprintf('\%s', $className);

        return new $class(implode(', ', $options));
    }

    protected static function getIteratorName($type)
    {
        if (stripos($type, 'Iterator') !== false) {
            $search = $type;
        } else {
            $search = sprintf('%sIterator', $type);
        }

        $lc = array_map('strtolower', self::$iteratorMap);
        $result = array_search(strtolower($search), $lc);

        if ($result) {
            return self::$iteratorMap[$result];
        }

        return null;
    }
}
