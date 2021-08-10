<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Illuminate\Http\Request;Midnight

Class HelloWorld extends Component
{
    public $name = 'Erick';
    public $loud = false;
    public $greeting = 'Hello';

  
    public function resetName($name = 'Chico')
    {
        $this->name = $name;
    }


    public function render()
    {
        return view('livewire.hello-world', );
    }
}
