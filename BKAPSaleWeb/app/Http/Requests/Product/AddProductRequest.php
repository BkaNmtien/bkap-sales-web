<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class AddProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
       
        return [
            'name' => 'required|unique:products',
            'quantity' => 'numeric|min:1',
            'image' => 'image:jpg,bmp,png,jpeg',
            'sale_price' => 'lt:price',
            
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tên không được để rỗng',
            'quantity.numeric'=>'Số lượng phải là số',
            'image.image'=>'Không đúng định dạng',
            'sale_price.lt'=>'Giá khuyến mãi phải nhỏ hơn giá gốc'
        ];
    }
}
