<?php namespace Combustion;

use Combustion\Ninja;

class View {

	protected $_ninja;

	/**
     * Returns the *Singleton* instance of this class.
     *
     * @staticvar Singleton $instance The *Singleton* instances of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function render()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    	$this->_ninja = new Ninja();
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

    /**
     * Use the method to create a view. We can use 'dot' notation to represent
     * directory seperator inside views folder
     * 
     * @return boolean Was able to create the view or not
     */
    public function make($view) {
    	$tree = explode('.', $view);
    }

    public function with($vars = array()) {

    }

}