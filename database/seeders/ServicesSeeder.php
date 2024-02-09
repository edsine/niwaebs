<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks during seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Seed services
        $services = [
            ['name' => 'use of right of ways', 'status' => 1],
            ['name' => 'dredging', 'status' => 1],
            ['name' => 'reclamation', 'status' => 1],
            ['name' => 'canalization/dredging of slots', 'status' => 1],
            ['name' => 'hydroelectric power dams and power generating station/plants on water and its right of ways', 'status' => 1],
            ['name' => 'advertising within right of ways', 'status' => 1],
            ['name' => 'pipeline layings/crossing', 'status' => 1],
            ['name' => 'utility lines', 'status' => 1],
            ['name' => 'survey under water engineering works and removal of wrecks', 'status' => 1],
            ['name' => 'hydrological information', 'status' => 1],
            ['name' => 'charts and maps', 'status' => 1],
            ['name' => 'wharfage and berthing', 'status' => 1],
            ['name' => 'warehouse', 'status' => 1],
            ['name' => 'examination fees for proficiency', 'status' => 1],
            ['name' => 'craft and vessels', 'status' => 1],
            ['name' => 'vessel recertification fees', 'status' => 1],
            ['name' => 'utility within dockyards/river ports', 'status' => 1],
            ['name' => 'river guide pilotage', 'status' => 1],
            ['name' => 'Passage and tolls', 'status' => 1],
            ['name' => 'Permit fees for river crafts per annum', 'status' => 1],
            ['name' => 'Slipway and dockyards services', 'status' => 1],
            ['name' => 'Ferry services', 'status' => 1],
            ['name' => 'Ferry vehicles', 'status' => 1],
            ['name' => 'Equipments and property leasing', 'status' => 1],
            ['name' => 'Landed properties', 'status' => 1],
            ['name' => 'Design and construction of inland craft', 'status' => 1],
            ['name' => 'testing123', 'status' => 1],
            ['name' => 'demo data', 'status' => 1],
        ];
        

        foreach ($services as $service) {
            Service::create($service);
        }

        // Seed sub-services
        $subServices = [
            ['name' => 'pleasure(A)', 'status' => 1, 'service_id' => 1],
            ['name' => 'domestic(B)', 'status' => 1, 'service_id' => 1],
            ['name' => 'community(C)', 'status' => 1, 'service_id' => 1],
            ['name' => 'commercial services(D)', 'status' => 1, 'service_id' => 1],
            // ... add other sub-services as needed
        ];

        foreach ($subServices as $subService) {
            SubService::create($subService);
        }

        // Re-enable foreign key checks after seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
