<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Livewire\TicketTransaction;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\TicketTransaction as ModelsTicketTransaction;
use App\Models\TicketTransactionDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'owners'
        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'kasir bar'
        ]);
        Role::create([
            'name' => 'kasir tiket'
        ]);
        Role::create([
            'name' => 'kasir loket'
        ]);
        User::create([
            'name' => 'Wayan Tinggal',
            'username' => 'owner',
            'role_id' => 1,
            'password' => bcrypt('owner')
        ]);
        User::create([
            'name' => 'Arie Cristian',
            'username' => 'admin',
            'role_id' => 2,
            'password' => bcrypt('admin')
        ]);
        User::create([
            'name' => 'Arie Cristian',
            'username' => 'bar',
            'role_id' => 3,
            'password' => bcrypt('bar')
        ]);
        User::create([
            'name' => 'Arie Cristian',
            'username' => 'tiket',
            'role_id' => 4,
            'password' => bcrypt('tiket')
        ]);
        User::create([
            'name' => 'Arie Cristian',
            'username' => 'loket',
            'role_id' => 5,
            'password' => bcrypt('loket')
        ]);

        Ticket::create([
            'name' => 'International Tourist Ticket' ,
            'price' => 100000
        ]);

        Ticket::create([
            'name' => 'Tour Package Ticket' ,
            'price' => 60000
        ]);

        Ticket::create([
            'name' => 'Local Tourist Ticket' ,
            'price' => 50000
        ]);

        ModelsTicketTransaction::create([
            'user_id' => 4,
            'customer' => 'Ni Kadek Suari',
            'total' => 350000
        ]);

        TicketTransactionDetail::create([
            'ticket_id' => 1 ,
            'ticket_transaction_id' => 1 ,
            'qty' => 3 ,
            'price' => 100000,
            'total' => 300000
        ]);

        TicketTransactionDetail::create([
            'ticket_id' => 2 ,
            'ticket_transaction_id' => 1 ,
            'qty' => 1 ,
            'price' => 50000,
            'total' => 50000
        ]);

    }
}
