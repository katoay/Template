<div class="px-2 pt-2 ">
    {{-- detail --}}
    <div class="mt-10 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-neutral-300">ข้อมูลข่าวสารและประกาศ</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 ">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6 dark:bg-neutral-800">
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <label class="py-4 block text-sm font-medium text-gray-900 dark:text-neutral-300 ">
                                    หัวข้อ 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                </label>
                                <div class="pl-4 text-xs dark:text-neutral-400">
                                    {{$announcement_header ?? ''}}
                                </div>
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <label class="py-4 block text-sm font-medium text-gray-900 dark:text-neutral-300 ">
                                    รายละเอียด 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>

                                </label>
                                <div class="pl-4  text-xs dark:text-neutral-400">
                                    {{$announcement_desc ?? ''}}
                                </div>
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                IMAGE
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