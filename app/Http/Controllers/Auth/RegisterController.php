<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'org_name' => ['required', 'string', 'max:255'],
            'org_contact_number' => ['required', 'string', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:255'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();

        $organization = \App\Models\Organization::create([
            'org_name' => $data['org_name'],
            'org_email' => $data['email'],
            'org_contact_number' => $data['org_contact_number'],
            'org_status' => 'active',
        ]);

        if ($organization) {

            $company = \App\Models\Company::create([
                'organization_id' => $organization->id,
                'company_name' => $data['org_name'],
                'company_email' => $data['email'],
                'company_contact_number' => $data['org_contact_number'],
                'company_status' => 'active',
            ]);

            if ($company) {
                \App\Models\Branch::create([
                    'company_id' => $company->id,
                    'branch_name' => $data['org_name'] . ' Main Branch',
                    'branch_email' => $data['email'],
                    'branch_contact_number' => $data['org_contact_number'],
                    'branch_status' => 'active',
                ]);

                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'contact_number' => $data['contact_number'] ?? null,
                    'password' => Hash::make($data['password']),
                    'organization_id' => $organization->id,
                    'company_id' => $company->id,
                ]);

                if ($user) {
                    $user->assignRole('super-admin');
                }
            }
            // You can perform additional actions here if needed
            
        }

        DB::commit();
        return $user;
    }
}
