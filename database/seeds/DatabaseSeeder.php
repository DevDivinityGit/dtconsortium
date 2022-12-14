<?php

use Illuminate\Database\Seeder;
use App\User;

use App\Plan;
use App\Task;
use App\Role;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $raw = DB::raw("ALTER TABLE users DROP COLUMN stripe_id");
        DB::statement($raw);

        $raw = DB::raw("ALTER TABLE users DROP COLUMN card_brand");
        DB::statement($raw);


        $raw = DB::raw("ALTER TABLE users DROP COLUMN trial_ends_at");
        DB::statement($raw);

        $raw = DB::raw("ALTER TABLE users DROP COLUMN card_last_four");
        DB::statement($raw);








        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);


        Plan::create([
           'name' => 'VIP0',
           'description' => 'the ordinary user',
           'price' => 0.00,
           'limit' => 3,
            'task_price' => 1.00,
        ]);


        Plan::create([
            'name' => 'VIP1',
            'description' => 'the vip1',
            'price' => 150.00,
            'limit' => 5,
            'task_price' => 1.00,
        ]);


        Plan::create([
            'name' => 'VIP2',
            'description' => 'the vip 2',
            'price' => 400.00,
            'limit' => 8,
            'task_price' => 1.8,
        ]);




        Plan::create([
            'name' => 'VIP3',
            'description' => 'the vip 2',
            'price' => 1300.00,
            'limit' => 17,
            'task_price' => 2.8,
        ]);








        Plan::create([
            'name' => 'VIP4',
            'description' => 'the vip 2',
            'price' => 2500.00,
            'limit' => 25,
            'task_price' => 3.5,
        ]);




        Plan::create([
            'name' => 'VIP5',
            'description' => 'the vip 2',
            'price' => 5000.00,
            'limit' => 45,
            'task_price' => 4.2,
        ]);






        Plan::create([
            'name' => 'VIP6',
            'description' => 'the vip 2',
            'price' => 10000.00,
            'limit' => 65,
            'task_price' => 5.2,
        ]);





        Plan::create([
            'name' => 'VIP7',
            'description' => 'the vip 2',
            'price' => 20000.00,
            'limit' => 110,
            'task_price' => 6.4,
        ]);















        Category::create(['name' => 'Youtube']);
        Category::create(['name' => 'Facebook']);
        Category::create(['name' => 'Tiktok']);


        $link = "http://127.0.0.1:8000";

        Task::create(['description' => 'the description', 'name' => 'task one',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task two',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);




                Task::create(['description' => 'the description', 'name' => 'task three',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task four',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task five',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task six',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task seven',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create([ 'description' => 'the description', 'name' => 'task eight',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task nine',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task ten',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task eleven',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task twelve',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 13',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 14',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 15',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 16',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 17',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 18',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 19',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 20',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);















        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'invitation_code' => $this->generateRandomString(),
            'invitation_code_verify' => '111',
            'number' => rand(100, 1000),

        ]);



        User::create([
            'current_balance' => 10000,
            'name' => 'Hassnain',
            'email' => 'hass@gmail.com',
            'password' => bcrypt('ffffff'),
            'invitation_code' => $this->generateRandomString(),
               'invitation_code_verify' => '111',
            'number' => rand(100, 1000),

        ]);



        User::create([
            'current_balance' => 10000,
            'name' => 'Osman',
            'email' => 'osmangmail.com',
            'password' => bcrypt('ffffff'),
            'invitation_code' => $this->generateRandomString(),
               'invitation_code_verify' => '111',
            'number' => rand(100, 1000),

        ]);




        User::create([
            'current_balance' => 10000,
            'name' => 'Kiran',
            'email' => 'kiran@gmail.com',
            'password' => bcrypt('ffffff'),
            'invitation_code' => $this->generateRandomString(),
               'invitation_code_verify' => '111',
            'number' => rand(100, 1000),

        ]);







        User::create([
            'current_balance' => 10000,
            'name' => 'Eurtagul',
            'email' => 'eur@gmail.com',
            'password' => bcrypt('ffffff'),
            'invitation_code' => $this->generateRandomString(),
               'invitation_code_verify' => '111',
            'number' => rand(100, 1000),

        ]);









//        USDT ADDRESS

        \App\Address::create([
            'image' => 'uploads/transaction_images/avatar.jpg',
            'address' => 'TUaobxWYK7mS1Ur2sqW46vUwmRM26iwevb',
        ]);



             \App\Purpose::create([
                 'name' => 'withdrawal',
             ])->create([

                 'name' => 'balance recharge',


             ]);


        factory('App\Transaction', 20)->create();


//         $this->call(UserTableSeeder::class);
//         $this->call(RoleTableSeeder::class);
//         $this->call(userTableSeeder::class);
//         $this->call(CategoryTableSeeder::class);
//         $this->call(ProductTableSeeder::class);
    }

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


}
