<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Jobs\RestrictUser;
use App\Jobs\ActivateUser;

class AdminStaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::latest()->paginate(6);
        return view('admin.staff.admin_staffs', compact('staffs'));
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.show', compact('staff'));
    }

    public function changeStaffStatus(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $input = $request->except(['_token', '_method']);

        if ($input['is_approved'] == null) {
            alert()->warning('Invalid!', 'Please select valid staff status');
            return redirect()->route('admin.staff.show', $staff->id);
        }

        $staff->update($input);

        if ($staff->is_approved == 1) {
            ActivateUser::dispatch($staff)->onQueue('activate_user');
            alert()->success('Staff Approved!', 'staff has been approved successfully');
        } else {
            RestrictUser::dispatch($staff)->onQueue('restrict_user');
            alert()->warning('Staff Unapproved!', 'The staff has been unapproved successfully');
        }
        return redirect()->route('admin.staff.show', $staff->id);
    }

    public function unapprovedStaff()
    {
        $unapprovedStaff = Staff::latest()->where('is_approved', 0)->paginate(6);
        return view('admin.staff.unapproved_staff', compact('unapprovedStaff'));
    }
    
    public function staffSearch(Request $request)
    {
        $staffs = Staff::all();
        $query =  $request->get('staff_search');
        $staff = Staff::where('firstname', 'LIKE', '%'.$query.'%')->orWhere('lastname', 'LIKE', '%'.$query.'%')->Where('is_approved', 1)->get();
        if ($query != '') {
            if (count($staff) > 0) {
                return view('admin.staff.staff_search', compact('staff'))->withDetails($staff)->withQuery($query);
            } else {
                return view('admin.staff.staff_search', compact('staff'))->withMessage('No staff found!');
            }
        } else {
            return view('admin.staff.staff_search', compact('staff'))->withMessage('No staff found!');
        }
    }
}