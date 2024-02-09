<div>
    {{-- Breadcrumb start --}}
    <nav class="flex mb-7" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a wire:navigate.hover href="{{ route('itemLists') }}"
                    class="inline-flex items-center text-2xl font-bold text-gray-700 hover:text-blue-600">
                    Item
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <div class="inline-flex items-center text-2xl font-bold text-gray-700">\</div>
                    <span class="ms-1 text-2xl font-bold text-gray-700 hover:text-blue-600 md:ms-2">Add new item</span>
                </div>
            </li>

        </ol>
    </nav>
    {{-- Breadcrumb end --}}


    <form wire:submit.prevent='save'>
        <div class="flex ">
            <div class="flex-initial w-6/12  me-10">
                <div class="mb-6">
                    <label for="first_name" class="block mb-2 text-lg font-medium text-gray-900">Item
                        name<span class="text-red-700">*</span></label>
                    <input type="text" id="first_name" wire:model="form.item_name"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter item">
                    <div>
                        @error('form.item_name')
                            <span class="text-red-700 error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="category_name" class="block mb-2 text-lg font-medium text-gray-900">Category
                        name<span class="text-red-700">*</span></label>
                    <select id="category_name" wire:model="form.category_id"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('form.category_id')
                            <span class="text-red-700 error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="price" class="block mb-2 text-lg font-medium text-gray-900">Price<span
                            class="text-red-700">*</span></label>
                    <input type="number" id="price" wire:model="form.price"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="$">
                    <div>
                        @error('form.price')
                            <span class="text-red-700 error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <div wire:ignore>
                        <label for="description" class="block mb-2 text-lg font-medium text-gray-900">Description<span
                                class="text-red-700">*</span></label>
                        <div id="editor" wire:model="form.description"></div>
                    </div>

                    <div>
                        @error('form.description')
                            <span class="text-red-700 error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="item_condition" class="block mb-2 text-lg font-medium text-gray-900">Item
                        condition</label>
                    <select id="item_condition" wire:model="form.item_condition"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a category</option>
                        @foreach (config('enum.item_condition') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="item_type" class="block mb-2 text-lg font-medium text-gray-900">Item type</label>
                    <select id="item_type" wire:model="form.item_type"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a category</option>
                        @foreach (config('enum.item_type') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="default-checkbox" class="block mb-2 text-lg font-medium text-gray-900">Status</label>
                    <input id="default-checkbox" type="checkbox" value="" wire:model="form.status"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-950 ms-2 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-lg font-medium text-gray-900" for="file_input">Upload
                        photo<span class="text-red-700">*</span></label>
                    <input
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="file_input" type="file" wire:model="form.photo">

                    <div>
                        @error('form.photo')
                            <span class="text-red-700 error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex-initial w-6/12 ">
                <div class="mb-6">
                    <label for="owner_name" class="block mb-2 text-lg font-medium text-gray-900">Owner
                        name<span class="text-red-700">*</span></label>
                    <input type="text" id="owner_name" wire:model="form.owner_name"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John">
                    <div>
                        @error('form.owner_name')
                            <span class="text-red-700 error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-6" wire:ignore>
                    <label for="phone" class="block mb-2 text-lg font-medium text-gray-900">Phone number</label>
                    <input type="tel" placeholder="" id="phone" wire:model="form.contact"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="address" class="block mb-2 text-lg font-medium text-gray-900">Address</label>
                    <textarea wire:model="form.address" id="address" name="address"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        cols="30" rows="5" placeholder="Please set your address(optional!)"></textarea>
                </div>
                <div class="mb-6 sticky" wire:ignore>
                    <div id="map" style="height: 480px; width: 100%;"></div>
                    <input type="hidden" wire:model="form.latitude">
                    <input type="hidden" wire:model="form.longitude">
                </div>
            </div>
        </div>


        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>

@assets
{{-- Map --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
{{-- ckeditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
{{-- Tele --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endassets

@script
<script>
        ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
        editor.model.document.on('change:data', () => {
        @this.set('form.description', editor.getData());
        })
        })
        .catch(error => {
        console.error(error);
        });

        const input = document.querySelector("#phone");
        window.intlTelInput(input, {
        initialCountry: "MM",
        showSelectedDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        });

        var map = L.map('map').setView([16.909714, 96.13499], 8);

        var marker = L.marker([16.909714, 96.13499]).addTo(map);
        marker.bindPopup("<b>Please set your address(optional!)").openPopup();

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        function onMapClick(e) {
        @this.set('form.latitude', e.latlng.lat);
        @this.set('form.longitude', e.latlng.lng);
        console.log(e.latlng);

        // Set the map view to the clicked coordinates with an adjusted zoom level
        map.setView(e.latlng, 15); // You can adjust the zoom level as needed

        // Move the marker to the clicked coordinates
        marker.setLatLng(e.latlng);
        }

        map.on('click', onMapClick);
</script>
@endscript
