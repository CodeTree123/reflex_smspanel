<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\suborder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\s_category;
use App\Models\s_sub_category;
use App\Models\s_sub_subcat1;
use App\Models\s_sub_subcat2;
use App\Models\s_sub_subcat3;
use App\Models\User;
use App\Models\shop;
use App\Models\s_product;
use App\Models\s_product_stock;
use File;

class ShopController extends Controller
{
    public function shop(){
        $breadcrumb = "";
        $products = s_product::all();
        return view('shop.shop_home',compact('breadcrumb', 'products'));
    }

    public function shop_product($tb_name,$id){
        if($tb_name == 'sub_subcat_3'){
            $breadcrumb = s_sub_subcat3::find($id);
            $name = "sub_subcat_3";
            $products = s_product::where('subsubcat2_id',$id)->get();
        }
        if($tb_name == 'sub_subcat_2'){
            $breadcrumb = s_sub_subcat2::find($id);
            $name = "sub_subcat_2";
            $products = s_product::where('subsubcat1_id', $id)->get();
        }
        if($tb_name == 'sub_subcat_1'){
            $breadcrumb = s_sub_subcat1::find($id);
            $name = "sub_subcat_1";
            $products = s_product::where('subsubcat_id', $id)->get();
        }
        if($tb_name == 'subcat'){
            $breadcrumb = s_sub_category::find($id);
            $name = "subcat";
            $products = s_product::where('subcat_id', $id)->get();
        }
        return view('shop.shop_product', compact('breadcrumb','name','products'));
    }

    public function shop_single_product($p_id){
        $product = s_product::find($p_id);
        $cat = s_category::find($product->cat_id);
        $subcat = s_sub_category::find($product->subcat_id);
        $subcat1 = s_sub_subcat1::find($product->subsubcat_id);
        $subcat2 = s_sub_subcat2::find($product->subsubcat1_id);
        $subcat3 = s_sub_subcat3::find($product->subsubcat2_id);
        return view('shop.shop_single_product',compact('product','cat','subcat','subcat1','subcat2','subcat3'));
    }

    //    cart
    public function addToCart(Request $request){
        $product = s_product::find($request->pro_id);
        if($product->pro_stock->stock < $request->cart_qty){
            return back()->with('Fail','Quantity Is Larger Then Stock!');
        }else{
            Cart::add([
                'id' => $product->id,
                'name' => $product->pro_name,
                'qty' => $request->cart_qty,
                'price' => $product->pro_price,
                'weight' => 1,
                'options' => ['image' => $product->pro_img,'supplier'=> $product->supplier->fname." ".$product->supplier->lname,'supplier_num' => $product->supplier->phone,'supplier_id' =>$product->supplier_id ]
            ]);
        }
        return back()->with('success','Cart Added Successfully!');
    }

    public function cart_view(){
        $carts = Cart::content();
        return view('shop.cart_view',compact('carts'));
    }

    public function CartIncrement(Request $request){
        if($request->cart_qty > 1){
            cart::update($request->row_id, $request->cart_qty);
            return back()->with('success','Cart Quantity Updated Successfully!');
        }else{
            return back()->with('fail','Minimum Quantity Is 1 !');
        }
    }

    public function deleteCart(Request $request){
        Cart::remove($request->deletingId);
        return back()->with('success','Add To Cart Removed Successfully!');
    }
    public function clearCarts(Request $request){
        Cart::destroy();
        return back()->with('success','Cart Destroyed Successfully!');
    }

