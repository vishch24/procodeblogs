<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteRecordModal extends Component
{
    public $title, $url;
    /**
     * Create a new component instance.
     */
    public function __construct($title='', $url= '')
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-record-modal');
    }
}
