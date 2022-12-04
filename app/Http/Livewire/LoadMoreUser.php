<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\FalseCeilingImages;
use Livewire\Component;
use App\Models\User;

class LoadMoreUser extends Component
{
    public $perPage = 15;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function loadMore()
    {
        $this->perPage = $this->perPage + 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render($id)
    {
        // dd($this->perPage);
        $FalseCeiling = FalseCeilingImages::where('category', $id)->paginate($this->perPage);
        $this->emit('userStore');

        return view('livewire.load-more-user', ['FalseCeiling' => $FalseCeiling]);
    }
}
