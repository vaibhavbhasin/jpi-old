<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AddRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Default Roles And Permission';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $roles = [
            'employee',
            'admin'
        ];

        foreach($roles as $role){
            Role::firstOrCreate(['name'=> $role]);
        }

        $this->info('The role has been added successfully!');
    }
}
