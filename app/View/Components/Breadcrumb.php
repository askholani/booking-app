<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $links;

    public function __construct($links = [])
    {
        $this->links = $links; // Array of breadcrumb links
    }

    public function render()
    {
        return view('components.breadcrumb');
    }
}
