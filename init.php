<?php
require 'vendor/autoload.php';

class App extends \atk4\ui\App
{
  function __construct ($is_admin=false){
    parent::__construct('Party App');
    if ($is_admin){
      $this->initLayout ('Admin');
      $this->layout->menuLeft->addItem(['Guests', 'icon'=>'birthday cake']);
    }
    else {
      $this->initLayout ('Centered');
    }
    $this->dbConnect ('mysql://roo:root@localhost/');
  }
}


class Guest extends \atk4\ui\Model
{
  public $table='guest';
  function init(){
    parent::init ();

    $this->addfields(['name', 'suname', 'phone','email']);
    $this->addfiel(['age']);
    $this->addfiel(['unit_of_drink'],['hint'=>'Bring your own Drink - how mauch bottle will you bring?']);
  }

}
