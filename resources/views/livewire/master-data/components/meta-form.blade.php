
<div class="px-2 pt-2 ">
    {{-- detail --}}
    <div class="mt-10 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-neutral-300">ข้อมูล Table Line</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        ระบุข้อมูลลงในช่องว่างที่กำหนดให้ หากพบ <span class="text-red-500 ">*</span>
                        จำเป็นต้องระบุข้อมูล
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 ">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6 dark:bg-neutral-800">
                        <div class="grid grid-cols-6 gap-6">
                            @foreach ($column as $key => $item)
                            <!--begin::Input group-->
                                @if($item['show'] == 'true')
                                    <div class="col-span-6 mt-2 sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 {{$item['require'] == 'true' ? 'required' : ''}} ">{{$item['label']}} </label>
                                        <div>
                                            @if($item['inputType'] == 'boolean')
                                            <div class="grid-container">
                                                        <div class="checkbox-rect">
                                                            <input type="checkbox" id="checkbox-rect" wire:model="metadata.{{$key}}" value="1" name="check">
                                                            <label for="checkbox-rect"></label>
                                                        </div>
                                            </div>
                                                
                                                {{-- <input type="checkbox" wire:model="metadata.{{$key}}" value="1"> --}}
                                            @elseif($item['inputType'] == 'dropdown')
                                                <select wire:model="metadata.{{$key}}" class="block w-full mt-1 mb-3 border-gray-300 rounded-md shadow-sm form-select form-control-solid mb-lg-0 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="">กรุณาเลือก</option>
                                                    @foreach ($item['option'] as $key => $select_item)
                                                    <option value="{{$key}}">{{ $select_item}}</option>
                                                    @endforeach
                                                </select>
                                            @elseif($item['inputType'] == 'textarea')
                                                <textarea class="form-control" rows="3" wire:model="metadata.{{$key}}" placeholder=""
                                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                            @else
                                                <input type="{{$item['inputType']}}" wire:model="metadata.{{$key}}"
                                                    class="mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            @endif
                                        </div>
                                        @error('metadata.'.$key) <span class="error-message">{{ $message }} </span> @enderror
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6 dark:bg-neutral-700">
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
