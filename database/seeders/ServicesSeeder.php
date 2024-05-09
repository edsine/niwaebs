<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\SubService;
use App\Models\ApplicationFormFee;
use App\Models\DocumentUpload;
use App\Models\InspectionFee;
use App\Models\ProcessingFee;
use App\Models\ProcessingType;
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
            "Use of Right of Ways",
            "Dredging",
            "Reclamation",
            "Canalization/Dredging of Slots",
            "Hydroelectric Power Dams and Power Generating Station/Plants on Water and Its Right of Ways",
            "Advertising Within Right of Ways",
            "Pipeline Layings/Crossing",
            "Utility Lines",
            "Survey Under Water Engineering Works and Removal of Wrecks",
            "Hydrological Information",
            "Charts and Maps",
            "Wharfage and Berthing",
            "Warehouse",
            "Examination Fees for Proficiency",
            "Craft and Vessels",
            "Vessel Recertification Fees",
            "Utility Within Dockyards/River Ports",
            "River Guide Pilotage",
            "Passage and Tolls",
            "Permit Fees for River Crafts Per Anum",
            "Slipway and Dockyards Services",
            "Ferry Services",
            "Ferry Vehicles",
            "Equipments and Property Leasing",
            "Landed Properties",
        ];

        // Iterate through each branch id
        Service::truncate();
        for ($i = 1; $i <= 12; $i++) {
            // Iterate through each service
            foreach ($services as $serviceName) {
                Service::create([
                    'name' => $serviceName,
                    'branch_id' => $i, // Assign the current branch id
                    'status' => 1,
                ]);
            }
        }

        $servicesIds = [
            's_id' => [1, 26, 51, 76, 101, 126, 151, 176, 201, 226, 251, 276],
            'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        ];

        $subServices = [
            "Pleasure(A)",
            "Domestic(B)",
            "Community(C)",
            "Commercial(D)"
        ];

        
        // Assuming SubService model is used
        SubService::truncate();
foreach ($servicesIds['s_id'] as $key => $serviceId) {
    foreach ($subServices as $subServiceName) {
        $branchIndex = $key % count($servicesIds['b_id']); // Calculate branch index
        $branchId = $servicesIds['b_id'][$branchIndex]; // Get branch id based on index

        SubService::create([
            'name' => $subServiceName,
            'service_id' => $serviceId,
            'branch_id' => $branchId,
            'status' => 1,
        ]);
    }
}

//app fees
    $all_services = Service::get();
    ApplicationFormFee::truncate();
    foreach ($all_services as $key => $service) {
        // Assuming each service has a 'branch_id' property
        $branchIndex = $key % count($all_services); // Calculate branch index
        $branchId = $all_services[$branchIndex]->branch_id; // Get branch id based on index
    
        ApplicationFormFee::create([
            'amount' => "25000",
            'service_id' => $service->id,
            'branch_id' => $branchId,
        ]);
    }

    // document upload
    $documentsTypes = [
        "type1" => ["Application Form", "Letter of Intent", "Pre Survey Drawing", "Post Survey Drawing"],
        "type2" => ["Title Document or Proof of Ownership",
        "CAC Certificate",
        "EIA Report"],
        "type3" => ["150000",
        "300000",
        "750000"],
        "type4" => ["150000",
        "225000",
        "300000",
        "400000",
        "500000",
        "150000",
        "250000",
        "400000",
        "32500",
        "300000",
        "225000"],
        "b_id" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
    ];
    
    
    // Add 'b_id' property to each service
    $b_ids2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    
    // Truncate ProcessingFee table
    DocumentUpload::truncate();
    
    foreach ($b_ids2 as $branch_id) {
    foreach ($all_services as $service) {
        // Assign branch ID to the service
        $service->branch_id = $branch_id;
    
        // Determine the processing type array based on service ID
        switch ($service->id) {
            case 2:
                $documentsTypeArray = $documentsTypes['type2'];
                break;
           /*  case 15:
                $documentsTypeArray = $documentsTypes['type3'];
                break;
            case 21:
                $documentsTypeArray = $documentsTypes['type4'];
                break; */
            default:
                $documentsTypeArray = $documentsTypes['type1'];
                break;
        }
    
       
        // Insert new processing fee records
           
        foreach ($documentsTypeArray as $key11 => $processingType) {
            $branchIndex11 = $key11 % count($documentsTypes['b_id']); // Calculate branch index
            $branchId11 = $documentsTypes['b_id'][$branchIndex11];

            DocumentUpload::create([
                    'name' => $processingType,
                    'service_id' => $service->id,
                    'branch_id' => $branchId11,
                ]);
    
                
            }
            
    }
    
    
    
    }
    
    // processing fees
    $processingTypes = [
        "type1" => ["Manual", "Mechanical", "N/A"],
        "type2" => ["Pleasure(A)",
        "Domestic(B)",
        "Community(C)",
        "Commercial(D)"],
        "type3" => ["Registration of crafts and vessel and survey fees river crafts",
        "Vessel less than 500T",
        "Vessel more than 500T"],
        "type4" => ["Slipways facilities flat",
        "V-shaped keel bottom craft",
        "Crane charges for mobile and stationary crane",
        "Plant and machinery charges",
        "Labour charges",
        "Material charges",
        "Hire of craft",
        "Boats",
        "Authority facilities",
        "Pollution levy",
        "Consultancy services"],
        'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
    ];

   
    // Add 'b_id' property to each service
    $b_ids = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
ProcessingType::truncate();
foreach ($b_ids as $branch_id) {
    foreach ($all_services as $service) {
        // Assign branch ID to the service
        $service->branch_id = $branch_id;

        // Determine the processing type array based on service ID
        switch ($service->id) {
            case 1:
                $processingTypeArray = $processingTypes['type2'];
                break;
            case 15:
                $processingTypeArray = $processingTypes['type3'];
                break;
            case 21:
                $processingTypeArray = $processingTypes['type4'];
                break;
            default:
                $processingTypeArray = $processingTypes['type1'];
                break;
        }

        // Iterate over processing types and create records
        foreach ($processingTypeArray as $processingType) {
            ProcessingType::create([
                'name' => $processingType,
                'service_id' => $service->id,
                'branch_id' => $branch_id,
            ]);
        }
    }
}

// processing fees
$processingTypes1 = [
    "type1" => ["7500", "150000", "7500"],
    "type2" => ["10000",
    "30000",
    "20000",
    "150000"],
    "type3" => ["150000",
    "300000",
    "750000"],
    "type4" => ["150000",
    "225000",
    "300000",
    "400000",
    "500000",
    "150000",
    "250000",
    "400000",
    "32500",
    "300000",
    "225000"],
    "b_id" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
];


// Add 'b_id' property to each service
$b_ids1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

// Truncate ProcessingFee table
ProcessingFee::truncate();

foreach ($b_ids1 as $branch_id) {
foreach ($all_services as $service) {
    // Assign branch ID to the service
    $service->branch_id = $branch_id;

    // Determine the processing type array based on service ID
    switch ($service->id) {
        case 1:
            $processingTypeArray = $processingTypes1['type2'];
            break;
        case 15:
            $processingTypeArray = $processingTypes1['type3'];
            break;
        case 21:
            $processingTypeArray = $processingTypes1['type4'];
            break;
        default:
            $processingTypeArray = $processingTypes1['type1'];
            break;
    }

    // Iterate over processing types and create records
    // Fetch existing processing types associated with the service ID
    $existingProcessingTypes = ProcessingType::where('branch_id', $branch_id)->where('service_id', $service->id)->get();

    

    
    // Insert new processing fee records
    foreach ($existingProcessingTypes as $existingProcessingType) {
       
    foreach ($processingTypeArray as $key11 => $processingType) {
        
            ProcessingFee::create([
                'amount' => $processingType,
                'processing_type_id' => $existingProcessingType->id,
                'service_id' => $service->id,
            ]);

            
        }

    }
    
    foreach ($existingProcessingTypes as $key11 => $existingProcessingType1) {
        $branchIndex11 = $key11 % count($processingTypes1['b_id']); // Calculate branch index
        $branchId11 = $processingTypes1['b_id'][$branchIndex11];
        $processing_fee = ProcessingFee::where('processing_type_id', $existingProcessingType1->id)->get();
            $processing_fee->each(function ($fee) use ($branchId11) {
                $fee->branch_id = $branchId11;
                $fee->save();
            });
        }

        //insert new inspection fee records
        InspectionFee::truncate();
        foreach ($existingProcessingTypes as $existingProcessingType) {
       
            foreach ($processingTypeArray as $key11 => $processingType) {
                
                    InspectionFee::create([
                        'amount' => $processingType,
                        'processing_type_id' => $existingProcessingType->id,
                        'service_id' => $service->id,
                    ]);
        
                    
                }
        
            }
            
            foreach ($existingProcessingTypes as $key11 => $existingProcessingType1) {
                $branchIndex11 = $key11 % count($processingTypes1['b_id']); // Calculate branch index
                $branchId11 = $processingTypes1['b_id'][$branchIndex11];
                $processing_fee = InspectionFee::where('processing_type_id', $existingProcessingType1->id)->get();
                    $processing_fee->each(function ($fee) use ($branchId11) {
                        $fee->branch_id = $branchId11;
                        $fee->save();
                    });
                }
}



}

        // Re-enable foreign key checks after seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
