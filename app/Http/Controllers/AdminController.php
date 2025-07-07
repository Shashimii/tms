<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
class AdminController extends Controller
{
    public function DashboardIndex(Request $request) {
        $usersQuery = User::search($request);

        $admins = UserResource::collection(User::where('role', 2)->get());
        $coordinators = UserResource::collection(User::where('role', 1)->get());
        $officers = UserResource::collection(User::where('role', 0)->get());
        $users = UserResource::collection($usersQuery->paginate(10));

        return Inertia::render('Dashboard', [
            'search' => $request->search ?? '',
            'role' => $request->role ?? '',
            'admins' => $admins,
            'coordinators' => $coordinators,
            'officers' => $officers,
            'users' => $users,
        ]);
    } 
}
