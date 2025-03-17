<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeaderRequest;
use App\Http\Requests\UpdateHeaderRequest;
use App\Models\Header;
use Illuminate\Support\Facades\File;

class HeaderController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module = 'Manajemen Header';
        return view('admin.header.index', compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $module = 'Tambah Header';
        return view('admin.header.tambah', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeaderRequest $request)
    {
        $newThumbail = '';
        if ($request->file('thumbnail')) {
            $extension = $request->file('thumbnail')->extension();
            $newThumbail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('public/header', $newThumbail);
        }

        try {
            $data = new Header();
            $data->deskripsi = $request->deskripsi;
            $data->thumbnail = $newThumbail;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add Header success');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = Header::all();
        return $this->sendResponse($data, 'Get data success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($params)
    {
        $module = 'Edit Header';
        $data = Header::where('uuid', $params)->first();
        return view('admin.header.edit', compact('module', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreHeaderRequest $request, $params)
    {
        $data = Header::where('uuid', $params)->first();

        $oldThumnailPath = public_path('/public/header/' . $data->thumbnail);

        $newThumbnail = '';
        if ($request->file('thumbnail')) {
            $extension = $request->file('thumbnail')->extension();
            $newThumbnail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('public/header', $newThumbnail);

            // Hapus foto lama jika ada
            if (File::exists($oldThumnailPath)) {
                File::delete($oldThumnailPath);
            }
        }

        try {
            $data->deskripsi = $request->deskripsi;
            $data->thumbnail = $request->file('thumbnail') ? $newThumbnail : $data->thumbnail;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update Header success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($params)
    {
        $data = array();
        try {
            $data = Header::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldThumnailPath = public_path('/public/header/' . $data->thumbnail);
            // Hapus foto lama jika ada
            if (File::exists($oldThumnailPath)) {
                File::delete($oldThumnailPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Header success');
    }
}
