<div class="px-2 pt-2 ">
    {{-- detail --}}
    <div class="mt-10 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-neutral-300">ข้อมูลข่าวสารและประกาศ</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        ระบุข้อมูลลงในช่องว่างที่กำหนดให้ หากพบ <span class="text-red-500 ">*</span>
                        จำเป็นต้องระบุข้อมูล
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 ">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6 dark:bg-neutral-800">
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 ">หัวข้อ <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="announcement_header"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('announcement_header') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 ">รายละเอียด <span class="text-red-500">*</span></label>
                                <textarea rows="3" wire:model.defer="announcement_desc"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="">
                                </textarea>
                                @error('announcement_desc') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 required">ปักหมุด</label>
                                <div class="checkbox-rect">
                                    <input type="checkbox" id="checkbox-rect" wire:model="flag" value="1" name="check">
                                    <label for="checkbox-rect"></label>
                                </div>
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 required">ใช่งาน / ไม่ใช่งาน</label>
                                <div class="checkbox-rect">
                                    <input type="checkbox" id="checkbox-rect" wire:model="active" value="1" name="check">
                                    <label for="checkbox-rect"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6 dark:bg-neutral-700">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>