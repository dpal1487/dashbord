<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Survey;
use Hash;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    /*========= Start Login =========-*/
    public function login()
    {
        return view('backend/login');
    }

    public function makeLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if (Auth::attempt($data)) {
            return redirect('dashboard');
        } else {
            return back()->withErrors(['message' => 'Wrong Credentails. Please Use Correct Email Or password !']);
        }
    }
    /*========= End Login =========-*/


    /*========= Start Dashboard =========-*/
    public function dashboard(Request $request)
    {
        $surveys = '';
        $pid = $request->pid;
        $q = $request->q;
        $status = $request->status;
        if (!empty($pid) && !empty($status)) {

            $surveys = Survey::where('user_id', 'like', '%' . $q . '%')->where('project_id', 'like', '%' . $pid . '%')->where('status', $status)->orderBy('id', 'desc')->distinct('project_id')->paginate(20);
        } else {
            $surveys = Survey::orderBy('id', 'desc')->distinct('project_id')->paginate(20);
        }
        return view('backend.dashboard', compact('surveys'));
    }
    /*========= End Dashboard =========-*/


    /*========= Start Profile =========-*/
    public function profile()
    {
        $admin = User::where('id', Auth::user()->id)->first();
        return view('backend.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if (User::where('id', Auth::user()->id)->update(['name' => $request->username, 'email' => $request->email])) {
                return redirect()->back()->with('message', 'Thank you. Your profile changed successfully!');
            } else {
                return redirect()->back()->with('message', 'Ops something went wrong!');
            }
        }
    }
    /*========= End Profile =========-*/


    /*========= Start Password =========-*/
    public function changePassword()
    {
        return view('backend.change-password');
    }
    public function passwordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:4',
            'c_password' => 'required|min:4|same:password'
        ]);
        if ($validator->fails()) {
            return back()->withErrors(['message' => 'Password and Confirm password not match!']);
        } else {
            if (User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->get('password'))])) {
                return redirect()->back()->with('message', 'Thank you. Your password changed successfully!');
            } else {
                return redirect()->back()->with('message', 'Thank you. Your password changed successfully!');
            }
        }
    }
    /*========= End Password =========-*/


    /*========= Start Logout=========-*/
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin');
    }
    /*========= End Logout =========-*/
}
