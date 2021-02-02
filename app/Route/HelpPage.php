<?php

namespace App\Route;

use Rain\Tpl;
use Slim\View;

abstract class HelpPage{

    private $tpl;
    private $options = [];
    private $defaults = [
        "header" => true,
        "footer" => true,
        "data"   => []
    ];

    public function __construct($option = array(), $tpl_dir)
    {
        $this->options = array_merge($this->defaults, $option);

        $config = array(
            "tpl_dir"   => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
            "cache_dir" => $_SERVER["DOCUMENT_ROOT"]."/Views-cache/",
            "debug"     => false
        );

        Tpl::configure($config);

        $this->tpl = new Tpl;

        $this->setData($this->options["data"]);

        if($this->options["header"]):  $this->tpl->draw("header"); endif;

    }

    private function setData($data = array())
    {
        foreach($data as $key=>$value){
            $this->tpl->assign($key, $value);
        }
    }

    public function setTpl($name, $data = array(), $returnHtml = false)
    {
        $this->setData($data);

        $this->tpl->draw($name, $returnHtml);
    }

    public function __destruct()
    {
        if($this->options["header"]): $this->tpl->draw("footer"); endif;
    }

}