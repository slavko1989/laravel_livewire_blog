<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <x-slot name='nav'>
        <div class="space-x-4">
            <x-nav-link href="{{ route('tags.index') }}" :active="request()->routeIs('tags.index')">
                {{ __('Index') }}
            </x-nav-link>

            <x-nav-link href="{{ route('tags.create') }}" :active="request()->routeIs('tags.create')">
                        {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
            	<form action="{{ route('tags.update',$tag) }}" method="post">
                    @csrf
                    @method('PUT')
                    

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" 
                        :value="$tag->name" required autofocus autocomplete="name" />
                        <span class="text-xs text-gray-400">Maximum 18 characters</span>
                        <x-input-error for="name" class="mt-2" />
                    </div>
                    <br>
                    <x-button class="ml-4">
                    {{ __('Update') }}
                    </x-button>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>