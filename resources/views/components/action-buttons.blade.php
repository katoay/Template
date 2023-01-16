<div class="relative">
    <div class="absolute ">
        <button wire:click="store()" class="px-4 py-2 text-sm font-semibold text-white transition duration-300 ease-in-out bg-blue-500 border border-blue-500 shadow-sm hover:-translate-y-2 hover:-translate-x-2 ">
            SAVE
        </button>
        <button wire:click="back()" class="px-4 py-2 text-sm font-semibold text-red-500 transition duration-300 ease-in-out bg-white border border-red-500 shadow-sm hover:-translate-y-2 hover:-translate-x-2 dark:border-white">
            CANCEL
        </button>
    </div>
    <button class="px-4 py-2 text-sm font-semibold text-white bg-white border border-blue-500 shadow-sm dark:border-white">
        SAVE
    </button>
    <button class="px-4 py-2 text-sm font-semibold text-red-500 bg-red-500 border border-red-500 shadow-sm">
        CANCEL
    </button>
</div>