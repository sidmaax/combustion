<?php namespace Combustion;

class Fuel {

    private $_layouts,
            $_views,
            $_sections = array(
                'yield',
                'section',
                'endsection'
            );

    public function __construct() {
        
    }

    public function prep($folder, $view, $param) {
        // get layout
        
        // get view
        
        // fuse layout & view with params
        
        // store it in storage
        
        // dispatch the view (render)
        
        // delete storage
    }

    private function resolveLayout() {
        // return contents of layout
    }

    private function resolveView() {
        // reeturn contents of view
    }

    public function dispatch() {
        // Render the passed the view
    }

}
