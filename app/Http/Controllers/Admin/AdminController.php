<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toast;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Global\ChangePasswordRequest;
use App\Http\Requests\Admin\UpdateAdminProfileRequest;

class AdminController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function dashboard()
    {
        return view('admin.pages.dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.pages.profile.index', compact('user'));
    }

    public function updateProfile(UpdateAdminProfileRequest $request)
    {
        $data = $request->validated();
        $userResponse = $this->userService->updateUser(auth()->user()->id, $data);

        return redirect(route('admin.profile'))->with($userResponse->success ? Toast::success($userResponse->message) : Toast::error($userResponse->message));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->validated();
        $userResponse = $this->userService->updateUserPassword(auth()->user()->id, $data);

        return redirect(route('admin.profile'))->with($userResponse->success ? Toast::success($userResponse->message) : Toast::error($userResponse->message));
    }
}
