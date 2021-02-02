<?php

namespace App\Route;

class Page extends HelpPage{

    public function __construct($option = array(), $tpl_dir = "/Views/")
    {
        parent::__construct($option, $tpl_dir);
    }

}