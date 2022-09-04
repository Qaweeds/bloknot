<?php

namespace App\Http\Requests\Record;

use App\Models\People;
use App\Models\Record;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class NewRecordRequest extends FormRequest
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
            'client' => 'numeric|min:1|max:2',
            'client_id' => 'sometimes|exists:people,id',
            'name' => 'sometimes|string|max:150',
            'quantity' => 'nullable|numeric',
            'price' => 'numeric',
            'credit' => 'required_with:quantity|nullable|numeric',
        ];
    }

    protected function prepareForValidation()
    {
        if(is_null($this->credit)) $this->merge(['credit'=> 0]);
    }


    public function save()
    {

        try {
            DB::transaction(function () {
                if ($this->client == People::NEW) {
                    $this->client_id = People::create(['name' => $this->name])->id;
                }
                if($this->quantity == $this->credit){
                    Record::create([
                        'user_id' => auth()->id(),
                        'people_id' => $this->client_id,
                        'price' => $this->price,
                        'quantity' => $this->quantity,
                    ]);
                }else{
                    $paid = (int) $this->quantity - (int) $this->credit;
                    Record::create([
                        'user_id' => auth()->id(),
                        'people_id' => $this->client_id,
                        'price' => $this->price,
                        'quantity' => $paid,
                        'deleted_at' => now(),
                    ]);
                    if($this->credit){
                        Record::create([
                            'user_id' => auth()->id(),
                            'people_id' => $this->client_id,
                            'price' => $this->price,
                            'quantity' => $this->credit,
                        ]);
                    }
                }


            });
        } catch (QueryException $e) {
            return false;
        }
        return true;
    }
}
