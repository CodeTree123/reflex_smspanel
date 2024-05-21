<?php

namespace App\Http\Controllers;

use App\Models\doc_storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    public function inventories(){
        $storages = doc_storage::where('d_id',auth()->user()->id)->get();
        return view('inventory.inventory',compact('storages'));
    }

    public function add_inventory(Request $request){

        $validator = Validator::make($request->all(),[
            'pro_name' => 'required',
            'pro_qty' => 'required',
            'pro_alert_qty' => 'required',
        ],[
            'pro_name.required' => 'The Product Name Field Is Required.',
            'pro_qty.required' => 'The Product Quantity Is Required.',
            'pro_alert_qty.required' => 'The Product Alert Quantity Field Is Required.'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidInvAdd', 'Invalid Add');
        }else{
            doc_storage::create([
                'd_id' => auth()->user()->id,
                'product_name' => $request->pro_name,
                'product_stock' => $request->pro_qty,
                'product_stock_alert' => $request->pro_alert_qty,
                'product_description' => $request->pro_desc
            ]);
            return back()->with('success','Inventory Added Successfully!');
        }
    }

    public function edit_inventory($id){
        $inv = doc_storage::find($id);
        return response()->json([
           'status' => 200,
           'inv' => $inv
        ]);
    }

    public function update_inventory(Request $request){

        $validator = Validator::make($request->all(),[
            'u_pro_name' => 'required',
            'u_pro_qty' => 'required',
            'u_pro_alert_qty' => 'required',
        ],[
            'u_pro_name.required' => 'The Product Name Field Is Required.',
            'u_pro_qty.required' => 'The Product Quantity Is Required.',
            'u_pro_alert_qty.required' => 'The Product Alert Quantity Field Is Required.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->inv_id
            ]);
        }else{
            doc_storage::find($request->inv_id)->update([
                'product_name' => $request->u_pro_name,
                'product_stock' => $request->u_pro_qty,
                'product_stock_alert' => $request->u_pro_alert_qty,
                'product_description' => $request->u_pro_desc
            ]);
            return response()->json([
                'status' => 200,
                'msg' => 'Inventory Updated Successfully!',
            ]);
        }
    }

    public function restock_inventory(Request $request){
        $validator = Validator::make($request->all(),[
            're_pro_qty' => 'required',
            're_pro_alert_qty' => 'required',
        ],[
            're_pro_qty.required' => 'The New Quantity Is Required.',
            're_pro_alert_qty.required' => 'The New Alert Quantity Field Is Required.'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput()->with('invalidInvRe', $request->pro_stock_id);
        }else{
            $inv = doc_storage::find($request->pro_stock_id);
            $previous_stock = $inv->product_stock;
            $new_stock = $previous_stock + $request->re_pro_qty;
            $inv->update([
                'product_stock' => $new_stock,
                'product_stock_alert' => $request->re_pro_alert_qty,
            ]);
            return back()->with('success','Inventory Stock Updated Successfully!');
        }
    }

    public function inventory_status($id){
        $getStatus = doc_storage::where('id',$id)->first();
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        doc_storage::where('id',$id)->update(['status' => $status]);
        return back()->with('success','Inventory Product Status Updated Successfully!');
    }
}
