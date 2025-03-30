<?php

namespace App\Livewire;

use Livewire\Component;

class CarCounter extends Component
{
    public $carCountElectric = 0;
    public $carCountGas = 0;

    public function incrementElectric()
    {
        $this->carCountElectric++;
    }

    public function incrementGas()
    {
        $this->carCountGas++;
    }

    public function render()
    {
        return view('livewire.car-counter');
    }
}