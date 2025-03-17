<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIklanRequest;
use App\Http\Requests\UpdateIklanRequest;
use App\Models\Iklan;
use Illuminate\Support\Facades\File;

class IklanController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module = 'Iklan';
        return view('admin.iklan.index', compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $module = 'Tambah Iklan';
        return view('admin.iklan.tambah', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIklanRequest $request)
    {
        $newThumbail = '';
        if ($request->file('thumbnail')) {
            $extension = $request->file('thumbnail')->extension();
            $newThumbail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('public/iklan', $newThumbail);
        }

        try {
            $data = new Iklan();
            $data->judul_iklan = $request->judul_iklan;
            $data->link = $request->link;
            $data->thumbnail = $newThumbail;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add Iklan success');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = Iklan::all();
        return $this->sendResponse($data, 'Get data success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($params)
    {
        $module = 'Edit Iklan';
        $data = Iklan::where('uuid', $params)->first();
        return view('admin.iklan.edit', compact('module', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIklanRequest $request, $params)
    {
        $data = Iklan::where('uuid', $params)->first();

        $oldThumnailPath = public_path('/public/iklan/' . $data->thumbnail);

        $newThumbnail = '';
        if ($request->file('thumbnail')) {
            $extension = $request->file('thumbnail')->extension();
            $newThumbnail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('public/iklan', $newThumbnail);

            // Hapus foto lama jika ada
            if (File::exists($oldThumnailPath)) {
                File::delete($oldThumnailPath);
            }
        }

        try {
            $data->judul_iklan = $request->judul_iklan;
            $data->link = $request->link;
            $data->thumbnail = $request->file('thumbnail') ? $newThumbnail : $data->thumbnail;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update Iklan success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($params)
    {
        $data = array();
        try {
            $data = Iklan::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldThumnailPath = public_path('/public/iklan/' . $data->thumbnail);
            // Hapus foto lama jika ada
            if (File::exists($oldThumnailPath)) {
                File::delete($oldThumnailPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Iklan success');
    }
}
