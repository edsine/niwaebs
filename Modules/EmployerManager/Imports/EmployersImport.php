<?php

namespace Modules\EmployerManager\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Notification;
use Modules\EmployerManager\Notifications\EmployerImportedNotification;


class EmployersImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        $skippedFirstRow = false;


        foreach ($rows as $row) {
            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }

            $employerData = [
                'company_name' => $row[0],
                'company_email' => $row[1],
                'company_address' => $row[2],
                'company_rcnumber' => $row[3],
                'cac_reg_year' => $row[4],
                'contact_number' => $row[5],
                'company_localgovt' => $row[6],
                'company_state' => $row[7],
                'status' => $row[8],
                'contact_surname' => $row[9],
                'contact_firstname' => $row[10],
                'contact_middlename' => $row[11],
                'branch_id' => $row[12],
                'user_type' => $row[14],
                'password' => Hash::make('12345678'),
                'user_id' => 1,
            ];

            // Define validation rules
            $rules = [
                'company_email' => 'required|email|unique:employers,company_email',
            ];

            // Define custom error messages
            $messages = [
                'company_email.unique' => 'The email address is already in use.',
            ];

            // Validate data
            $validator = Validator::make($employerData, $rules, $messages);

            if ($validator->fails()) {
                // Validation fails, return error messages
                $errors = $validator->errors()->all();
                // return response()->json(['errors' => $errors], 422); // Return error response
                Flash::error('Email Already Exist');
                return back()->with('error', 'Email Already Exist');
            } else {
                # code...
                Employer::create($employerData);
            }

          
        }
    }
}
