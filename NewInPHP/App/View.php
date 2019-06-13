<?php
namespace App;

/**
 * @property array news
 * @property array article
 * @property array|null models
 * @property array|null function
 */
class View implements
    \Countable,
    \Iterator
{
    use MagicTrait;

    protected $data = [];


    public function display($template)
    {
        foreach ($this->data as $name => $value) {
            $$name = $value;
        }
        include $template;
    }

    public function render($template)
    {
        ob_start();
        $this->display($template);
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }


    public function count()
    {
        return count($this->data);
    }


    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        return next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        $key = key($this->data);
        return ($key !== null && $key !== false);
    }

    public function rewind()
    {
        reset($this->data);
    }
}