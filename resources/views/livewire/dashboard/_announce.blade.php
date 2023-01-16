<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white dark:bg-gray-700 sm:rounded-lg ">
        {{-- <x-jet-welcome /> --}}
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="inline-block w-5 h-5 dark:text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            หัวข้อ
                        </th>
                        <th scope="col" class="px-6 py-3">
                            รายละเอียด
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($announcement as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row" class="px-4 py-3 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($item->flag == 0)
                                  
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="inline-block w-5 h-5 text-yellow-400">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{$item->announcement_header ?? ''}}
                            </td>
                            <td class="px-6 py-4">
                                <button wire:click="detail({{$item->announcement_id}})" class="hover:text-blue-600 dark:hover:text-red-600">
                                    ดูรายละเอียดเพิ่มเติม...
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                                    </svg>
                                </button>
                                {{-- {{$item->announcement_desc ?? ''}} --}}
                            </td>
                        @empty
                            <td colspan="3" class="px-6 py-4 ">
                                ไม่พบข้อมูล
                            </td>
                        </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>