<?php

//Frieght ====================================================
$data_without_hazmat = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];


//Frieght ====================================================
    $data_hazmat_regulated = 
    [   
        'division'=> $division,
        'category'=> $category,
        'paymentType'=> $paymentType,
        'billingAccount'=> $billing_account,
        'note'=> $note,
            'sender'=> [
             'addressLine1'=> $sender_addressLine1,
             'city'=> $sender_city,
             'provinceCode'=> $sender_province,
             'postalCode'=> $sender_postalCode,
             'countryCode'=> $sender_countryCode,
             'customerName'=> $sender_customerName,
             'contact'=>[            
                    'fullName'=> $sender_fullName,
                    'language'=>  'EN',
                    'email'=> $sender_email,
                    'department'=> $sender_department,
                    'telephone'=> $sender_telephone,
                ]
            ],
            'consignee'=> [       
             'addressLine1'=> $consignee_addressLine1,
             'city'=> $consignee_city,
             'provinceCode'=> $consignee_province,
             'postalCode'=> $consignee_postalCode,
             'countryCode'=> $consignee_countryCode,
             'customerName'=> $consignee_customerName,
             'contact'=> [                                            
                 'fullName'=> $consignee_fullName,
                 'language'=>  'EN',
                 'email'=> $consignee_email,
                 'department'=> $consignee_department,
                 'telephone'=> $consignee_telephone,
                ]
            ],
            'unitOfMeasurement'=> $unitOfMeasurement,         
            'parcels'=> [
                [
                   
                    'parcelType'=> $parcelType,
                    'quantity'=> $quantity,
                    'weight'=> $weight,
                    'length'=> $length,
                    'depth'=> $depth,
                    'width'=> $width,
                    'hazmat'=> [
                        'phone'=> $h_phone,
                        'erapReference'=> $h_erapReference,
                        'number'=> $h_number,
                        'shippingName'=> $h_shippingName,
                        'primaryClass'=> $h_primaryClass,
                        'subsidiaryClass'=> $h_subsidiaryClass,
                        'toxicByInhalation'=> $h_toxicByInhalation,
                        'packingGroup'=> $h_packingGroup,
                        'hazmatType'=> $h_hazmatType,
                    ]   
                ]
            ],
            'surcharges'=> [
                [
                    'type'=> $surcharges_type,
                    'value'=> $surcharges_value
                ]
            ],
            'createDate'=> $createDate,
            'deliveryType'=> $deliveryType,       
        
        ];
//Freight Account ====================================================
        $data_hazmat_nonregulated = 
    [   
        'division'=> $division,
        'category'=> $category,
        'paymentType'=> $paymentType,
        'billingAccount'=> $billing_account,
        'note'=> $note,
            'sender'=> [
             'addressLine1'=> $sender_addressLine1,
             'city'=> $sender_city,
             'provinceCode'=> $sender_province,
             'postalCode'=> $sender_postalCode,
             'countryCode'=> $sender_countryCode,
             'customerName'=> $sender_customerName,
             'contact'=>[            
                    'fullName'=> $sender_fullName,
                    'language'=>  'EN',
                    'email'=> $sender_email,
                    'department'=> $sender_department,
                    'telephone'=> $sender_telephone,
                ]
            ],
            'consignee'=> [       
             'addressLine1'=> $consignee_addressLine1,
             'city'=> $consignee_city,
             'provinceCode'=> $consignee_province,
             'postalCode'=> $consignee_postalCode,
             'countryCode'=> $consignee_countryCode,
             'customerName'=> $consignee_customerName,
             'contact'=> [                                            
                 'fullName'=> $consignee_fullName,
                 'language'=>  'EN',
                 'email'=> $consignee_email,
                 'department'=> $consignee_department,
                 'telephone'=> $consignee_telephone,
                ]
            ],
            'unitOfMeasurement'=> $unitOfMeasurement,         
            'parcels'=> [
                [
                   
                    'parcelType'=> $parcelType,
                    'quantity'=> $quantity,
                    'weight'=> $weight,
                    'length'=> $length,
                    'depth'=> $depth,
                    'width'=> $width,
                    'hazmat'=> [
                        'description'=> $h_description,                        
                        'hazmatType'=> $h_hazmatType,
                    ]   
                ]
            ],
            'surcharges'=> [
                [
                    'type'=> $surcharges_type,
                    'value'=> $surcharges_value
                ]
            ],
            'createDate'=> $createDate,
            'deliveryType'=> $deliveryType,       
        
        ];

        //Parcel =====================without_hazmat===================
$data_without_hazmat_parcel = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType, 
        'references'=> [
            [
             'type'=> $references_type,
             'code'=> $references_code,
            ]
        ]       
    
    ];
//Parcel account==================hazmat_nonregulated=========================
        $data_hazmat_nonregulated_parcel = 
    [   
        'division'=> $division,
        'category'=> $category,
        'paymentType'=> $paymentType,
        'billingAccount'=> $billing_account,
        'note'=> $note,
            'sender'=> [
             'addressLine1'=> $sender_addressLine1,
             'city'=> $sender_city,
             'provinceCode'=> $sender_province,
             'postalCode'=> $sender_postalCode,
             'countryCode'=> $sender_countryCode,
             'customerName'=> $sender_customerName,
             'contact'=>[            
                    'fullName'=> $sender_fullName,
                    'language'=>  'EN',
                    'email'=> $sender_email,
                    'department'=> $sender_department,
                    'telephone'=> $sender_telephone,
                ]
            ],
            'consignee'=> [       
             'addressLine1'=> $consignee_addressLine1,
             'city'=> $consignee_city,
             'provinceCode'=> $consignee_province,
             'postalCode'=> $consignee_postalCode,
             'countryCode'=> $consignee_countryCode,
             'customerName'=> $consignee_customerName,
             'contact'=> [                                            
                 'fullName'=> $consignee_fullName,
                 'language'=>  'EN',
                 'email'=> $consignee_email,
                 'department'=> $consignee_department,
                 'telephone'=> $consignee_telephone,
                ]
            ],
            'unitOfMeasurement'=> $unitOfMeasurement,         
            'parcels'=> [
                [
                   
                    'parcelType'=> $parcelType,
                    'quantity'=> $quantity,
                    'weight'=> $weight,
                    'length'=> $length,
                    'depth'=> $depth,
                    'width'=> $width,
                    'hazmat'=> [
                        'description'=> $h_description,                        
                        'hazmatType'=> $h_hazmatType,
                    ]   
                ]
            ],
            'surcharges'=> [
                [
                    'type'=> $surcharges_type,
                    'value'=> $surcharges_value
                ]
            ],
            'createDate'=> $createDate,
            'deliveryType'=> $deliveryType,
        'references'=> [
            [
             'type'=> $references_type,
             'code'=> $references_code,
            ]
        ]       
        
        ];

?>