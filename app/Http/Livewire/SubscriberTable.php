<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SubscriberTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            
            Column::name('id')
                ->label('SL'),
                Column::name('nid')
                ->label('id card'),
                Column::name('phone')
                ->label('phone number'),
                Column::name('district')
                ->label('district'),
                Column::name('reff')
                ->label('refference'),

                Column::callback(['id','name'], function ($id, $name) {
                    return view('table-actions', ['id' => $id,'name'=> $name]);
                })->unsortable()
        ];
    }
}