<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $nome = $user->name;
        $document = $user->client->document;
        $status = $user->client->signatures->first()->status->name;

        return view('test', [
            'name' => $nome,
            'document' => $document,
            'status' => $status
        ]);
    }
}