    public function placeOrder($id){
        $carts = Cart::content();
        $cart_count = $carts->count();

        $order = order::create([
            'doc_id' => $id,
            'total_quantity' => $cart_count,
            'net_total' => Cart::subtotal(),
            'vat' => Cart::tax(),
            'total_amount' => Cart::total(),
        ]);

        foreach ($carts as $cart){
            suborder::create([
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'supplier_id' => $cart->options->supplier_id,
                'quantity' => $cart->qty,
                'per_price' => $cart->price,
                'subtotal_price' => $cart->subtotal
            ]);
            $stock = s_product_stock::where('pro_id',$cart->id)->first();
            $new_stock = $stock->stock - $cart->qty;
            //  dd($stock,$cart->qty,$new_stock);

            if($new_stock > 0){
                $stock->update([
                    'stock' => $new_stock
                ]);
            }else{
                $stock->update([
                    'stock' => 0,
                    'status' => 0
                ]);
            }
        }
        Cart::destroy();
        return redirect()->route('shop')->with('success','Order Placed Successfully!');
    }

    public function Order_list(){
        $orders = order::where('doc_id',auth()->user()->id)->get();
        return view('shop.shop_ordered_list',compact('orders'));
    }

    public function order_invoice($id){
        $order = order::find($id);
        $total = (float) str_replace(',', '', $order->total_amount);
        $word = $this->numberToWord($total);
        return view('shop.invoice',compact('order','word'));
    }


    // shop admin

    public function shop_admin(){
        return view('shop.shop_admin.shop_admin_panel');
    }

    public function shop_admin_edit(){
        return view('shop.shop_admin.shop_admin_edit');
    }

    public function supplier_update(Request $request)
    {
        $request->validate([
            's_fname' => 'required',
            's_lname' => 'required',
            's_phone' => 'required',
            's_shopName' => 'required',
            's_image' => 'image|mimes:jpeg,png,jpg',
        ], [
            's_fname.required' => 'First Name Fields Is Required',
            's_lname.required' => 'Last Name Fields Is Required',
            's_phone.required' => 'Contact Number Fields Is Required',
            's_shopName.required' => 'Shop Name Fields Is Required',
            's_image.image' => 'Image Must Be Image Format',
            's_image.mimes' => 'Image Must Be Image Format of jpeg,png,jpg',
        ]);

        $shop = User::find($request->shop_id);
        $filename = $shop->p_image;
        if ($request->hasFile('s_image')) {
            $destination = 'uploads/other/' . $shop->p_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('s_image');
            if ($file->isValid()) {
                $filename = "other" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('other', $filename);
            }
        }
        User::find($request->shop_id)->update([
            'fname' => $request->s_fname,
            'lname' => $request->s_lname,
            'phone' => $request->s_phone,
            'p_image' => $filename,
        ]);

        $shop_info = shop::where('u_id', '=', $request->shop_id)->first();
//        dd($shop_info);
        $shop_info->update([
            'other' => $request->s_shopName,
//            'address' => $request->s_shopName
        ]);

        return redirect()->route('shop_admin')->with('success', 'Successfully Profile Information Updated.');
    }
    public function shop_admin_product_list(){
        $products = s_product::where('supplier_id',auth()->user()->id)->get();
        return view('shop.shop_admin.shop_product_list',compact('products'));
    }

    public function shop_add_product(){
        $cats = s_category::all();
        return view('shop.shop_admin.shop_add_product',compact('cats'));
    }

    public function fatch_subcat($id){
        $subcats = s_sub_category::where('cat_id',$id)->get();
        return response()->json([
            'status' => 200,
            'subcats' => $subcats,
        ]);
    }

    public function fatch_sub_subcat($id){
        $sub_subcats = s_sub_subcat1::where('sub_cat_id',$id)->get();
        return response()->json([
            'status' => 200,
            'sub_subcats' => $sub_subcats,
        ]);
    }

    public function fatch_sub_subcat1($id){
        $sub_subcat1s = s_sub_subcat2::where('sub_subcat1_id',$id)->get();
        return response()->json([
            'status' => 200,
            'sub_subcat1s' => $sub_subcat1s,
        ]);
    }

