<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function init(){
        // \Setting::set('company.name', 'Công ty TNHH Thịnh Phong');
        // \Setting::set('company.address', '923 Lê Hồng Phong, Phước Long, Nha Trang, Khánh Hòa');
        // \Setting::set('company.phone', '0258 3881168');
        // \Setting::set('company.fax', '0258 3882066');
        // \Setting::set('company.logo', '');
        // \Setting::set('company.nguoi_dai_dien', 'Nguyễn Văn Phong');
        // \Setting::set('company.chuc_vu', 'Giám đốc');
        // \Setting::set('company.quoc_tich', 'Việt Nam');
        // try{
        //     \Setting::save();
        //     Log::info('Người dùng ID:'.Auth::user()->id.' đã khởi tạo thông tin công ty');
        //     return redirect()->route('company.index')->with('status_success', 'Khởi tạo thông tin công ty thành công!');
        // }
        // catch(\Exception $e){
        //     Log::error($e);
        //     return redirect()->route('company.index')->with('status_error', 'Xảy ra lỗi khi khởi tạo thông tin công ty!');
        // }
    }

    public function index(){
        
        return view('quanly.index');
    }

    public function update(Request $request){

        \Setting::set('company.tenkhoa', $request->input('tenkhoa'));
        \Setting::set('company.tenhocvien', $request->input('tenhocvien'));
        \Setting::set('company.tenphanmem', $request->input('tenphanmem'));
        \Setting::set('company.banquyen', $request->input('banquyen'));
        \Setting::set('company.diachi', $request->input('diachi'));
        \Setting::set('company.lienhe', $request->input('lienhe'));
        \Setting::set('company.phattrien', $request->input('phattrien'));

        // Handle the user upload of avatar
    	if($request->hasFile('logo')){
    		$logo = $request->file('logo');
    		$filename = time() .'-logo.'. $logo->getClientOriginalExtension();
            Image::make($logo)->save( public_path('/uploads/logos/' . $filename ) );
            \Setting::set('company.logo', $filename);
        }
         // Handle the user upload of Slide 1
    	if($request->hasFile('slide1')){
    		$slide = $request->file('slide1');
    		$filename = time() .'-slide1.'. $slide->getClientOriginalExtension();
            Image::make($slide)->save( public_path('/uploads/slides/' . $filename ) );
            \Setting::set('company.slide1', $filename);
        }
         // Handle the user upload of Slide 2
    	if($request->hasFile('slide2')){
    		$slide2 = $request->file('slide2');
    		$filename = time() .'-slide2.'. $slide2->getClientOriginalExtension();
            Image::make($slide2)->save( public_path('/uploads/slides/' . $filename ) );
            \Setting::set('company.slide2', $filename);
        }

         // Handle the user upload of Slide 2
    	if($request->hasFile('slide3')){
    		$slide3 = $request->file('slide3');
    		$filename = time() .'-slide3.'. $slide3->getClientOriginalExtension();
            Image::make($slide3)->save( public_path('/uploads/slides/' . $filename ) );
            \Setting::set('company.slide3', $filename);
        }

        try{
            \Setting::save();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã cập nhật thông tin công ty');
            return redirect()->route('company.index')->with('status_success', 'Cập nhật thông tin Phần mềm thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('company.index')->with('status_error', 'Xảy ra lỗi khi cập nhật thông tin phần mềm!');
        }
    }
}
