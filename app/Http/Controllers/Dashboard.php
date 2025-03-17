<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Event;
use App\Models\Komentar;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;

class Dashboard extends BaseController
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->back();
        }
        return redirect()->route('login.login-akun');
    }

    public function dashboard_admin()
    {
        $module = 'Dashboard';
        $t_user = User::where('role', 'user')->count();
        $t_artikel = Artikel::whereNotNull('tanggal_pulbukasi')->count();
        $t_komentar = Komentar::count();
        return view('dashboard.admin', compact(
            'module',
            't_user',
            't_artikel',
            't_komentar',
        ));
    }

    public function dashboard_user()
    {
        $module = 'Dashboard';
        $t_user = User::where('role', 'user')->count();
        $t_artikel = Artikel::whereNotNull('tanggal_pulbukasi')->count();
        $t_komentar = Komentar::count();
        return view('dashboard.user', compact(
            'module',
            't_user',
            't_artikel',
            't_komentar',
        ));
    }

    public function areaChart()
    {
        $year = request('year');
        $month = request('month');

        $query = View::query();

        if ($year) {
            $query->whereYear('created_at', $year);
        }
        if ($month) {
            $query->whereMonth('created_at', $month);
        }

        $dailyViews = $query->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $weeklyViews = $query->selectRaw('YEARWEEK(created_at) as week, COUNT(*) as total')
            ->groupBy('week')
            ->orderBy('week', 'asc')
            ->get();

        $monthlyViews = $query->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $result = [
            'daily' => [
                'labels' => $dailyViews->pluck('date'),
                'data' => $dailyViews->pluck('total')
            ],
            'weekly' => [
                'labels' => $weeklyViews->pluck('week'),
                'data' => $weeklyViews->pluck('total')
            ],
            'monthly' => [
                'labels' => $monthlyViews->pluck('month'),
                'data' => $monthlyViews->pluck('total')
            ]
        ];

        // Mengembalikan data dalam format JSON
        return $this->sendResponse('Get data success', $result);
    }
}
