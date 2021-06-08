<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Units;
use App\Category;
use App\Orders;
use App\Orders_detail;
use App\Supplies;
use App\Person;
use App\Products;
use App\User;
use Image;
use \Milon\Barcode\DNS1D;

class ProductsController extends Controller
{ 
    //========================================================//
    public function indexsupplies()
    {
        $supp = DB::table('supplies')->get();
        return view('products.supplies',[
            'supps' => $supp,
        ]);      
    }
    public function savesupplies(Request $request)
    {
        $add= new Supplies();
        $add->SUP_NAME = $request->SUP_NAME;  
        $add->SUP_TEL = $request->SUP_TEL; 
        $add->SUP_LINETOKEN = $request->SUP_LINETOKEN;          
        $add->save();
        return redirect()->route('P.supplies');
    }
    public function updatesupplies(Request $request)
    {
        $id = $request->SUP_ID;
        $update = Supplies::find($id);
        $update->SUP_NAME = $request->SUP_NAME;
        $update->SUP_TEL = $request->SUP_TEL;
        $update->SUP_LINETOKEN = $request->SUP_LINETOKEN;                  
        $update->save();
        return redirect()->route('P.supplies');
    }
    public function destroysupplies($id)
    {
        Supplies::destroy($id);
        return redirect()->route('P.supplies');
    }
//========================================================//
    public function indexunits()
    {
        $unit = DB::table('units')->get();
        return view('products.units',[
            'units' => $unit,
        ]);
    }
    public function saveunits(Request $request)
    {
        $add= new Units();
        $add->UNITS_NAME = $request->UNITS_NAME;           
        $add->save();
        
        $header = "เพิ่มหน่วยนับสำเร็จ";
        $UNITS_ID = $request->UNITS_ID;       
        $UNITS_NAME = $request->UNITS_NAME;
        $message = $header.
            "\n"."รหัส :" . $UNITS_ID .           
            "\n"."ชื่อหน่วยนับ :" . $UNITS_NAME ;
                $chOne = curl_init();
                curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt( $chOne, CURLOPT_POST, 1);
                curl_setopt( $chOne, CURLOPT_POSTFIELDS, $message);
                curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message");
                curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
                $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer nb23oRxeAVothaBWmAk6Dwg6xMuOeXp9wIHO3qqeBfL', );
                curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec( $chOne );
                if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
                else { $result_ = json_decode($result, true);
                echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
                curl_close( $chOne );
        return redirect()->route('P.units');
    }
    public function updateunits(Request $request)
    {
        $id = $request->UNITS_ID;
        $update = Units::find($id);
        $update->UNITS_NAME = $request->UNITS_NAME;                  
        $update->save();
        return redirect()->route('P.units');
    }
    public function destroyunits($id)
    {
        Units::destroy($id);
        return redirect()->route('P.units');
    }
//========================================================//
    public function indexcategory()
    {
        $cat = DB::table('category')->get();
        return view('products.category',[
            'cats' => $cat,
        ]);      
    }
    public function savecategory(Request $request)
    {
        $add= new Category();
        $add->CAT_NAME = $request->CAT_NAME;           
        $add->save();
        return redirect()->route('P.category');
    }
    public function updatecategory(Request $request)
    {
        $id = $request->CAT_ID;
        $update = Category::find($id);
        $update->CAT_NAME = $request->CAT_NAME;                  
        $update->save();
        return redirect()->route('P.category');
    }
    public function destroycategory($id)
    {
        Category::destroy($id);
        return redirect()->route('P.category');
    }
//========================================================//
    public function indexproducts()
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
         }
        $year = date('Y');
        $idstore = $data->store_id;
        $iduser = $data->id;

        $Pro = DB::table('products')->leftjoin('units','products.PRO_UNIT','units.UNITS_ID')->leftjoin('categories','products.PRO_CAT','categories.CAT_ID')->get();
        $unit = DB::table('units')->get();
        $CAT = DB::table('categories')->get();

