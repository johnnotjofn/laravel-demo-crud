<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Imports\UsersImport;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    use TruncateTable;
    use DisableForeignKeys;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = User::query()->get();

        return new JsonResponse([
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        return new JsonResponse([
            'data' => 'posted'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return
     */
    public function show(\App\Models\User $user)
    {
        return view('/users/demo');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param \App\Models\User $user
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, \App\Models\User $user): JsonResponse
    {
        return new JsonResponse([
            'data' => 'updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return JsonResponse
     */
    public function destroy(\App\Models\User $user): JsonResponse
    {
        return new JsonResponse([
            'data' => 'deleted'
        ]);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $import = new UsersImport;

        /**
         * If we don't use Importable trait, we should import as shown below.
         */
//        Excel::import(new UsersImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);

        /**
         * Otherwise, we can import as blow if we use Importable trait
         */
        $import->import($file, null, \Maatwebsite\Excel\Excel::XLSX);

        if ($import->failures()->isNotEmpty()) {
            return redirect('/users')->with('fail', $import->failures());
        }
        return redirect('/users')->with('success', 'All good!');
    }
}
