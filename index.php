<?php
    print_r("code Running");
    // SHA256 OTP conversion while confirm OTP

    $ch = curl_init();
    print_r($ch);

    // $url = 'https://reqres.in/api/users?page=2';
    // $url = 'https://cdn-api.co-vin.in/api/v2/admin/location/states';
    // $url = 'https://cdn-api.co-vin.in/api/v2/admin/location/districts/11';
    // $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/findByPin?pincode=360005&date=12-05-2021';
    // $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/findByDistrict?district_id=775&date=10-05-2021';
    // $url = 'https://cdn-api.co-vin.in/api/v2/auth/public/generateOTP';
    // $url = 'https://reqres.in/api/users';
    $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin?pincode=360005&date=27-05-2021';
    // $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id=154&date=13-05-2021';
//     $post = [
//         'mobile' => '1234567890'
//     ];

    $post = json_encode($post);

    curl_setopt($ch,CURLOPT_URL,$url);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    // curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);

    $resp = curl_exec($ch);

    if($e = curl_error($ch)){
        echo $e;
    }
    else{
        // $dates = array();
        $decoded = json_decode($resp,true);
        // print_r(gettype($decoded));
        print_r($decoded);
        
    }
    curl_close($ch);
    


?>