        return view('products.products',[
            'data' => $data,
            'Pros' => $Pro,
            'units' => $unit,
            'CATS' => $CAT,
        ]);       
    }

    public function saveproducts(Request $request)
    {
        $add= new Products();
        $add->PRO_CODE = $request->PRO_CODE;  
        $add->PRO_NAME = $request->PRO_NAME; 
        $add->PRO_QTY = $request->PRO_QTY; 
        $add->PRO_UNIT = $request->PRO_UNIT;
        $add->PRO_PRICE = $request->PRO_PRICE;
        $add->PRO_CAT = $request->PRO_CAT;
        // $add->PRO_PIC = $request->PRO_PIC;
        // $add->PRO_QRCODE = $request->PRO_QRCODE;  
        if($request->hasFile('PRO_PIC')){
            $PRODUCTS_IMG = $request->file('PRO_PIC');
            $filename = time() . '.' .$PRODUCTS_IMG->getClientOriginalExtension();
            Image::make($PRODUCTS_IMG)->resize(300,300)->save(public_path('/img/product/' .$filename));
            $add->PRO_PIC = $filename;
        }       
        $add->save();
        return redirect()->route('P.products');
    }
    public function updateproducts(Request $request)
    {
        $id = $request->PRO_ID;
        $update = Products::find($id);
        $update->PRO_CODE = $request->PRO_CODE;
        $update->PRO_NAME = $request->PRO_NAME;
        $update->PRO_QTY = $request->PRO_QTY; 
        $update->PRO_UNIT = $request->PRO_UNIT;
        $update->PRO_PRICE = $request->PRO_PRICE;
        $update->PRO_CAT = $request->PRO_CAT;  
        if($request->hasFile('PRO_PIC')){
            $PRODUCTS_IMG = $request->file('PRO_PIC');
            $filename = time() . '.' .$PRODUCTS_IMG->getClientOriginalExtension();
            Image::make($PRODUCTS_IMG)->resize(300,300)->save(public_path('/img/product/' .$filename));
            $update->PRO_PIC = $filename;
        }               
        $update->save();
        return redirect()->route('P.products');
    }
    public function destroyproducts($id)
    {
        Products::destroy($id);
        return redirect()->route('P.products');
    }

    //===============================================//
    public function indexorders()
    {
        $order = DB::table('orders')                
                ->leftJoin('supplies','orders.ORDER_SUP','=','supplies.SUP_ID')  
                ->leftJoin('person','orders.ORDER_STAFF','=','person.PERSON_ID') 
                ->orderBy('orders.ORDER_ID')  
                ->get();
        $supp = DB::table('supplies')->get();
        $Person = DB::table('person')->get();
        $Product = DB::table('products')->get();

        return view('products.orders',[
            'orders' => $order,
            'supps' => $supp,
            'Persons' => $Person,
            'Products' => $Product,
        ]);
    }
    public function save(Request $request)
    {     
        // $SS  = $request->ORDER_STAFF;
        // dd($SS); 
        $addorders= new Orders();
        $addorders->ORDER_BILLNO = $request->ORDER_BILLNO;
        $addorders->ORDER_DATE = $request->ORDER_DATE;
        $addorders->ORDER_SUP = $request->ORDER_SUP;
        $addorders->ORDER_STAFF = $request->ORDER_STAFF;         
        $addorders->save();

        $idorders =  Orders::max('ORDER_ID');

        if($request->ORDERDETAIL_PRO_NAME != '' || $request->ORDERDETAIL_PRO_NAME != null){

        $ORDERDETAIL_PRO_NAME = $request->ORDERDETAIL_PRO_NAME;
        $ORDERDETAIL_PRO_QTY = $request->ORDERDETAIL_PRO_QTY;  
        $ORDERDETAIL_PRO_PRICE = $request->ORDERDETAIL_PRO_PRICE;
        $ORDERDETAIL_PRO_TOTAL = $request->ORDERDETAIL_PRO_TOTAL;    

        $number =count($ORDERDETAIL_PRO_NAME);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        { 

        $productname = Products::where('PRO_ID','=',$ORDERDETAIL_PRO_NAME[$count])->first(); 

        $add_detail = new Orders_detail();
        $add_detail->ORDER_ID = $idorders;
        $add_detail->ORDERDETAIL_PRO_NAME = $productname->PRO_NAME;
        $add_detail->ORDERDETAIL_PRO_QTY = $ORDERDETAIL_PRO_QTY[$count];     
        $add_detail->ORDERDETAIL_PRO_PRICE = $ORDERDETAIL_PRO_PRICE[$count];
        $add_detail->ORDERDETAIL_PRO_TOTAL = $ORDERDETAIL_PRO_QTY[$count] * $ORDERDETAIL_PRO_PRICE[$count];        
        $add_detail->save(); 
        }
    }
    $ORDER_TOTALPRICE = Orders_detail::where('ORDER_ID','=',$idorders)->sum('ORDERDETAIL_PRO_TOTAL');

    $updatesum = Orders::find($idorders );
    $updatesum->ORDER_TOTAL_PRICE = $ORDER_TOTALPRICE;
    $updatesum->save();

        return redirect()->route('O.indexorders');
    }

    
        // $iproduct=  Products::where('PRO_ID','=',$ORDERDETAIL_PRO_NAME[$count])->first(); 
    public function orderspro(Request $request)
    {

        $order = DB::table('orders')                
                ->leftJoin('supplies','orders.ORDER_SUP','=','supplies.SUP_ID')  
                ->leftJoin('person','orders.ORDER_STAFF','=','person.PERSON_ID') 
                ->orderBy('orders.ORDER_ID')  
                ->get();
        $supp = DB::table('supplies')->get();
        $Person = DB::table('person')->get();
        $Product = DB::table('products')->get();
        
        return view('products.orderspro',[
            'orders' => $order,
            'supps' => $supp,
            'Persons' => $Person,
            'Products' => $Product,
        ]);
    }
      //======================ฟังชั่น====================//

    function checkproduct(Request $request)
    {
        $idproduct = $request->PRO_ID;
       $product=  Products::where('PRO_ID','=',$idproduct)->first();
        echo $product->PRO_CODE; 
        
    }
  

