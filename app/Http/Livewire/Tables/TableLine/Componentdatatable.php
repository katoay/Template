<?php

namespace App\Http\Livewire\Tables\TableLine;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Models\TableLine;

class Componentdatatable extends LivewireDatatable
{
    public $table_id,$table_column,$table_option;
    public $active;
    public $delete_id;
    protected $listeners = ['builder','table_search'];
    protected $queryString = ['active'];

    public function builder()
    {
        //
        $stmt = TableLine::query();
        // ->where('table_id',$this->table_id);

        // dd($stmt->get());
        if($this->active == '1'){
            $stmt->where('table_lines.logic_1','=','1');
        }else if($this->active == '0'){
            $stmt->where('table_lines.logic_1','=','0');
        }else{
            
        }
        // dd($stmt->get());
        $stmt->get();
        return $stmt;
    }

    public function columns()
    {
        //
        $table_column = $this->table_column;
        $retrunColumn = array();
        foreach ($table_column as $key => $item) {
            // dd($item['label']);
            $label = $item['label'];
            $show = $item['show'];
            $inputType = $item['inputType'];
            if($show == 'true')
            {
                if($inputType == 'boolean')
                {
                    $retrunColumn[] = Column::callback($key,function($key){
                        $res = '';
                        if($key == 1){
                            $res = '<button class="px-2 py-1 text-sm text-blue-500 border border-blue-400 rounded-md"> active</button>';
                        }else{
                            $res = '<button class="px-2 py-1 text-sm text-red-500 border border-red-400 rounded-md"> inactive </button>';
                        }
                        return $res;
                    })
                    ->alignCenter()
                    ->unsortable()
                    ->label("$label ");
                    continue;
                }elseif($inputType == 'dropdown'){
                    $this->table_option = $item['option'];
                    $retrunColumn[] = Column::callback([$key],function($key){
                        $res = '';
                        foreach ($this->table_option as $key_option => $item_option) {
                            Debugbar::info($item_option);
                            if($key == $key_option){
                                $res = $item_option;
                            }
                        }
                        return $res;
                    })->alignCenter();
                    continue;
                }
                $retrunColumn[] = Column::name("$key")
                ->label("$label ")
                ->searchable();
            }
        }
        // action
        $retrunColumn[] = Column::callback(['table_line_id'], function ($id) {
            return view('livewire.datatables.table-actions', ['id' => $id]);
        })
            ->alignCenter()
            ->unsortable()
            ->label('จัดการ');
        return $retrunColumn;
    }

    public function table_search($active)
    {
        $this->active = $active;
    }

    public function table_edit($id)
    {
        $this->emit('edit', $id);
    }

    public function table_delete($id)
    {
        $this->delete_id = $id;
        $this->emit('openDeleteModal', $this->delete_id );
    }
}