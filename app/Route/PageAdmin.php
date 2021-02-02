<?php

namespace App\Route;

class PageAdmin extends HelpPage{


    public function __construct($option = array(), $tpl_dir = "/Views/admin/")
    {
        parent::__construct($option, $tpl_dir);
    }

}