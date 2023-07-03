<?php

namespace App\Http\Livewire;

use App\Models\Wishes;
use Illuminate\Http\Request;
use Livewire\Component;
use SheetDB\SheetDB;

class CreateWish extends Component
{
    public $name;
    public $comment;

    protected $rules = [
        'name' => 'required',
        'comment' => 'required',
    ];

    public function mount(Request $request)
    {
        $this->name = $request->to;
    }

    public function render(Request $request)
    {
        return view('livewire.create-wish');
    }

    public function createWish(){
        $this->validate();

        $sheetdb = new SheetDB('y1pstz8h3pg5c');

        Wishes::create([
            'wedding_id' => 1,
            'name' => $this->name,
            'comment' => $this->comment
        ]);

        $this->name = "";
        $this->comment = "";
        $this->emit('wishCreated');
    }
}
