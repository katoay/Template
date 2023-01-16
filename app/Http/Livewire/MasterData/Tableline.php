<?php

namespace App\Http\Livewire\MasterData;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TableLine as TableLineM;

class Tableline extends Component
{
    use AuthorizesRequests;
    public $isForm,$table_id,$editid,$deleteid;
    public $column,$metadata;
    protected $listeners = ['edit','openDeleteModal'];
    public function mount()
    {
        // $this->authorize('academic-position.show');
        $this->table_id = 'MASTERDATA';
        $this->column = array(
            'table_line_id' => array(
                'label' => 'รหัส',
                'show' => 'false',
                'require' => 'true',  
                'inputType' => 'text',  
            ),
            'table_id' =>  array(
                'label' => 'table_id',
                'show' => 'false', //true or false
                'require' => 'false',  //true or false
                'inputType' => 'text',  //text, number, date,textarea
            ),
            'table_code' =>  array(
                'label' => 'table_code',
                'show' => 'false', //true or false
                'require' => 'false',  //true or false
                'inputType' => 'text',  //text, number, date,textarea
            ),
            'table_desc' =>  array(
                'label' => 'table_desc',
                'show' => 'true', //true or false
                'require' => 'true',  //true or false
                'inputType' => 'text',  //text, number, date,textarea
            ),
            'long_text_1' =>  array(
                'label' => 'long_text_1',
                'show' => 'true', //true or false
                'require' => 'true',  //true or false
                'inputType' => 'text',  //text, number, date,textarea
            ),
            'long_text_2' =>  array(
                'label' => 'long_text_2',
                'show' => 'false', //true or false
                'require' => 'false',  //true or false
                'inputType' => 'text',  //text, number, date,textarea
            ),
            'long_text_3' =>  array(
                'label' => 'long_text_3',
                'show' => 'false', //true or false
                'require' => 'false',  //true or false
                'inputType' => 'text',  //text, number, date,textarea
            ),
            'long_text_4' =>  array(
                'label' => 'long_text_4',
                'show' => 'false', //true or false
                'require' => 'false',  //true or false
                'inputType' => 'text',  //text, number, date,textarea
            ),
            'logic_1' =>  array(
                'label' => 'logic_1',
                'show' => 'false', //true or false
                'require' => 'false',  //true or false
                'inputType' => 'boolean',  //text, number, date,textarea
            ),
            'logic_2' =>  array(
                'label' => 'logic_2',
                'show' => 'false', //true or false
                'require' => 'false',  //true or false
                'inputType' => 'number',  //text, number, date,textarea
            ),
        );
    }

    public function render()
    {
        return view('livewire.master-data.tableline.tableline');
    }

    public function create()
    {
        $this->isForm = true;
        $this->resetValidation();
        $this->editid='';
        $this->metadata = [];
        $this->metadata = ['logic_1'=>1];
    }
    protected $messages = [
        'metadata.table_desc.required' => 'กรุณาระบุ',
        'metadata.long_text_1.required' => 'กรุณาระบุ',
    ];

    protected $rules = [
        'metadata.table_desc' => 'required',
        'metadata.long_text_1' => 'required',

    ];
    public function store()
    {
        $this->validate($this->rules);
        $this->metadata['table_id'] = $this->table_id;
        if(!$this->editid){
            $this->metadata['table_code'] = '{{$self}}';
        }
        try {
            $stmt = TableLineM::updateOrCreate([
                'table_line_id' => $this->editid,
                'table_id' => $this->table_id,
            ],$this->metadata);
            $this->edit($stmt->table_line_id);
            // session()->flash('success', 'Successfully updated.');
            $this->dispatchBrowserEvent('toastr', 
            [
                'toast_type' => 'success',
                'toast_msg' => 'บันทึกข้อมูลสำเร็จ',
            ]);
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed.');
            // $this->dispatchBrowserEvent('toast', 
            // [
            //     'toast_type' => 'error',
            //     'toast_msg' => 'พบข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้',
            // ]);
        }
    }

    public function back()
    {
        $this->isForm = false;
    }

    public function edit($id)
    {
        $this->isForm = true;
        $this->resetValidation();
        $this->editid = $id;
        $column = $this->column;
        $data = TableLineM::find($id);
        foreach ($column as $key => $item):
            if($item['show'] == 'true')
            {
                if($item['inputType'] == 'boolean')
                {
                    $this->metadata[$key] = (int) $data[$key];
                    continue;
                }
                $this->metadata[$key] = $data[$key];
            }
        endforeach;
    }

    public function openDeleteModal($id)
    {
        $this->dispatchBrowserEvent('modal-delete', []);
        $this->deleteid = $id;
    }

    public function delete_modal_confirm()
    {
        $stmt = TableLineM::find($this->deleteid);
        try {
            //code...
            $stmt->delete();
            $this->emit('builder');
            $this->dispatchBrowserEvent('toast', 
                [
                    'toast_type' => 'success',
                    'toast_msg' => 'ลบข้อมูลสำเร็จ',
                ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('toast', 
            [
                'toast_type' => 'error',
                'toast_msg' => 'พบข้อผิดพลาด ไม่สามารถลบข้อมูลได้',
            ]);
        }
    }
}
