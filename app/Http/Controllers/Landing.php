<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Iklan;
use App\Models\Komentar;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Landing extends BaseController
{
    public function home()
    {
        $module = 'Home';
        $artikel_pilihan  = Artikel::where('set_artikel', true)->first();
        $author = User::where('uuid', optional($artikel_pilihan)->uuid_user)->first();
        $artikel_latest = Artikel::whereNotNull('tanggal_pulbukasi') // Hanya ambil yang sudah dipublikasikan
            ->orderBy('tanggal_pulbukasi', 'desc') // Urutkan dari yang terbaru
            ->limit(4) // Ambil 4 data saja
            ->get();

        $k_teknologi = Artikel::whereNotNull('tanggal_pulbukasi')
            ->whereIn('kategori', ['Startup', 'AI', 'Gadget', 'Digital Lifestyle', 'Cyber Security'])
            ->orderBy('tanggal_pulbukasi', 'desc')
            ->limit(6)
            ->get()
            ->map(function ($item) {
                $user = User::where('uuid', $item->uuid_user)->first();

                $item->author = $user->name;
                return $item;
            });

        $iklan = Iklan::all();

        $k_gayahidup = Artikel::whereNotNull('tanggal_pulbukasi')
            ->whereIn('kategori', [
                'Fashion',
                'Kesehatan',
                'Kecantikan',
                'Mental Health',
                'Kuliner',
                'Travel',
            ])
            ->orderBy('tanggal_pulbukasi', 'desc')
            ->limit(4)
            ->get();

        $k_hiburan = Artikel::whereNotNull('tanggal_pulbukasi')
            ->whereIn('kategori', [
                'Film',
                'Musik',
                'Selebriti',
                'Seni & Budaya',
            ])
            ->orderBy('tanggal_pulbukasi', 'desc')
            ->limit(4)
            ->get();

        $k_ekonomi = Artikel::whereNotNull('tanggal_pulbukasi')
            ->whereIn('kategori', [
                'Analisis Pasar',
                'Finansial',
                'Investasi',
                'UMKM & Startup',
            ])
            ->orderBy('tanggal_pulbukasi', 'desc')
            ->limit(6)
            ->get()
            ->map(function ($item) {
                $user = User::where('uuid', $item->uuid_user)->first();

                $item->author = $user->name;
                return $item;
            });

        $latest_news = Artikel::whereNotNull('tanggal_pulbukasi') // Hanya ambil yang sudah dipublikasikan
            ->orderBy('tanggal_pulbukasi', 'desc') // Urutkan dari yang terbaru
            ->limit(12) // Ambil 4 data saja
            ->get();

        error_reporting(0);
        function get_curl($urlna)
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $urlna);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);

            return json_decode($result, true);
        }

        $channel = get_curl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC2o13QIB9_NODrWigTgvQrw&key=AIzaSyCdY0RDgXZ53u_XjpdJUJa4HuvXfg4a_f0');

        $youtubeprofile = $channel['items'][0]['snippet']['thumbnails']['medium']['url'];
        $namachannel = $channel['items'][0]['snippet']['title'];
        $subreker = $channel['items'][0]['statistics']['subscriberCount'];

        $pideona = get_curl('https://www.googleapis.com/youtube/v3/search?key=AIzaSyCdY0RDgXZ53u_XjpdJUJa4HuvXfg4a_f0&channelId=UC2o13QIB9_NODrWigTgvQrw&maxResult=3&order=date&part=snippet');

        $idpideo = [];

        foreach ($pideona['items'] as $p) {
            $idpideo[] = [
                'id' => $p['id']['videoId'],
                'publish' => $p['snippet']['publishTime'],
                'channelTitle' => $p['snippet']['channelTitle'],
                'title' => $p['snippet']['title'],
            ];
        }

        return view('landing.home.index', compact(
            'module',
            'artikel_pilihan',
            'artikel_latest',
            'author',
            'k_teknologi',
            'iklan',
            'k_gayahidup',
            'k_hiburan',
            'namachannel',
            'idpideo',
            'k_ekonomi',
            'latest_news',
        ));
    }

    public function detail_kategori($params)
    {
        $module = $params;
        $data = Artikel::whereNotNull('tanggal_pulbukasi')
            ->where('kategori', $params)
            ->orderBy('tanggal_pulbukasi', 'desc')
            ->paginate(15);

        // Ambil semua uuid_user dari hasil query
        $userUuids = $data->pluck('uuid_user')->unique();

        // Query semua user yang terkait dalam satu query
        $users = User::whereIn('uuid', $userUuids)->get()->keyBy('uuid');

        // Tambahkan author ke setiap artikel
        $data->getCollection()->transform(function ($item) use ($users) {
            $item->author = optional($users->get($item->uuid_user))->name ?? 'Unknown Author';
            $item->t_komentar = Komentar::where('uuid_artikel', $item->uuid)->count();
            return $item;
        });

        return view('landing.detailkategori.index', compact('module', 'data'));
    }

    public function view_home(Request $request)
    {
        $data_view = View::where('unique_id', $request->cookie('XSRF-TOKEN'))->first();
        $data = array();
        try {
            if ($data_view == null) {
                $data = new View();
                $data->unique_id = $request->cookie('XSRF-TOKEN');
                $data->save();
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Added data success');
    }

    public function view_artikel(Request $request, $params)
    {
        $data_view = View::where('unique_id', $request->cookie('XSRF-TOKEN'))->where('uuid_artikel', $params)->first();
        $data = array();
        try {
            if ($data_view == null) {
                $data = new View();
                $data->uuid_artikel = $params;
                $data->unique_id = $request->cookie('XSRF-TOKEN');
                $data->save();
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Added data success');
    }

    public function detail_artikel($params)
    {
        $data = Artikel::where('uuid', $params)->first();
        $module = $data->judul_artikel;
        $komentar = Komentar::where('uuid_artikel', $data->uuid)->get();
        $komentar->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $item->author = $user->name;
            return $item;
        });

        $artikel_populer = Artikel::select(DB::raw('artikels.*, COUNT(views.id) as total_view'))
            ->whereNotNull('tanggal_pulbukasi')
            ->leftJoin('views', 'artikels.uuid', '=', 'views.uuid_artikel')
            ->groupBy(
                'artikels.id',
                'artikels.uuid',
                'artikels.uuid_user',
                'artikels.kategori',
                'artikels.judul_artikel',
                'artikels.konten',
                'artikels.tanggal_pulbukasi',
                'artikels.thumbnail',
                'artikels.publikasi',
                'artikels.set_artikel',
                'artikels.created_at',
                'artikels.updated_at'
            )
            ->orderByDesc('total_view')
            ->take(4)
            ->get();
        return view('landing.detailartikel.index', compact('module', 'data', 'komentar', 'artikel_populer'));
    }

    public function search(Request $request)
    {
        $query = $request->q;
        $articles = Artikel::whereNotNull('tanggal_pulbukasi')
            ->where('judul_artikel', 'LIKE', "%{$query}%")
            ->get();

        return $this->sendResponse($articles, 'Get search');
    }
}
