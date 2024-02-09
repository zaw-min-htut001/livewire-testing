<div>
    <div>
        {{-- Breadcrumb start --}}
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-3xl font-bold ms-2  text-blue-950 hover:text-blue-600">
                        Categories
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb end --}}

        {{-- Add new start --}}
        <div class="flex flex-row-reverse items-center ">
            <div class="flex float-right items-center ">
                <a wire:navigate href="{{ route('categoriesAdd')}}"
                    class="flex items-center text-3xl font-bold ms-2 mb-5 text-blue-950 hover:text-blue-600">
                    <button type="button"
                        class="flex items-center  px-5 py-2.5 text-lg font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3 h-3 me-3 text-gray-800  dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                        Add category
                    </button>
                </a>
            </div>
        </div>
        {{-- Add new end --}}
        <x-auth-session-status class="mb-4 text-2xl" :status="session('status')" />
        {{-- table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="pb-4 bg-white dark:bg-gray-900">

            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            is-publish
                        </th>

                    </tr>
                </thead>
                <tbody>
                   @foreach ($categories as $category)
                       <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <a wire:navigate href="{{ route('categoriesEdit' ,$category->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> |
                                <button type="button" wire:click="delete({{$category->id}})"
                                    wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Delete
                                </button>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{ $loop->iteration }}
                            </th>

                            </td>
                            <td class="px-6 py-4">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" {{ $category->status === 1 ? 'checked' : ''}} >
                                        <div
                                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </div>
                            </td>
                        </tr>
                   @endforeach
               </tbody>
            </table>

        </div>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>
