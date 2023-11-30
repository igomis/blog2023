<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;
    public $typeClasses;

    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;

        $this->typeClasses = $this->generateTypeClasses($type);
    }

    public function render()
    {
        return view('components.alert');
    }

    protected function generateTypeClasses($type)
    {
        switch ($type) {
            case 'success':
                return 'bg-green-500 text-white p-4 rounded-md';
            case 'danger':
                return 'bg-red-500 text-white p-4 rounded-md';
            case 'warning':
                return 'bg-yellow-500 text-white p-4 rounded-md';
            case 'info':
                return 'bg-blue-500 text-white p-4 rounded-md';
            default:
                return 'bg-gray-500 text-white p-4 rounded-md';
        }
    }
}
