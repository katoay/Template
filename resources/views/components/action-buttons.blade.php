<div class="">
    <button class="px-4 py-2 text-sm font-semibold text-white bg-white border-2 border-blue-500 shadow-sm">
        SAVE
    </button>
    <button class="px-4 py-2 text-sm font-semibold text-red-500 bg-red-500 border-2 border-red-500 shadow-sm">
        CANCEL
    </button>
</div>
<div class="-mt-10 ">
    <button wire:click="store()" class="px-4 py-2 text-sm font-semibold text-white transition duration-300 ease-in-out bg-blue-500 border-2 border-blue-500 shadow-sm hover:-translate-y-2 hover:-translate-x-2 ">
        SAVE
    </button>
    <button wire:click="back()" class="px-4 py-2 text-sm font-semibold text-red-500 transition duration-300 ease-in-out bg-white border-2 border-red-500 shadow-sm hover:-translate-y-2 hover:-translate-x-2 ">
        CANCEL
    </button>
</div>