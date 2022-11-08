<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class HomeController extends Controller
{   
    public $data = [];
    public function index() {

        // $this->data['welcome'] = 'Học lập trình tại';
        // $this->data['content'] = '<h3>Chương 1: Nhập môn Laravel</h3>
        // <p>Kiến thức 1</p>
        // <p>Kiến thức 1</p>
        // <p>Kiến thức 1</p>
        // ';

        // $this->data['index'] = 1;

        // $this->data['dataArr'] = [
        //     'Item1',
        //     'Item2',
        //     'Item3'
        // ];

        // $this->data['number'] = 10; 

        // $this->data['message'] = 'Đăt hàng thành công';

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
        
        dd($request);
        // $rules = [
        //     'product_name' => 'required|min:6',
        //     'product_price' => 'required|integer'
        // ];
        
        // $message = [
        //     'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
        //     'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
        //     'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
        //     'product_price.integer' => 'Giá sản phẩm phải là số'
        // ];

        // $message = [
        //     'required' => 'trường :attribute bắt buộc phải nhập',
        //     'min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
        //     'integer' => 'Trường :attribute phải là số'
        // ];
            
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

