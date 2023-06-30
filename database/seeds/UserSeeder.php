<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'member1@gmail.com',
            'name' =>'member1',
            'phone' =>'0978260211',
            'password' =>bcrypt('member1'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member2@gmail.com',
            'name' =>'member2',
            'phone' =>'0978260211',
            'password' =>bcrypt('member2'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
          User::create([
            'email'=>'member3@gmail.com',
            'name' =>'member3',
            'phone' =>'0978260211',
            'password' =>bcrypt('member3'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
           User::create([
            'email'=>'member4@gmail.com',
            'name' =>'member4',
            'phone' =>'0978260211',
            'password' =>bcrypt('4'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member5@gmail.com',
            'name' =>'member5',
            'phone' =>'0978260211',
            'password' =>bcrypt('member5'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member6@gmail.com',
            'name' =>'member6',
            'phone' =>'0978260211',
            'password' =>bcrypt('member6'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]); 
         User::create([
            'email'=>'member7@gmail.com',
            'name' =>'member7',
            'phone' =>'0978260211',
            'password' =>bcrypt('member7'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]); 
         User::create([
            'email'=>'member8@gmail.com',
            'name' =>'member8',
            'phone' =>'0978260211',
            'password' =>bcrypt('member8'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]); 
        User::create([
            'email'=>'member9@gmail.com',
            'name' =>'member9',
            'phone' =>'0978260211',
            'password' =>bcrypt('member9'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member10@gmail.com',
            'name' =>'member10',
            'phone' =>'0978260211',
            'password' =>bcrypt('member10'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member11@gmail.com',
            'name' =>'member11',
            'phone' =>'0978260211',
            'password' =>bcrypt('member11'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member12@gmail.com',
            'name' =>'member12',
            'phone' =>'0978260211',
            'password' =>bcrypt('member12'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member13@gmail.com',
            'name' =>'member13',
            'phone' =>'0978260211',
            'password' =>bcrypt('member13'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member14@gmail.com',
            'name' =>'member14',
            'phone' =>'0978260211',
            'password' =>bcrypt('member14'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'member15@gmail.com',
            'name' =>'member15',
            'phone' =>'0978260211',
            'password' =>bcrypt('member15'),
            'role' =>'1',
            'is_active' =>'1',
            'logo'=>'',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicefree1@gmail.com',
            'name' =>'Service Free 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicefree1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicefree2@gmail.com',
            'name' =>'Service Free 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicefree2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicefree3@gmail.com',
            'name' =>'Service Free 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicefree3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicefree4@gmail.com',
            'name' =>'Service Free 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicefree4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicefree5@gmail.com',
            'name' =>'Service Free 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicefree5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicegold1@gmail.com',
            'name' =>'Service Gold 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicegold1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'servicegold2@gmail.com',
            'name' =>'Service Gold 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicegold2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicegold3@gmail.com',
            'name' =>'Service Gold 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicegold3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'servicegold4@gmail.com',
            'name' =>'Service Gold 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicegold4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'servicegold5@gmail.com',
            'name' =>'Service Gold 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('servicegold5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'serviceplatinum1@gmail.com',
            'name' =>'Service Platinum 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('serviceplatinum1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'serviceplatinum2@gmail.com',
            'name' =>'Service Platinum 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('serviceplatinum2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
          User::create([
            'email'=>'serviceplatinum3@gmail.com',
            'name' =>'Service Platinum 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('serviceplatinum3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'serviceplatinum4@gmail.com',
            'name' =>'Service Platinum 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('serviceplatinum4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'serviceplatinum5@gmail.com',
            'name' =>'Service Platinum 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('serviceplatinum5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'supplierfree1@gmail.com',
            'name' =>'Supplier Free 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierfree1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'supplierfree2@gmail.com',
            'name' =>'Supplier Free 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierfree2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'supplierfree3@gmail.com',
            'name' =>'Supplier Free 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierfree3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'supplierfree4@gmail.com',
            'name' =>'Supplier Free 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierfree4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'supplierfree5@gmail.com',
            'name' =>'Supplier Free 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierfree5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'suppliergold1@gmail.com',
            'name' =>'Supplier Gold 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('suppliergold1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'suppliergold2@gmail.com',
            'name' =>'Supplier Gold 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('suppliergold2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'suppliergold3@gmail.com',
            'name' =>'Supplier Gold 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('suppliergold3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'suppliergold4@gmail.com',
            'name' =>'Supplier Gold 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('suppliergold4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'suppliergold5@gmail.com',
            'name' =>'Supplier Gold 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('suppliergold5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'supplierplatinum1@gmail.com',
            'name' =>'Supplier Platinum 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierplatinum1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'supplierplatinum2@gmail.com',
            'name' =>'Supplier Platinum 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierplatinum2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
          User::create([
            'email'=>'supplierplatinum3@gmail.com',
            'name' =>'Supplier Platinum 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierplatinum3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
           User::create([
            'email'=>'supplierplatinum4@gmail.com',
            'name' =>'Supplier Platinum 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierplatinum4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'supplierplatinum5@gmail.com',
            'name' =>'Supplier Platinum 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('supplierplatinum5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renofree1@gmail.com',
            'name' =>'Reno Free 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('renofree1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]); 
          User::create([
            'email'=>'renofree2@gmail.com',
            'name' =>'Reno Free 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('renofree2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);  
          User::create([
            'email'=>'renofree3@gmail.com',
            'name' =>'Reno Free 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('renofree3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);  
          User::create([
            'email'=>'renofree4@gmail.com',
            'name' =>'Reno Free 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('renofree4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);  
        User::create([
            'email'=>'renofree5@gmail.com',
            'name' =>'Reno Free 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('renofree5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);     
        User::create([
            'email'=>'renogold1@gmail.com',
            'name' =>'Reno Gold 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('renogold1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'renogold2@gmail.com',
            'name' =>'Reno Gold 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('renogold2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renogold3@gmail.com',
            'name' =>'Reno Gold 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('renogold3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renogold4@gmail.com',
            'name' =>'Reno Gold 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('renogold4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renogold5@gmail.com',
            'name' =>'Reno Gold 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('renogold5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renoplatinum1@gmail.com',
            'name' =>'Reno Platinum 1',
            'phone' =>'0978260211',
            'password' =>bcrypt('renoplatinum1'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renoplatinum2@gmail.com',
            'name' =>'Reno Platinum 2',
            'phone' =>'0978260211',
            'password' =>bcrypt('renoplatinum2'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renoplatinum3@gmail.com',
            'name' =>'Reno Platinum 3',
            'phone' =>'0978260211',
            'password' =>bcrypt('renoplatinum3'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renoplatinum4@gmail.com',
            'name' =>'Reno Platinum 4',
            'phone' =>'0978260211',
            'password' =>bcrypt('renoplatinum4'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'renoplatinum5@gmail.com',
            'name' =>'Reno Platinum 5',
            'phone' =>'0978260211',
            'password' =>bcrypt('renoplatinum5'),
            'role' =>'2',
            'is_active' =>'1',
            'logo'=>'3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'freelancer1@gmail.com',
            'name' =>'freelancer1',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer1'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'freelancer2@gmail.com',
            'name' =>'freelancer2',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer2'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
          User::create([
            'email'=>'freelancer3@gmail.com',
            'name' =>'freelancer3',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer3'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
           User::create([
            'email'=>'freelancer4@gmail.com',
            'name' =>'freelancer4',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer4'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
            User::create([
            'email'=>'freelancer5@gmail.com',
            'name' =>'freelancer5',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer5'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
             User::create([
            'email'=>'freelancer6@gmail.com',
            'name' =>'freelancer6',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer6'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
              User::create([
            'email'=>'freelancer7@gmail.com',
            'name' =>'freelancer7',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer7'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
               User::create([
            'email'=>'freelancer8@gmail.com',
            'name' =>'freelancer8',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer8'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
                User::create([
            'email'=>'freelancer9@gmail.com',
            'name' =>'freelancer9',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer9'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
                 User::create([
            'email'=>'freelancer10@gmail.com',
            'name' =>'freelancer10',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer10'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
                  User::create([
            'email'=>'freelancer11@gmail.com',
            'name' =>'freelancer11',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer11'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
                   User::create([
            'email'=>'freelancer12@gmail.com',
            'name' =>'freelancer12',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer12'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
                    User::create([
            'email'=>'freelancer13@gmail.com',
            'name' =>'freelancer13',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer13'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'freelancer14@gmail.com',
            'name' =>'freelancer14',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer14'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'freelancer15@gmail.com',
            'name' =>'freelancer15',
            'phone' =>'0978260211',
            'password' =>bcrypt('freelancer15'),
            'role' =>'3',
            'is_active' =>'1',
            'logo'=>'freelancer3.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
        User::create([
            'email'=>'superadmin@gmail.com',
            'name' =>'Super Admin',
            'phone' =>'0978260211',
            'password' =>bcrypt('super admin'),
            'role' =>'4',
            'is_active' =>'1',
            'logo'=>'freelancer1.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
         User::create([
            'email'=>'admin@gmail.com',
            'name' =>'Admin',
            'phone' =>'0978260211',
            'password' =>bcrypt('admin'),
            'role' =>'5',
            'is_active' =>'1',
            'logo'=>'freelancer2.png',
            'coin' =>2000,
            'left_coin'=>2000
        ]);
    }
}
