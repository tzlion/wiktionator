<?php

namespace TzLion\Wiktionator;

abstract class Wiktionator {

    public static function getInstance( $dbConnectionDetails = null )
    {
        if ( $dbConnectionDetails && DbWiktionator::canConnect( $dbConnectionDetails ) ) {
            return new DbWiktionator( $dbConnectionDetails );
        } else {
            return new ApiWiktionator();
        }
    }

    private function __construct()
    {

    }

    /**
     * @param string $word
     * @return string
     */
    public abstract function getWordPage( $word );

    /**
     * @param string $word
     * @param string $category
     * @return bool
     */
    public abstract function isWordInCategory( $word, $category );

    /**
     * @param string $word
     * @return array
     */
    public abstract function getWordCategories( $word );

    /**
     * @param string $category
     * @return string
     */
    public abstract function getRandomWordInCategory( $category );

    /**
     * @param string $word
     * @return bool
     */
    public abstract function wordExistsInLanguage( $word, $lang='en' );
}