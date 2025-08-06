<?php

namespace App\Http\Controllers;

use App\Models\UserCoursePurchase;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserCoursePurchasesController extends Controller
{
    //

    public function index(Request $request)
    {
        

        if ($request->ajax()) {
          
            $course_purchases = UserCoursePurchase::with('course','user')->get();
            return DataTables::of($course_purchases)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    $profile_image = $row->user->profile_picture ? asset($row->user->profile_picture) : '/images/users/user-22.jpg';
                    return '<img src="'.$profile_image.'" class="avatar avatar-sm rounded-circle me-3">'.$row->user->title.' '.$row->user->name ?? 'N/A';
                })
                ->addColumn('course', function ($row) {
                    return $row->course->title ?? 'N/A';
                })
                ->addColumn('purchase_date', function ($row) {
                   return humanize_date($row->purchase_date);
                })
                ->addColumn('expiry_date', function ($row) {
                   return humanize_date($row->expiry_date);
                })
                ->addColumn('payment_method', function ($row) {
                    $formatBadges = [
                        'alfalah' => '<span class="badge bg-danger-subtle text-danger fw-semibold rounded-pill">Alfalah</span>',
                        'jazzcash' => '<span class="badge bg-primary-subtle text-primary fw-semibold rounded-pill">Jazz Cash</span>',
                    ];
                    $paymentMethodType = $formatBadges[$row->payment_method] ?? '<span class="badge bg-success-subtle text-success fw-semibold rounded-pill">' . $row->payment_method . '</span>';
                    return $paymentMethodType;
                })
                ->addColumn('payment_proof', function ($row) {

                    $payment_proof = $row->payment_slip ? asset( $row->payment_slip) : '/images/gallery/12.png';
                    $default_proof = '/images/gallery/6.jpg';
                   return 
                            "
                        <div class='gallery-container gallery-grid rounded'>
                        <div class=' gallery-image p-0'>
                            <a href='$payment_proof' class='image-popup'>
                                <img src='$payment_proof' class=' avatar avatar-md rounded-circle me-3' alt='gallery-image'>
                            </a>
                        </div>
                    </div>";

                })
                ->addColumn('status', function ($row) {
                    $statusBadges = [
                        'pending' => '<span class="badge bg-warning-subtle text-warning fw-semibold">Pending</span>',
                        'approved' => '<span class="badge bg-success-subtle text-success fw-semibold">Approved</span>',
                        'denied' => '<span class="badge bg-danger-subtle text-danger fw-semibold">Denied</span>',
                    ];
                    $status = $statusBadges[$row->status] ?? '<span class="badge bg-danger-subtle text-danger fw-semibold">' . $row->status . '</span>';
                    return $status;
                })
                ->addColumn('status_change', function ($row) {
                    $url = route('course.purchase.status', $row->id);

                    // Add the conditional class logic
                $denied_class = $row->status == 'denied' ? 'is-invalid text-danger' : '';
                $approved_class = $row->status == 'approved' ? 'text-success border-success' : '';
                $pending_class = $row->status == 'pending' ? 'text-warning border-warning' : '';

                $status_class = $denied_class . ' ' . $approved_class . ' ' . $pending_class;

                    return "<form action='$url' method='POST'>" . csrf_field() . "
                            <select name='status' class='form-select $status_class' onchange='this.form.submit()'>
                                <option value='pending' " . ($row->status == 'pending' ? 'selected' : '') . ">Pending</option>
                                <option value='approved' " . ($row->status == 'approved' ? 'selected' : '') . ">Approved</option>
                                <option value='denied' " . ($row->status == 'denied' ? 'selected' : '') . ">Denied</option>
                            </select>
                            </form>";
                })
                // ->addColumn('actions', function ($row) {
                //     $showUrl = route('courseFiles.show', $row->id);
                //     $editUrl = route('courseFiles.edit', $row->id);
                //     $deleteUrl = route('courseFiles.destroy', $row->id);
                //     $csrfToken = csrf_token();
                //     return '
                //         <td class="sort-quantity d-flex gap-2">
                //             <a href="' . $showUrl . '" class="btn btn-icon btn-sm bg-primary-subtle text-primary me-1" aria-label="View">
                //                 <i class="mdi mdi-eye"></i>
                //             </a>
                //             <a href="' . $editUrl . '" class="btn btn-icon btn-sm bg-success-subtle text-success me-1" aria-label="Edit">
                //                 <i class="mdi mdi-pencil"></i>
                //             </a>
                            
                          
                //             <form id="delete-file-form" action="'. $deleteUrl .  '" method="POST" style="display:inline-block;">
                //                              <input type="hidden" name="_token" value="' . $csrfToken . '">
                //                              <input type="hidden" name="_method" value="DELETE">
                //                             <button type="button" class="btn btn-icon btn-sm bg-danger-subtle text-danger" onclick="confirmDeleteFile()">
                //                                 <i class="mdi mdi-delete"></i>
                //                             </button>
                //             </form>
                           
                //         </td>
                //     ';
                // })
                ->rawColumns(['user','course','purchase_date', 'expiry_date', 'payment_method','payment_proof', 'status','status_change'])
                ->make(true);
        }


        return view('course_purchases.index');
    }



    public function changeStatus(Request $request)
    {
        $course_purchase = UserCoursePurchase::findOrFail($request->id);
        $course_purchase->status = $request->status; // Toggle the privacy status
        $course_purchase->update();
        return to_route('course.purchase.index')->with('success', 'Status Updated Successfully.');
    }
}
