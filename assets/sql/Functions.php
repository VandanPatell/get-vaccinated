<?php

    if(isset($_POST['GetStates'])){
        GetStates();
    }

    function GetStates(){
        $ch = curl_init();
        $url = 'https://cdn-api.co-vin.in/api/v2/admin/location/states/';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $resp = curl_exec($ch);
        $decoded = json_decode($resp,true);
        foreach ($decoded['states'] as $key => $value) {
            print_r('<option value="'.$value['state_id'].'">'.$value['state_name'].'</option>');
        }
        curl_close();
    }


    if(isset($_POST['DistId'])){
        GetDistricts($_POST['DistId']);
    }

    function GetDistricts($id = 1)
    {
        $ch = curl_init();
        $url = 'https://cdn-api.co-vin.in/api/v2/admin/location/districts/'.$id;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $resp = curl_exec($ch);
        $decoded = json_decode($resp,true);
        foreach ($decoded['districts'] as $key => $value) {
            $id = $value['district_id'];
            print_r('<option value="'.$value['district_id'].'">'.$value['district_name'].' </option>');
        }
        curl_close($ch);
    }

    if(isset($_POST['GetCenters'])){
        getCenter($_POST['GetCenters']);
    }

    function getCenter($id){
        $ch = curl_init();
        $date = date("d-m-Y");
        $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id='.$id.'&date='.$date.'';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $resp = curl_exec($ch);

        $decoded = json_decode($resp,true);
        $dates = getDates($id);
        $session = array();

        $html = '';
        foreach ($decoded['centers'] as $key => $value) {
            $district = $value['district_name'];
            $district = preg_replace('/ /','-',$district);
            $i = '<tr scope="row">
            
           <td>
           <a href="./centers/'.$district.'/'.$value['center_id'].'">'.$value['name'].' - '.$value['pincode'].'
               <small class="d-block"> '.$value['address'].' </small>
               <small class="d-block"> Free </small>
            </a>
           </td>';
            foreach ($value['sessions'] as $key => $value) {
                $session[$value['date']] = $value;
            }
            $td = '';
            foreach ($dates as $key => $value) {
                if(array_key_exists($key,$session)){
                    $da = $session[$key];
                    if($da['available_capacity'] == 0){
                        $color = 'text-danger';
                    }
                    else{
                        $color = 'text-success';
                    }
                    $j = '<td class="text-center '.$color.'">
                    '.$da['available_capacity'].'
                    <small class="d-block"> '.$da['vaccine'].' </small>
                    <small class="d-block">Age limit : '.$da['min_age_limit'].'+</small>
                </td>';
                }
                else{
                    $j = '<td class="text-center text-danger">
                    NA
                    <small class="d-block"> NA </small>
                    <small class="d-block">Age limit : NA</small>
                </td>';
                }
                $td.= $j;
            }

            $html .= $i.$td.'</tr>
            <tr class="spacer">
                <td colspan="100"></td>
            </tr>';
        }
        print_r($html);
        curl_close($ch);
    }

    if(isset($_POST['GetDate'])){
        $dates = getDates($_POST['GetDate']);
        $html = '<tr>
        <th scope="col">Center Name</th>';
        $k = '';
        foreach ($dates as $key => $value) {
            $i = '<th scope="col" class="text-center">'.$key.'</th>';
            $k .= $i;
        }
        $html = $html.$k.'</tr>';
        print_r($html);
    }

    function getDates($id){
        $ch = curl_init();
        $date = date("d-m-Y");
        $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id='.$id.'&date='.$date.'';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $resp = curl_exec($ch);
        $decoded = json_decode($resp,true);
        $dates = array();
        foreach ($decoded['centers'] as $key => $value) {
           
            foreach ($value['sessions'] as $key => $value) {
                $dates[$value['date']] = 1;
                // print_r('')
            }
        }
        curl_close($ch);
        $dates = sortDates($dates);
        return $dates;
        
    }

    function sortDates($dates){
        $temp = array();    

        $keys =  array_keys($dates);
        
        sort($keys);

        // return $keys;
        foreach ($keys as $key => $value) {
            $temp[$value] = 1;
        }

        return $temp;
    }

    if(isset($_POST['generateOTP'])){
        verifyPhone($_POST['generateOTP']);
    }

    function verifyPhone($contact){
        $ch = curl_init();
        $url = 'https://cdn-api.co-vin.in/api/v2/auth/public/generateOTP';
        $post = array();
        $post['mobile'] = $contact;
        $post = json_encode($post);
        // print_r($post);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $resp = curl_exec($ch);

        if($e = curl_error($ch)){
            // echo $e;
        }
        else{
            $dates = array();
            $decoded = json_decode($resp,true);
            if(array_key_first($decoded) == 'txnId' && gettype($decoded) == 'array'){
                $_COOKIE['txnId'] = $decoded['txnId'];
            }
            print_r($resp);
        }
        curl_close($ch);

    }

    if(isset($_POST['OTP'])){
        CheckOTP($_POST['OTP']);
    }

    function CheckOTP(){
        
    }

?>