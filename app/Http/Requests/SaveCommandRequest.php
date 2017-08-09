<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SaveCommandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product'=>'required|exists:products,id',
            'sex'=>'required|numeric|min:1|max:2',
            'size'=>'required|exists:sizes,id',
            'color'=>'required',
            'quantity'=>'required|numeric|min:1',
            'name'=>'required',
            'email'=>'required',
            'telephone'=>'required',
        ];
    }
    public function getCommandData(){
        $data=[
            'product_id'=>$this->get('product'),
            'sex'=>$this->get('sex'),
            'size_id'=>$this->get('size'),
            'color_id'=>$this->get('color'),
            'quantity'=>$this->get('quantity'),
            'created_at'=>Carbon::now(),
            'name'=>$this->get('name'),
            'email'=>$this->get('email'),
            'telephone'=>$this->get('telephone'),
        ];
        if($this->get('honoroc')!=null){
            $data['honoroc_id']=$this->get('honoroc');
        }
        return $data;
    }
}
