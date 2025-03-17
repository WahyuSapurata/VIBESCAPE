<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUser extends BaseController
{
    public function index()
    {
        $module = 'Manajemen User';
        return view('admin.manajemenuser.index', compact('module'));
    }

    public function get()
    {
        $data = User::where('role', 'user')->get();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add(DataUserRequest $dataUserRequest)
    {
        $data = array();
        try {
            $data = new User();
            $data->name = $dataUserRequest->name;
            $data->username = $dataUserRequest->username;
            $data->password = Hash::make($dataUserRequest->current_password);
            $data->current_password = $dataUserRequest->current_password;
            $data->role = 'user';
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add event success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = User::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function edit(DataUserRequest $dataUserRequest, $params)
    {
        $data = User::where('uuid', $params)->first();
        try {
            $data->name = $dataUserRequest->name;
            $data->username = $dataUserRequest->username;
            $data->password = Hash::make($dataUserRequest->current_password);
            $data->current_password = $dataUserRequest->current_password;
            $data->role = 'user';
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add event success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = User::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Event success');
    }
}
