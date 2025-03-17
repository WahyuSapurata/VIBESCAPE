<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends BaseController
{
    public function add(Request $request)
    {
        $request->validate([
            'komentar' => 'required'
        ], [
            'komentar' => 'Kolom komtar wajib di isi.'
        ]);

        try {
            $data = new Komentar();
            $data->uuid_user = auth()->user()->uuid;
            $data->uuid_artikel = $request->uuid_artikel;
            $data->komentar = $request->komentar;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Komentar berhasil');
    }
}
