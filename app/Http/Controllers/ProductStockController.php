<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function index(){
        $data['page_title'] = 'Product Stock';

        return view('product_stock.product-stock', $data);
    }

    public function store(Request $request){
        $base_url = '149.129.221.143/kanaldata/Webservice/bank_account';
        $data = [
		    'bank_id' => $request->bank_id
		];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_URL => $base_url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => $data,
		    CURLOPT_HTTPHEADER => array(
		    	// Set here requred headers
		        "accept: */*",
		        "accept-language: en-US,en;q=0.8",
		        "content-type: multipart/form-data",
		    ),
		));
		$response = curl_exec($curl);
        return json_decode($response);
		// $err = curl_error($curl);
		// curl_close($curl);
    }
}
