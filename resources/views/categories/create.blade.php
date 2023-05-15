<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Category
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ @route('categories.store') }}" method="POST">
                        @csrf
                        <div class="overflow-hidden shadow sm:rounded-md w-1/2">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name"
                                               class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="first-name" autocomplete="given-name"
                                               class="mt-1 block w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last-name"
                                               class="block text-sm font-medium text-gray-700">icon</label>
                                        <input type="text" name="icon" id="last-name" autocomplete="family-name"
                                               class="mt-1 block w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="image"
                                               class="block text-sm font-medium text-gray-700">image</label>
                                        <input type="file" name="image" id="last-name" 
                                               class="mt-1 block w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center rounded-md border  bg-indigo-600 py-2 px-4 text-sm font-medium text-white">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
