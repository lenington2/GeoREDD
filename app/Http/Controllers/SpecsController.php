<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;

class SpecsController extends Controller
{
    /**
     * Show the specs for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $specsFile = Jetstream::localizedMarkdownPath('specs.md');

        return view('specs', [
            'specs' => Str::markdown(file_get_contents($specsFile)),
        ]);
    }
}