    public function fatch_sub_subcat2($id){
        $sub_subcat2s = s_sub_subcat3::where('sub_subcat2_id',$id)->get();
        // dd($sub_subcat2s);
        return response()->json([
            'status' => 200,
            'sub_subcat2s' => $sub_subcat2s,
        ]);
    }

    public function add_shop_product(Request $request){

        $request->validate([
            'pro_name' => 'required',
            'pro_price' => 'required',
            'pro_des' => 'required',
            'pro_qty' => 'required',
            'pro_alert_qty' => 'required',
            'pro_img' => 'required|image|mimes:jpeg,png,jpg'
        ],[
            'pro_name.required' => 'Product Name field is required.',
            'pro_price.required' => 'Product Price field is required.',
            'pro_des.required' => 'Product Description Field is required.',
            'pro_qty.required' => 'Product Quaintity Field is required.',
            'pro_alert_qty.required' => 'Product Alert Quaintity Field is required.',
            'pro_img.required' => 'Product Image Field is required.',
            'pro_img.image' => 'Image Field Must Be Image Format.',
            'pro_img.mimes'=> 'Image Field Must Be Image Format.'
        ]);

        $filename = '';
        if ($request->hasFile('pro_img')) {
            $file = $request->file('pro_img');
            if ($file->isValid()) {
                $filename = "s_pro" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('shop_product', $filename);
            }
        }

        $product = s_product::create([
            'cat_id' => $request->cat,
            'subcat_id' => $request->sub_cat,
            'subsubcat_id' => $request->sub_sub_cat,
            'subsubcat1_id' => $request->sub_sub_cat1,
            'subsubcat2_id' => $request->sub_sub_cat2,
            'supplier_id' => $request->supplier_id,
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'pro_description' => $request->pro_des,
            'pro_img' => $filename,
        ]);

        s_product_stock::create([
            'pro_id' => $product->id,
            'stock' => $request->pro_qty,
            'stock_alert' => $request->pro_alert_qty
        ]);

        return redirect()->route('shop_admin_product_list')->with('success','Product Added Successfully!');
    }

    public function shop_edit_product($id){
        $cats = s_category::all();
        $subcats = s_sub_category::all();
        $subsubcats = s_sub_subcat1::all();
        $subsubcat1s = s_sub_subcat2::all();
        $subsubcat2s = s_sub_subcat3::all();
        $pro = s_product::find($id);

        return view('shop.shop_admin.shop_edit_product',compact('cats', 'subcats', 'subsubcats', 'subsubcat1s', 'subsubcat2s','pro'));
    }

    public function edit_shop_product(Request $request,$id)
    {
        // dd($request->all());

        $request->validate([
            'pro_name' => 'required',
            'pro_price' => 'required',
            'pro_des' => 'required',
            'pro_img' => 'image|mimes:jpeg,png,jpg'
        ], [
            'pro_name.required' => 'Product Name field is required.',
            'pro_price.required' => 'Product Price field is required.',
            'pro_des.required' => 'Product Description Field is required.',
            'pro_img.image' => 'Image Field Must Be Image Format.',
            'pro_img.mimes' => 'Image Field Must Be Image Format.'
        ]);

        $product = s_product::find($id);
        $filename = $product->pro_img;
        if ($request->hasFile('pro_img')) {
            $destination = 'public/uploads/shop_product/' . $product->pro_img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('pro_img');
            if ($file->isValid()) {
                $filename = "s_pro" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('shop_product', $filename);
            }
        }

        s_product::find($id)->update([
            'cat_id' => $request->cat,
            'subcat_id' => $request->sub_cat,
            'subsubcat_id' => $request->sub_sub_cat,
            'subsubcat1_id' => $request->sub_sub_cat1,
            'subsubcat2_id' => $request->sub_sub_cat2,
            'supplier_id' => $request->supplier_id,
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'pro_description' => $request->pro_des,
            'pro_img' => $filename,
        ]);

        return redirect()->route('shop_admin_product_list')->with('success', 'Product Updated Successfully!');
    }

