<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registeruser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string|email',
            // 'password' => 'required|string|min:6'
        ]);

        try {
            $register = Register::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                // 'password' => Hash::make($request->password)
            ]);

            // if ($register) {
            //     User::create([
            //         'name' => $request->nama,
            //         'email' => $request->email,
            //         'password' => Hash::make('12345678'),
            //         'role' => 'register',
            //         'status' => 'tidak aktif',
            //         'register_id' => $register->id
            //     ]);
            // }

            return response()->json([
                'status' => 'success',
                'message' => 'Register Tersimpan',
                'register' => $register
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'ada kesalahan', 'error' => $e], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register, $id)
    {
        $register = Register::findOrFail($id);
        $register->load('user');
        $response = [
            'message' => 'Detail data',
            'data' => $register
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
