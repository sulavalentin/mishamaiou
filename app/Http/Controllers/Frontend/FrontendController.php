<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCommandRequest;
use App\Models\Command;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('frontend.index',[
            'products'=>$products
        ]);
    }

    public function getItem(Request $request){
        if(is_numeric($request->id)){
            $view = View("frontend.partials.modal")->with('product',Product::query()->where('id',$request->id)->first())->render();
            return $view;
        }
    }
    public function saveCommand(SaveCommandRequest $request){
        Command::query()->insert($request->getCommandData());
        return response()->json('Va multumim pentru commanda');
    }
    public function item($id){
        return view('frontend.product',[
            'product'=>Product::query()->where('id',$id)->first(),
            'descriptions'=>DB::table('descriptions')->where('product_id',$id)->get()
        ]);
    }
}
