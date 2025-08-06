<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\UserCoursePurchase;

class UserSubscriptionController extends Controller
{
    public function index(Request $request)
    {

        $subscriptions = UserCoursePurchase::with('course')->paginate(15);
        return view('subscriptions.index', compact('subscriptions'));
    }
    public function show($id)
    {
        $subscription = UserCoursePurchase::with('user', 'file', 'file.course', 'file.course.category')->findOrFail($id);
        return view('subscriptions.show', compact('subscription'));
    }
    public function changeStatus(Request $request, $id)
    {
        // return $request;
        $request->validate(['status' => 'required|in:pending,denied,approved']);
        $subscription = UserCoursePurchase::findOrfail($id);
        $subscription->purchase_date = now();
        if ($request->status == 'approved') {

            $subscription->expiry_date = now()->addDays($subscription->file->course->validity_days ?? 180);
        }
        $subscription->status = $request->status;

        $subscription->save();
        return back()->with('success', 'status changed');
    }

    public function generatePDF($type, $id)

    {
        // return $subscription;

        $subscription = UserCoursePurchase::with('user', 'file', 'file.course', 'file.course.category')->findOrFail($id);
        $name = $subscription->file->course->category->name . '-' . $subscription->file->course->title;
        if ($type == 'pdf') {
            $data = [
                'subscription' => $subscription,
            ];
            $pdf = PDF::loadView('subscriptions.generatePDF', $data);

            return $pdf->download($name . '.pdf');
        }

        return view('subscriptions.generatePDF', compact('subscription', 'type'));
    }

    // public function suggestions(Request $request)
    // {
    //     $subscriptions = UserCoursePurchase::filter($request->only(['name', 'category', 'course', 'daterange']))
    //     ->with('user', 'file', 'file.course', 'file.course.category')
    //         ->limit(5)
    //         ->get();
    //     // return view('subscriptions.subscriptionList', compact('subscriptions'))->render();
    //     return response()->json($subscriptions);
    // }

    public function suggestions(Request $request)
    {
        $filters = $request->only(['name', 'course', 'category', 'daterange']);
        $activeInput = $request->input('activeInput'); // this is sent from JS

        $subscriptions = UserCoursePurchase::with(['user', 'file.course.category'])
            ->filter($filters) // assume you're using scopeFilter or similar
            ->get();

        $suggestions = [];

        foreach ($subscriptions as $sub) {
            switch ($activeInput) {
                case 'name':
                    $suggestions[] = $sub->user->name ?? '';
                    break;

                case 'course':
                    $suggestions[] = $sub->file->course->title ?? '';
                    break;

                case 'category':
                    $suggestions[] = $sub->file->course->category->name ?? '';
                    break;

                default:
                    break;
            }
        }

        return response()->json([
            'html' => view('subscriptions.partials.subscriptionList', compact('subscriptions'))->render(),
            'suggestions' => array_values(array_unique(array_filter($suggestions)))
        ]);
    }
}