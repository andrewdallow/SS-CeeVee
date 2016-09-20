<?php

/**
 * Description of PortfolioTag
 *
 * @author Andrew Dallow
 */
class PortfolioTag extends DataObject  {
    private static $db = array(
        'Title' => 'Varchar(200)',
    );
    
    private static $belongs_many_many = array(
        'PortfolioItems' => 'PortfolioItem'
    );
}
