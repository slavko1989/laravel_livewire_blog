<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="flex w-full p-3 space-x-2">
            
            <div class="w-3/6">
                
                <span>
                    


                </span>
                <input wire:model.debounce.300ms='search' type="text" class="" placeholder="SEARCH POST...">

            </div>

            <div class="relative w-1/6">
                <select wire:model='orderBy' class="" id="">
                    <option id="id">ID</option>
                    <option id="title">Title</option>
                </select>
            </div>

            <div class="relative w-1/6">
                <select wire:model='orderAsc' class="" id="">
                    <option id="asc">ASC</option>
                    <option id="desc">DESC</option>
                </select>
            </div>

            <div class="relative w-1/6">
                <select wire:model='perPage' class="" id="">
                    <option id="10">10</option>
                    <option id="25">25</option>
                    <option id="50">50</option>
                    <option id="100">100</option>
                </select>
            </div>

        </div>

        <table class="min-w-full text-left text-sm font-light">
          <thead class="border-b font-medium">
            <tr>
              <th scope="col" class="px-6 py-4">ID</th>
              <th scope="col" class="px-6 py-4">Title</th>
              <th scope="col" class="px-6 py-4">Category</th>
              <th scope="col" class="px-6 py-4">Featured</th>
              <th scope="col" class="px-6 py-4">Created At</th>
              <th scope="col" class="px-6 py-4">Update At</th>
              <th scope="col" class="px-6 py-4">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr class="border-b">
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $post->id }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ Str::limit($post->title,40,'...') }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $post->category->name }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium">FEATURED</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $post->created_at->format('m/d/y') }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $post->updated_at->format('m/d/y') }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium">
                <a href="{{ route('posts.edit',$post) }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg></a>
                  <form method="post" action="{{ route('posts.destroy',$post) }}">
                    @csrf
                    @method('Delete')
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                        </button>
                  </form>
              </td>
            </tr>
         @endforeach
          </tbody>
        </table>

        <div class="p-2 bg-indigo">
            {{ $posts->links() }}
        </div>

    </div>
</div>
