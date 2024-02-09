<div>
    {{-- Breadcrumb start --}}
    <nav class="flex mb-7" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a wire:navigate href="{{ route('categoriesLists') }}"
                    class="inline-flex items-center text-2xl font-bold text-gray-700 hover:text-blue-600">
                    Categories
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <div class="inline-flex items-center text-2xl font-bold text-gray-700">\</div>
                    <span class="ms-1 text-2xl font-bold text-gray-700 hover:text-blue-600 md:ms-2">Add new
                        category</span>
                </div>
            </li>

        </ol>
    </nav>
    {{-- Breadcrumb end --}}



    <form wire:submit='save'>
        <div class="flex ">
            <div class="flex-initial w-6/12  ms-80">
                <div class="mb-6">
                    <label for="first_name" class="block mb-2 text-lg font-medium text-gray-900">Category
                        name<span class="text-red-700">*</span></label>
                    <input type="text" id="first_name" wire:model='form.name'
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter category">
                        @error('form.name') <span class="text-red-700 error">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-lg font-medium text-gray-900" for="file_input">Upload
                        photo<span class="text-red-700">*</span></label>
                    <input wire:model='form.photo'
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="file_input" type="file">
                        @error('form.photo') <span class="text-red-700 error">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label for="default-checkbox" class="block mb-2 text-lg font-medium text-gray-900">Status</label>
                    <input wire:model='form.status' id="default-checkbox" type="checkbox" value="0"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-950 ms-2 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                </div>
            </div>

        </div>


        <button type="submit"
            class="ms-80 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
