<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\AdminModel;

class DeleteAllAdmins extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'delete:all_admins';
    protected $description = 'Deletes all admin users from the admins table.';

    public function run(array $params)
    {
        $confirmation = CLI::prompt('Are you sure you want to delete all admin users? This action cannot be undone. Type \'yes\' to confirm.', null, 'required');

        if ($confirmation === 'yes') {
            $adminModel = new AdminModel();
            
            // Deletes all records from the 'admins' table
            $adminModel->truncate();

            CLI::write('All admin users have been successfully deleted.', 'green');
        } else {
            CLI::write('Action cancelled.', 'yellow');
        }
    }
}
