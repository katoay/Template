<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Models\Announcement;
use Auth;

class Announcementdatatable extends LivewireDatatable
{
    protected $listeners = ['builder'];
    public $exportable = true;
    public $delete_id;

    public function builder()
    {
        //
        return Announcement::query();
    }

    public function columns()
    {
        //
        return [
            Column::callback(['flag'],function($flag){
                $res = '';
                if($flag == 1){
                    $res = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-block w-5 h-5 text-yellow-400">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>';
                }else{
                    $res = '';
                }
                return $res;
            })
                ->alignCenter()
                ->label('ปักหมุด'),
            Column::name('announcement_header')
                ->label('หัวข้อ')
                ->alignCenter()
                ->searchable(),
            Column::name('announcement_desc')
                ->label('รายละเอียด')
                ->truncate()
                ->searchable(),
            Column::callback(['active'],function($active){
                $res = '';
                if($active == 1){
                    $res = '<button class="px-2 py-1 text-sm text-blue-500 border border-blue-400 rounded-md"> active</button>';
                }else{
                    $res = '<button class="px-2 py-1 text-sm text-red-500 border border-red-400 rounded-md"> inactive </button>';
                }
                return $res;
            })
                ->alignCenter()
                ->label('สถานะ'),
            Column::callback(['announcements.announcement_id'], function ($id) {
                return view('livewire.datatables.table-actions', ['id' => $id]);
            })
            ->unsortable()
            ->label('จัดการ')
        ];
    }

    public function table_edit($id)
    {
        $this->emit('edit', $id);
    }

    public function table_delete($id)
    {
        $this->delete_id = $id;
        $this->emit('openDeleteModal', $this->delete_id);
    }
}