<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CarCount;

class CarCounter extends Component
{
    public $carCountElectric = 0;
    public $carCountElectricToday = 0;
    public $carCountGas = 0;
    public $carCountGasToday = 0;
    public $carCountRatio = 0;
    public $carCountRatioToday = 0;
    public $possibleKantons = ['AG', 'ZH'];
    public $cantonsStats = [];
    public $cantonsStatsToday = [];
    public $currentCanton = 'AG';
    public $ratio = 0;
    

    public static function calculateRatio($carCountElectric, $carCountGas)
    {
        if ($carCountGas > 0) {
            return round( 100 / ($carCountElectric + $carCountGas) * $carCountElectric , 2);
        }
        return 0; // Avoid division by zero
    }

    public function mount()
    {
        $this->getCarCounts();
    }

    private function getCarCounts()
    {
        $this->carCountElectric = CarCount::where('car_type', 'electric')
            ->count();

        $this->carCountGas = CarCount::where('car_type', 'gas')
            ->count();

        $this->carCountRatio = self::calculateRatio($this->carCountElectric, $this->carCountGas);

        $this->carCountElectricToday = CarCount::where('car_type', 'electric')
            ->whereDate('created_at', now())
            ->count();
        $this->carCountGasToday = CarCount::where('car_type', 'gas')
            ->whereDate('created_at', now())
            ->count();
        $this->carCountRatioToday = self::calculateRatio($this->carCountElectricToday, $this->carCountGasToday);

        foreach ($this->possibleKantons as $kanton) {
            $this->cantonsStats[$kanton]['electric'] = CarCount::where('car_type', 'electric')
                ->where('kanton', $kanton)
                ->count();
            $this->cantonsStats[$kanton]['gas'] = CarCount::where('car_type', 'gas')
                ->where('kanton', $kanton)
                ->count();
            $this->cantonsStats[$kanton]['ratio'] = self::calculateRatio(
                $this->cantonsStats[$kanton]['electric'],
                $this->cantonsStats[$kanton]['gas']
            );
            $this->cantonsStats[$kanton]['electric_today'] = CarCount::where('car_type', 'electric')
                ->where('kanton', $kanton)
                ->whereDate('created_at', now())
                ->count();
            $this->cantonsStats[$kanton]['gas_today'] = CarCount::where('car_type', 'gas')
                ->where('kanton', $kanton)
                ->whereDate('created_at', now())
                ->count();
            $this->cantonsStats[$kanton]['ratio_today'] = self::calculateRatio(
                $this->cantonsStats[$kanton]['electric_today'],
                $this->cantonsStats[$kanton]['gas_today']
            );
        }
    }

    public function incrementElectric()
    {
        CarCount::create([
            'car_type' => 'electric',
            'kanton' => $this->currentCanton,
        ]);
        $this->getCarCounts();
    }

    public function incrementGas()
    {
        CarCount::create([
            'car_type' => 'gas',
            'kanton' => $this->currentCanton,
        ]);
        $this->getCarCounts();
    }

    public function setCanton($canton)
    {
        $this->currentCanton = $canton;
    }

    public function render()
    {
        return view('livewire.car-counter');
    }
}