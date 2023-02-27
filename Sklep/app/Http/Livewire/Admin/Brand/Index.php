<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $brand_id;

    public function deleteBrand($brand_id){

        $this->brand_id = $brand_id;   
    }

    public function destroyBrand(){

        $brand = Brand::find($this->brand_id);
        $brand->delete();
        session()->flash('message', 'Brand Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands' => $brands]);
    }
}