    public function product_status($id)
    {
        $getStatus = s_product::where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        s_product::where('id', $id)->update(['status' => $status]);
        return back()->with('success', 'Product Status Updated Successfully!');
    }

    public function product_delete(Request $request)
    {
        $del_product_id = $request->deletingId;
        // dd($del_drug_id);
        $del_product_info = s_product::find($del_product_id);
        $del_product_info->delete();
        return back()->with('success', 'Product Deleted Successfully!');
    }

    public function restock_shop_product(Request $request){

        $pro_stock = s_product_stock::find($request->pro_stock_id);

        $previous_stock = $pro_stock->stock;
        $new_stock = $previous_stock + $request->pro_qty;
        $pro_stock->update([
            'stock' => $new_stock,
            'stock_alert' => $request->pro_alert_qty,
            'status' => 1
        ]);
        return back()->with('success', 'Product Restock Successfully!');
    }

    public function shop_order_list(){
//        $orders = suborder::where('supplier_id',auth()->user()->id)->get();
        $orders = suborder::where('supplier_id',auth()->user()->id)->get();
//        $orders = suborder::leftJoin('orders','suborders.order_id','=','orders.id')->where('suborders.supplier_id',auth()->user()->id)->groupBy('orders.id')->get(['orders.id']);
        $count = $orders->unique('order_id');
//        dd($orders,$count);
        return view('shop.shop_admin.shop_order_list',compact('orders','count'));
    }

    public function order_confirm($id){
        $getStatus = order::where('id',$id)->first()->status;
        $orderCount = suborder::where('order_id',$id)->count();
        if($orderCount > 1){
            $suborders = suborder::where('order_id',$id)->get();
            foreach ($suborders as $suborder){
                if($suborder->status == 0 && $suborder->supplier_id == auth()->user()->id){
                    $suborder->update([
                       'status' => 1
                    ]);
                }
            }
            foreach ($suborders as $suborder){
                $CheckAll = collect([$suborder->status]);
            }
            if($CheckAll->contains(1)){
                order::find($id)->update([
                   'status' => 1
                ]);
            }
        }else{
            if($getStatus == 0){
                $status = 1;
            }
            order::find($id)->update([
               'status' => $status
            ]);

            suborder::where('order_id',$id)->update([
               'status' => 1
            ]);
        }
        return back()->with('success','Order Confirmed Successfully!');
    }

    public function order_cancel($id){
        $getStatus = order::where('id',$id)->first()->status;
        $orderCount = suborder::where('order_id',$id)->count();
        if($orderCount > 1){
            $suborders = suborder::where('order_id',$id)->get();
            foreach ($suborders as $suborder){
                if($suborder->status == 0 && $suborder->supplier_id == auth()->user()->id){
                    $suborder->update([
                        'status' => 2
                    ]);
                }
            }
            foreach ($suborders as $suborder){
                $CheckAll = collect([$suborder->status]);
            }
            if($CheckAll->contains(2)){
                order::find($id)->update([
                    'status' => 2
                ]);
            }
        }else{
            if($getStatus == 0){
                $status = 2;
            }
            order::find($id)->update([
                'status' => $status
            ]);

            suborder::where('order_id',$id)->update([
                'status' => 2
            ]);
        }
        return back()->with('success','Order Canceled Successfully!');
    }


    //    To Word Function
    public function numberToWord($num = '')
    {
        $num    = ( string ) ( ( int ) $num );

        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );

            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );

            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');

            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');

            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');

            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );

            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . '' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';

                if( $tens < 20 ) { $tens = ( $tens ? '' . $list1[$tens] . '' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
        {
            $commas = $commas - 1;
        }

            $words  = implode( ',' , $words );

            $words  = trim( str_replace( ',' , ',' , ucwords( $words ) )  , ',' );
            if( $commas )
            {
                $words  = str_replace( ',' , 'and' , $words );
            }

            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }


}
