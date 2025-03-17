<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ArtikelController extends BaseController
{
    public function index()
    {
        $module = 'Artikel';
        return view('admin.artikel.index', compact('module'));
    }

    public function index_user()
    {
        $module = 'Artikel';
        return view('user.artikel.index', compact('module'));
    }

    public function get()
    {
        $data = Artikel::all();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $item->author = $user->name;

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Artikel';
        return view('admin.artikel.tambah', compact('module'));
    }

    public function add_user()
    {
        $module = 'Tambah Artikel';
        return view('user.artikel.tambah', compact('module'));
    }

    public function store(StoreArtikelRequest $storeArtikelRequest)
    {
        $newThumbail = '';
        if ($storeArtikelRequest->file('thumbnail')) {
            $extension = $storeArtikelRequest->file('thumbnail')->extension();
            $newThumbail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $storeArtikelRequest->file('thumbnail')->storeAs('public/thumbnail', $newThumbail);
        }

        try {
            $data = new Artikel();
            $data->uuid_user = auth()->user()->uuid;
            $data->kategori = $storeArtikelRequest->kategori;
            $data->judul_artikel = $storeArtikelRequest->judul_artikel;
            $data->konten = $storeArtikelRequest->konten;
            $data->thumbnail = $newThumbail;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add Artikel success');
    }

    public function edit($params)
    {
        $module = 'Edit Artikel';
        $data = Artikel::where('uuid', $params)->first();
        return view('admin.artikel.edit', compact('module', 'data'));
    }

    public function edit_user($params)
    {
        $module = 'Edit Artikel';
        $data = Artikel::where('uuid', $params)->first();
        return view('user.artikel.edit', compact('module', 'data'));
    }

    public function update(UpdateArtikelRequest $updateArtikelRequest, $params)
    {
        $data = Artikel::where('uuid', $params)->first();

        $oldThumnailPath = public_path('/public/thumbnail/' . $data->thumbnail);

        $newThumbnail = '';
        if ($updateArtikelRequest->file('thumbnail')) {
            $extension = $updateArtikelRequest->file('thumbnail')->extension();
            $newThumbnail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $updateArtikelRequest->file('thumbnail')->storeAs('public/thumbnail', $newThumbnail);

            // Hapus foto lama jika ada
            if (File::exists($oldThumnailPath)) {
                File::delete($oldThumnailPath);
            }
        }

        try {
            $data->uuid_user = auth()->user()->uuid;
            $data->kategori = $updateArtikelRequest->kategori;
            $data->judul_artikel = $updateArtikelRequest->judul_artikel;
            $data->konten = $updateArtikelRequest->konten;
            $data->thumbnail = $updateArtikelRequest->file('thumbnail') ? $newThumbnail : $data->thumbnail;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update Artikel success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Artikel::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldThumnailPath = public_path('/public/thumbnail/' . $data->thumbnail);
            // Hapus foto lama jika ada
            if (File::exists($oldThumnailPath)) {
                File::delete($oldThumnailPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Event success');
    }

    public function update_publikasi($params)
    {
        $data = Artikel::where('uuid', $params)->first();
        try {
            $data->publikasi = true;
            $data->tanggal_pulbukasi = now();
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update publikasi artikel success');
    }

    public function update_tombol($params)
    {
        $data = Artikel::where('uuid', $params)->first();
        try {
            if ($data->set_artikel == true) {
                $data->set_artikel = false;
            } elseif ($data->set_artikel == false) {
                $data->set_artikel = true;
            }
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update tombol success');
    }
}
