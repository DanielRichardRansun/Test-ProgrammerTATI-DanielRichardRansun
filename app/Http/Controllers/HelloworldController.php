<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloworldController extends Controller
{
    public function index(Request $request)
    {
        $n = $request->input('n', 1); // default 1
        $output = [];

        for ($i = 1; $i <= $n; $i++) {
            if ($i % 4 === 0 && $i % 5 === 0) {
                $output[] = 'helloworld';
            } elseif ($i % 4 === 0) {
                $output[] = 'hello';
            } elseif ($i % 5 === 0) {
                $output[] = 'world';
            } else {
                $output[] = $i;
            }
        }

        return view('helloworld', ['output' => $output, 'input' => $n]);
    }
}
