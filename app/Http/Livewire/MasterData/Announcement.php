<?php

namespace App\Http\Livewire\MasterData;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Announcement as AnnouncementM;
use App\Models\Attachment;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use File;
use Image;
use DB;
use Auth;

class Announcement extends Component
{
    use AuthorizesRequests, WithFileUploads;
    public $isOpen = 0;
    public $isDelete = 0;
    public $isForm,$form_style,$isCreate,
    $isEdit,$showtable,$header_text,$delete_id,$audits;

    // Image
    public $announcement_id, $object_type, $announcement_header, $announcement_desc,
    $flag, $active;

    // Image
    public $image_file, $image_file_url;
    public $inputFile = [], $attachfile = [], $file_id, $condit_2;

    public $editid,$action;
    protected $listeners = ['edit','openDeleteModal'];
    protected $queryString = ['editid','action'];

    public function __construct()
    {
        parent::__construct();
        // dd();
        $this->rules = [
            'announcement_header' => 'required',
            'announcement_desc' => 'required',
        ];

        $this->messages = [
            // 'emp_code.unique' => 'มีรหัสนี้ในระบบแล้ว',
            'announcement_header.required' => 'กรุณาระบุหัวข้อ',
            'announcement_desc.required' => 'กรุณาระบุรายละเอียด',
        ];
    }

    public function mount()
    {   
        $this->header_text = "ข้อมูลพนักงาน";
        // $this->showtable = true;
        if($this->editid){
            $this->edit($this->editid);
        }
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.master-data.announcement.announcement');
    }

    public function loadData()
    {
        $this->inputFile = [];
        $this->attachfile = Attachment::where('object_type', 'ANNOUNCEMENT')
        ->where('object_id', $this->announcement_id)
        ->get();
    }

    public function create()
    {
        $this->isCreate();
        $this->resetInputFields();
        $this->resetValidation();
    }

    public function isCreate()
    {
        $this->isCreate = true;
        $this->isEdit = false;
        $this->showtable = false;
        $this->editid = null;
        $this->isForm = true;
    }

    public function isEdit()
    {
        $this->isEdit = true;
        $this->isCreate = false;
        $this->showtable = false;
        $this->isForm = true;
        
    }

    public function back()
    {
        $this->isForm = false;
        $this->resetInputFields();
        $this->resetValidation();
    }
    
    private function resetInputFields()
    {
        $this->announcement_id = null;
        $this->object_type = null;
        $this->announcement_header = null;
        $this->announcement_desc = null;
        $this->flag = 1;
        $this->active = 1;
        $this->editid = null;

        $this->image_file = null;
        $this->image_file_url = null;
        $this->inputFile = [];
    }
    public function store()
    {
        DB::beginTransaction();
        $this->validate($this->rules);
        try{
            // dd($this->image_file);
            $stmt = AnnouncementM::updateOrCreate([
                'announcement_id' => $this->announcement_id,
            ], 
            [
                'object_type' => $this->object_type,
                'announcement_header' => $this->announcement_header,
                'announcement_desc' => $this->announcement_desc,
                'flag' => $this->flag,
                'active' => $this->active,
            ]);
            $stmt->save();
            $id = $stmt->announcement_id;
            if ($this->image_file) {
                $file_path_info = 'announcement';
                try {
                    if ($this->image_file) {
                        $file = $this->image_file;
                        $file_type = $file->getClientOriginalExtension();
                        $file_size = $file->getSize();
                        $filename = $this->image_file->hashName();
                        $file_path = $file_path_info . '/' . $filename;
                        $condit_1 = $file->getClientOriginalName();
                        $img = Image::make($file);
                        Storage::put($file_path, (string) $img->encode());
                    } else {
                        $filename = $this->image_file_url;
                    }
                    $attac = Attachment::where('object_id', $id)
                        ->where('object_type', 'ANNOUNCEMENT')
                        ->delete();
                    $attac = new Attachment([
                        'object_id' => $id,
                        'object_type' => 'ANNOUNCEMENT',
                        'file_name' => $filename,
                        'file_type' => $file_type,
                        'file_size' => $file_size,
                        'file_path' => $file_path,
                        'condit_1' => $condit_1,
                    ]);
                    $attac->save();
                    DB::commit();
                } catch (\Throwable $th) {
                    Storage::delete($file_path_info . '/' . $filename);
                    $this->dispatchBrowserEvent(
                        'toast',
                        [
                            'toast_type' => 'error',
                            'toast_msg' => $th->getMessage(),
                        ]
                    );
                    return;
                }
            }
            DB::commit();
            $this->edit($id);
            $this->dispatchBrowserEvent('toast', 
            [
                'toast_type' => 'success',
                'toast_msg' => 'บันทึกข้อมูลสำเร็จ',
            ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('toast', 
            [
                'toast_type' => 'error',
                'toast_msg' => $th->getmessage(),
            ]);
            DB::rollBack();
        }
    }

    public function edit($id)
    {
        $this->editid = $id;
        $this->resetValidation();
        $stmt = AnnouncementM::findOrFail($id);
        $this->announcement_id = $id;
        $this->object_type = $stmt->object_type;
        $this->announcement_header = $stmt->announcement_header;
        $this->announcement_desc = $stmt->announcement_desc;
        $this->flag = $stmt->flag;
        $this->active = $stmt->active;
        $this->audits = $stmt->audits;

        $attc = $stmt->attachment()->where('object_type', 'ANNOUNCEMENT')->first();
        if ($attc) {
            $this->image_file_url = $attc->file_name;
        }
        $this->loadData();
        $this->isEdit();
    }

    public function openDeleteModal($id)
    {
        $this->deleteid = $id;
        $this->dispatchBrowserEvent('modal-delete', []);
    }

    public function delete_modal_confirm()
    {
        try {
            $stmt = AnnouncementM::findOrFail($this->deleteid);
            $stmt->delete();
            $this->emit('builder');
            $this->dispatchBrowserEvent('toast', 
            [
                'toast_type' => 'success',
                'toast_msg' => 'ลบข้อมูลสำเร็จ',
            ]);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent('toast', 
            [
                'toast_type' => 'error',
                'toast_msg' => 'พบข้อผิดพลาด ไม่สามารถลบข้อมูลได้',
             ]);
        }
    }
}
