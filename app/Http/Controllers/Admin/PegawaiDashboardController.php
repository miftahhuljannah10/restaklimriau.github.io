<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiDashboardController extends Controller
{
    public function index()
    {
        try {
            // Get current user data
            $user = Auth::user();
            $pegawai = null;

            // Try to find pegawai data if associated with this user
            if ($user) {
                $pegawai = Pegawai::where('email', $user->email)->first();
            }

            // Get last activity from session
            $lastActivity = session()->get('last_activity');
            if (!$lastActivity) {
                $lastActivity = now();
                session()->put('last_activity', $lastActivity);
            }

            return view('admin.dashboard-pegawai.index', [
                'user' => $user,
                'pegawai' => $pegawai,
                'lastActivity' => $lastActivity
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
