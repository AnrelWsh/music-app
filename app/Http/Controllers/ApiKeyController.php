<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = Auth::user()->apiKeys;
        return Inertia::render('ApiKeys/Index', compact('apiKeys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Auth::user()->apiKeys()->create($request->only('name'));

        return redirect()->route('api-keys.index');
    }

    public function destroy(ApiKey $apiKey)
    {

        $apiKey->delete();

        return redirect()->route('api-keys.index');
    }
}

