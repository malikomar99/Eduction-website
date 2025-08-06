<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserCoursePurchase;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('users.index', compact('users'));
    }
    public function show(Request $request, $id)
    {
        $user = User::
            filterUser($request->only(['name', 'category', 'course', 'date']))
            ->with('subscriptions', 'subscriptions.file', 'subscriptions.file.course', 'subscriptions.file.course.category')
            ->find($id);
        return view('users.show', compact('user'));
    }

    // public function suggestions(Request $request, $id)
    // {
       

    //     $filters = $request->only(['name', 'course', 'category', 'daterange']);
    //     $activeInput = $request->input('activeInput'); // this is sent from JS

    //   return $user = User::
    //         filterUser($request->only(['name', 'category', 'course', 'date']))
    //         ->with('subscriptions', 'subscriptions.file', 'subscriptions.file.course', 'subscriptions.file.course.category')
    //         ->find($id);

    //     $suggestions = [];

    //     foreach ($user->subscriptions as $sub) {
    //         switch ($activeInput) {
    //             case 'name':
    //                 $suggestions[] = $sub->user->name ?? '';
    //                 break;

    //             case 'course':
    //                 $suggestions[] = $sub->file->course->title ?? '';
    //                 break;

    //             case 'category':
    //                 $suggestions[] = $sub->file->course->category->name ?? '';
    //                 break;

    //             default:
    //                 break;
    //         }
    //     }

    //     return response()->json([
    //         'html' => view('subscriptions.partials.subscriptionList', compact('user'))->render(),
    //         'suggestions' => array_values(array_unique(array_filter($suggestions)))
    //     ]);
    // }
}
