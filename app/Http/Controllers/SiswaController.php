<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function editProfile()
    {
        $user = auth()->user();
        return view('siswa.profile.edit_profile', compact('user'));
    }
}
