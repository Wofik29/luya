<?php

namespace cms\menu;

use Iterator;
use Countable;

/**
 * Iterator class for menu items.
 * 
 * The main goal is to to createa an object for the item on the current() iteration.
 * 
 * @since 1.0.0-beta1
 *
 * @author nadar
 */
class QueryIterator extends \yii\base\Object implements Iterator, Countable
{
    /**
     * @var array An array containing the data to iterate.
     */
    public $data = [];

    /**
     * @var string|null Can contain the language context, so the sub querys for this item will be the same language context
     * as the parent object which created this object.
     */
    public $lang = null;
    
    /**
     * Callculate to number of items when using count() function against the QueryIterator object.
     * 
     * @return int The number of elements in the object.
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * Iterator get current element, generates a new object for the current item on accessing.s.
     * 
     * @return \cms\menu\Item
     */
    public function current()
    {
        return Query::createItemObject(current($this->data), $this->lang);
    }

    /**
     * Iterator get current key.
     * 
     * @return string The current key
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Iterator go to next element.
     * 
     * @return array
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * Iterator rewind.
     * 
     * @return array
     */
    public function rewind()
    {
        return reset($this->data);
    }

    /**
     * Iterator valid.
     * 
     * @return bool
     */
    public function valid()
    {
        return key($this->data) !== null;
    }
}
