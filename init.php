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
    $this->dbConnect ('mysql://root:@localhost/party-app');
  }
}


class Guest extends \atk4\data\Model
{
  public $table='guest';
  function init(){
    parent::init ();

    $this->addfields(['name', 'surname', 'phone','email']);
    $this->addFields(['age']);
    $this->addfields(['units_of_drink']);
  }

}
