<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\Toast;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Global\ChangePasswordRequest;
use App\Http\Requests\Vendor\UpdateVendorProfileRequest;

class VendorController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function dashboard()
    {
        return view('vendor.pages.dashboard.index');
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
        return view('vendor.pages.profile.index', compact('user'));
    }

    public function updateProfile(UpdateVendorProfileRequest $request)
    {
        $data = $request->validated();
        $userResponse = $this->userService->updateUser(auth()->user()->id, $data);

        return redirect(route('vendor.profile'))->with($userResponse->success ? Toast::success($userResponse->message) : Toast::error($userResponse->message));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->validated();
        $userResponse = $this->userService->updateUserPassword(auth()->user()->id, $data);

        return redirect(route('vendor.profile'))->with($userResponse->success ? Toast::success($userResponse->message) : Toast::error($userResponse->message));
    }
}
