<?php
class Welcome extends CORE\Controller {
    public function index() {
        $x = array("x" => "a");
        $this->loadView("testview", $x);
        $this->loadView("testview", $x);
    }
}