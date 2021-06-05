<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function hello(Request $request, $name)
    {
        $content = 'Hello, ' . $name;
        if ($request->has('secret')) {
            $content = $content . ', your secret is ' . $request->secret;
        }
        return ['status' => 1, 'result' => $content];
    }
}
