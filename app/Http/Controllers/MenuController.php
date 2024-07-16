<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
     public function getMenu()
    {
        $menu = [
            [
                'text' => 'Federacion',
                'url' => 'dashboard',
                'icon' => 'fa fa-globe',
            ],
            // Otros elementos estáticos...
        ];

        if (auth()->check()) {
            if (auth()->user()->hasRole('admin')) {
                $menu[] = [
                    'text' => 'Admin Panel',
                    'url' => 'admin/panel',
                    'icon' => 'fas fa-cogs',
                ];
            }
        }

        return $menu;
    }

    public function index()
    {
        $menu = $this->getMenu();

        return view('tu-vista', compact('menu'));
    }
}
