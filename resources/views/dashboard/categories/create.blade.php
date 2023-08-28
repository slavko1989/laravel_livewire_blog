<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <x-slot name='nav'>
        <div class="space-x-4">
            <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                {{ __('Index') }}
            </x-nav-link>

            <x-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
                        {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
            	<form action="{{ route('categories.store') }}" method="post">
                    @csrf
                      
                      <div>
                        <small class="mb-4 text-gray-500">Note: Select Parent only for Category</small>
                        <select name="parent_id" class="w-full mb-6">
                            <option value="">Select Parent category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <span class="text-xs text-gray-400">Maximum 18 characters</span>
                        <x-input-error for="name" class="mt-2" />
                    </div>
                    <br>
                    <x-button class="ml-4">
                    {{ __('Create') }}
                    </x-button>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>