<div class="flex flex-col gap-4">
    <div class="flex flex-col p-1 rounded shadow-md items-center bg-sky-200 w-full">
        <div class="text-lg font-bold">Alle Kantone</div>
        <div class="flex gap-1">
            <div class="flex items-center gap-1 text-md border-sky-400 bg-sky-300 rounded">
                <div class="flex flex-col items-center gap-1 px-1">
                    <div><i class="fa-solid fa-calendar-plus"></i></div>
                    <div class="flex gap-1">
                        <div class="flex items-center justify-between gap-1 text-md bg-sky-400 rounded px-1"><i class="fa-solid fa-charging-station"></i><span>{{ $carCountElectric }}</span></div>
                        <div class="flex items-center justify-between gap-1 text-md bg-sky-400 rounded px-1"><i class="fa-solid fa-gas-pump"></i><span>{{ $carCountGas }}</span></div>
                        <div class="flex items-center justify-between gap-1 text-md bg-sky-400 rounded px-1"><i class="fa-solid fa-percent"></i><span>{{ $carCountRatio }}</span></div>    
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-1 text-md border-sky-400 bg-sky-300 rounded">
                <div class="flex flex-col items-center gap-1 p-1">
                    <div><i class="fa-solid fa-calendar-day"></i></div>
                    <div class="flex gap-1">
                        <div class="flex items-center justify-between gap-1 text-md bg-sky-400 rounded px-1"><i class="fa-solid fa-charging-station"></i><span>{{ $carCountElectricToday }}</span></div>
                        <div class="flex items-center justify-between gap-1 text-md bg-sky-400 rounded px-1"><i class="fa-solid fa-gas-pump"></i><span>{{ $carCountGasToday }}</span></div>
                        <div class="flex items-center justify-between gap-1 text-md bg-sky-400 rounded px-1"><i class="fa-solid fa-percent"></i><span>{{ $carCountRatioToday }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="grid grid-cols-2 mt-2 gap-1">
        @foreach ($cantonsStats as $canton => $cantonData)
        <div class="flex flex-col p-1 rounded shadow-md items-center bg-sky-200 w-full">
            <div class="text-sm font-bold">{{ $canton }}</div>
            <div class="flex gap-1 w-full">
                <div class="flex items-center gap-1 text-md border-sky-400 bg-sky-300 rounded mt-1 w-full">
                    <div class="flex items-center gap-2 mx-auto ">
                        <div><i class="fa-solid fa-calendar-plus"></i></div>
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center justify-between gap-1 text-xs bg-sky-400 rounded px-1"><i class="fa-solid fa-charging-station"></i><span>{{ $cantonData['electric'] }}</span></div>
                            <div class="flex items-center justify-between gap-1 text-xs bg-sky-400 rounded px-1"><i class="fa-solid fa-gas-pump"></i><span>{{ $cantonData['gas'] }}</span></div> 
                            <div class="flex items-center justify-between gap-1 text-xs bg-sky-400 rounded px-1"><i class="fa-solid fa-percent"></i><span>{{ $cantonData['ratio'] }}</span></div>   
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-1 text-md border-sky-400 bg-sky-300 rounded mt-1 w-full">
                    <div class="flex items-center gap-2 p-1 mx-auto ">
                        <div><i class="fa-solid fa-calendar-day"></i></div>
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center justify-between gap-1 text-xs bg-sky-400 rounded px-1"><i class="fa-solid fa-charging-station"></i><span>{{ $cantonData['electric_today'] }}</span></div>
                            <div class="flex items-center justify-between gap-1 text-xs bg-sky-400 rounded px-1"><i class="fa-solid fa-gas-pump"></i><span>{{ $cantonData['gas_today'] }}</span></div>
                            <div class="flex items-center justify-between gap-1 text-xs bg-sky-400 rounded px-1"><i class="fa-solid fa-percent"></i><span>{{ $cantonData['ratio_today'] }}</span></div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex mt-2 h-12">
        @foreach ($possibleKantons as $index => $canton)
            @if ($index == 0) <!-- First button -->
                <button @class(['bg-sky-200' => $currentCanton === $canton, 'border', 'rounded-l', 'border-sky-400', 'px-2', 'w-full']) wire:click="setCanton('{{ $canton }}')">{{ $canton }}</button>
            @elseif ($index == count($possibleKantons) - 1) <!-- Last button -->
                <button @class(['bg-sky-200' => $currentCanton === $canton, 'border-r', 'border-t', 'border-b', 'rounded-r', 'border-sky-400', 'px-2', 'w-full']) wire:click="setCanton('{{ $canton }}')">{{ $canton }}</button>
            @else <!-- Middle buttons -->
                <button @class(['bg-sky-200' => $currentCanton === $canton, 'border-r', 'border-t', 'border-b', 'border-sky-400', 'px-2', 'w-full']) wire:click="setCanton('{{ $canton }}')">{{ $canton }}</button>
            @endif
        @endforeach
    </div>
    <div class="flex flex-col mt-2 gap-2">
        <button class="py-12 border rounded border-sky-400 bg-sky-200 text-4xl w-full" wire:click="incrementElectric"><i class="fa-solid fa-charging-station"></i></button>
        <button class="py-12 border rounded border-sky-400 bg-sky-200 text-4xl w-full" wire:click="incrementGas"><i class="fa-solid fa-gas-pump"></i></button>
        
    </div>
</div>
