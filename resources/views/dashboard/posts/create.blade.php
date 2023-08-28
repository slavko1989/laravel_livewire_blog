<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <x-slot name='nav'>
        <div class="space-x-4">
            <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                {{ __('Index') }}
            </x-nav-link>

            <x-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                        {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
            	<x-form action="{{ route('posts.store') }}" method="post" has-files>
                    @csrf
                   <div class="space-y-6">   
                    <div>
                        <x-label for="title" value="{{ __('Title') }}" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                        <span class="text-xs text-gray-400">Maximum 18 characters</span>
                        <x-input-error for="title" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="body" value="{{ __('Body') }}" />
                        <x-trix name="body" styling="overflow-y-scroll h-80"></x-trix>
                        
                        <x-input-error for="body" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="cover_image" value="{{ __('Cover Image') }}" />
                        <x-input id="cover_image" class="block mt-1 w-full" type="file" name="cover_image" :value="old('cover_image')" required autofocus autocomplete="cover_image" />
                        <span class="text-xs text-gray-400">File type:jpg,png,gif only</span>
                        <x-input-error for="cover_image" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="published_at" value="{{ __('Schedule data') }}" /><br>
                        <x-pikaday name="published_at"/>
                    </div>

                    <div>
                        <x-label for="meta_desription" value="{{ __('Meta desc') }}" />
                        <x-trix name="meta_desription" styling="overflow-y-scroll h-42"></x-trix>
                        
                        <x-input-error for="body" class="mt-2" />
                    </div>

                     <div>
                        <x-label for="category_id" value="{{ __('Categories') }}" /><br>
                        <select name="category_id">
                            <option>Please select a category</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                     <x-tags :tags=$tags></x-tags>


                </div>
                    <br>
                    <x-button class="ml-4">
                    {{ __('Create') }}
                    </x-button>
                </x-form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>