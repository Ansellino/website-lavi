<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RemoveSuperAdmin extends Command
{
    protected $signature = 'remove:superadmin
                        {email? : The email of the user}
                        {--id= : The ID of the user}';

    protected $description = 'Removes super admin privileges from a user (revokes role and unsets is_admin).';

    public function handle()
    {
        $email = $this->argument('email');
        $userId = $this->option('id');

        if (!$email && !$userId) {
            $this->error('You must provide either an email or a user ID.');
            return 1;
        }

         if ($email && $userId) {
            $this->error('You must provide either an email or a user ID. Not Both');
            return 1;
        }

         if ($email) {
            $validator = Validator::make(['email' => $email], [
                'email' => 'required|email|exists:users,email', // Validate: required, email, exists in users table
            ]);

            if ($validator->fails()) {
                $this->error($validator->errors()->first()); // Display validation errors
                return 1;
            }
             $user = User::where('email', $email)->first();
        }

        if ($userId) {
             $validator = Validator::make(['id' => $userId], [
                'id' => 'required|integer|exists:users,id', // Validate: required, email, exists in users table
            ]);

           if ($validator->fails()) {
                $this->error($validator->errors()->first());
                return 1;
           }
           $user = User::find($userId);
       }

        if (!$user) {
            $this->error('User not found.');
            return 1;
        }

        DB::beginTransaction();

        try {
            // Revoke the super_admin role (if it exists)
            $role = Role::where('name', 'super_admin')->first(); // Find the role
            if ($role) {
                $user->removeRole($role); // Use removeRole()
            }

            // Set is_admin to false
            $user->is_admin = false;
            $user->save();

            DB::commit();

            $this->info("Super admin privileges removed from user {$user->email}.");
            return 0;

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('An error occurred: ' . $e->getMessage());
            return 1;
        }
    }
}
