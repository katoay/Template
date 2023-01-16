<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{-- <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg dark:bg-neutral-900"> --}}
            {{-- <div
                class="p-6 bg-white border-b border-gray-200 sm:px-20 dark:bg-neutral-800 dark:border-neutral-600"> --}}
                <div class="flex justify-between w-full pb-2 flex-nowrap">
                    <div>
                        {{-- Left --}}
                    </div>
                    <div>
                        {{-- Center --}}
                    </div>
                    <div>
                        {{-- Right --}}
                        {{-- Action Button --}}
                        @if(!$isForm)
                        <x-create-buttons />
                        @else
                        <x-action-buttons />
                        @endif
                        {{-- Action Button --}}
                    </div>
                </div>
                <x-alert-box />

                <div x-data="{ open: false }">
                    <div x-show="!$wire.isForm" style="@if($isForm) display: none; @endif">
                        {{-- Datatables --}}
                        <livewire:tables.announcementdatatable />
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <div x-show="$wire.isForm" style="@if(!$isForm) display: none; @endif">
                        {{-- Form --}}
                        @include('livewire.master-data.announcement._form')
                    </div>
                </div>

                {{--
            </div> --}}
            {{-- </div> --}}
    </div>
</div>
@push('scripts')
<script>
</script>
@endpush