function checksummoney(Request $request)
{

  $ORDERDETAIL_PRO_QTY = $request->get('ORDERDETAIL_PRO_QTY');
  $ORDERDETAIL_PRO_PRICE = $request->get('ORDERDETAIL_PRO_PRICE');

  $sum = $ORDERDETAIL_PRO_QTY * $ORDERDETAIL_PRO_PRICE;

  $output = '<input type="hidden" type="text" name="sum" value="'.$sum.'" /><div style="text-align: right; margin-right: 10px;">'.number_format($sum,5).'</div>';
  echo $output;

}
function fetchdetail(Request $request)
{
    $id = $request->get('select');

  if($id == 'จ้างเหมาอื่นๆ' ){
     $output = '
                 <div class="row push">
                     <div class="col-lg-2">
                     <label>รายละเอียดการจ้างเหมา :</label>
                     </div>
                     <div class="col-lg-10">
                     <input name="HIRE_DETAIL" id="HIRE_DETAIL" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;" >
                     </div>
                 </div>
';
  }else{
     $output = '<input type="hidden" name="HIRE_DETAIL" id="HIRE_DETAIL" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;" value="">';
  }
 echo $output;

} 
  


public function testsave(Request $request)
    {    
        $addorders= new Orders();
        $addorders->ORDER_BILLNO = $request->ORDER_BILLNO;
        $addorders->ORDER_DATE = $request->ORDER_DATE;
        $addorders->ORDER_SUP = $request->ORDER_SUP;
        $addorders->ORDER_STAFF = $request->ORDER_STAFF;         
        $addorders->save();

        $idorders =  Orders::max('ORDER_ID');

        if($request->ORDERDETAIL_PRO_NAME != '' || $request->ORDERDETAIL_PRO_NAME != null){

        $ORDERDETAIL_PRO_NAME = $request->ORDERDETAIL_PRO_NAME;
        $ORDERDETAIL_PRO_QTY = $request->ORDERDETAIL_PRO_QTY;    

        $number =count($ORDERDETAIL_PRO_NAME);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        { 

        $productname = Products::where('PRO_ID','=',$ORDERDETAIL_PRO_NAME[$count])->first(); 

        $add_detail = new Orders_detail();
        $add_detail->ORDER_ID = $idorders;
        $add_detail->ORDERDETAIL_PRO_NAME = $productname->PRO_NAME;
        $add_detail->ORDERDETAIL_PRO_QTY = $ORDERDETAIL_PRO_QTY[$count];            
        $add_detail->save(); 
        }
    }
    $ORDER_TOTALQTY = Orders_detail::where('ORDER_ID','=',$idorders)->sum('ORDERDETAIL_PRO_QTY');

    $updatesum = Orders::find($idorders );
    $updatesum->ORDER_TOTAL_QTY = $ORDER_TOTALQTY;
    $updatesum->save();

        return redirect()->route('O.indexorders');
    }

    public function destroyorders($id) // Delete 2 table  Multirecord
    {
        Orders::destroy($id);
 
        Orders_detail::where('ORDER_ID',$id)->delete();
      
        return redirect()->route('O.indexorders');
    }


}



