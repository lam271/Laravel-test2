<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;

class HomeController extends Controller
{   
    public $data = [];
    public function index() {

        $this->data['title'] = 'Trang Chủ';

        $this->data['message'] = 'Đăng kí tài khoản thành công';
        return view('clients.home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'Sản Phẩm';
        return view('clients.products', $this->data);
    }

    public function getAdd(){

        $this->data['title'] = 'Thêm sản phẩm';
        
        $this->data['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu';

        return view('clients.add', $this->data);
    }

    public function postAdd(ProductRequest $request){
        // return 'ok';
        // $rules = [
        //     'product_name' => ['required', 'min:6', function($attribute, $value, $fail){
        //         isUppercase($value, 'Trường :attribute không hợp lệ' ,$fail);
        //     }],
        //     'product_price' => ['required', 'integer']
        // ];

        $rules = [
            'product_name' => ['required', 'min:6'],
            'product_price' => ['required', 'integer']
        ];
        
        // $messages = [
        //     'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
        //     'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
        //     'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
        //     'product_price.integer' => 'Giá sản phẩm phải là số'
        // ];

        $messages = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
            'integer' => 'Trường :attribute phải là số',
            // 'uppercase' => 'Trường :attribute phải viết hoa'
        ];

        $attributes = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];

        // $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        // $validator->validate();

        // $request->validate($rules, $messages);

        return response()->json(['status'=>'success']);

        //$validator->validate();

        // if ($validator->fails()) {
        //     // return 'validate thất bại';
        //     $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
        // }else{
        //     // return 'validate thành công';
        //     return redirect()->route('product')->with('msg', 'validate thành công');
        // }

        // return back()->withErrors($validator);

            
        // $request->validate($rules, $message);

        //Xử lý việc thêm dữ liệu vào database
    }

    public function putAdd(Request $request){
        return 'phương thức put';
        dd($request);
    }

    public function getArr(){
        $contentArr = [
            'name' => 'laravel 8.x',
            'lesson' => 'khóa học lập trình laravel',
            'academy' => 'Unicode academi' 
        ];
    
        return $contentArr;
    }

    public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image = trim($request->image);

            $fileName = 'image_'.uniqid().'.jpg';

            // $fileName = basename($image);

            // return response()->streamDownload(function() use ($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, $fileName);

            return response()->download($image, $fileName);
        }
    }

    public function downloadDoc(Request $request){
        if(!empty($request->file)){
            $file = trim($request->file);

            $fileName = 'tai-lieu_'.uniqid().'.pdf';

            // $fileName = basename($image);

            // return response()->streamDownload(function() use ($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, $fileName);

            $header = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->download($file, $fileName, $header);
        }
    }
}

