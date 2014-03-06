<?php namespace Combustion;

class View {

    protected   $_folder = null,
                $_view = null,
                $_fuel = null;

    public function __construct($folder, $view) {
        $this->_folder = $folder;
        $this->_view = $view;
        $this->_fuel = new Fuel();
    }

    public static function render($view) {
        $folder = explode('.', $view)[0];
        $view = explode('.', $view)[1];

        return new View($folder, $view);
    }

    public function with($param = array()) {
        if ($this->_folder && $this->_view) {
            $this->_fuel->prep($this->_folder, $this->_view, $param);
            $this->_fuel->dispatch();
        }
        else {
            Exceptions::make('You need to define a view to render.');
        }
    }

    public static function tmp($view) {
        $folder = explode(".", $view)[0];
        $viewfile = explode(".", $view)[1];
        include APP_PATH . "view/" . $folder . "/" . $viewfile . ".fuel" . EXT;
    }

}
