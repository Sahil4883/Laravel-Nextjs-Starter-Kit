<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Fetch all users (id and name only)
    public function index()
    {
        return response()->json(
            User::select('id', 'name')->get()
        );
    }
}
