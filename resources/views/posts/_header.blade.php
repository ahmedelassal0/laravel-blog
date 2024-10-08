<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="font-semibold space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="w-48 relative flex flex-col p-2 lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-category-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="{{route('home')}}">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>

<script>
    let categoryToggle = document.getElementById('categoryToggle');
    let categories = document.querySelector('#categoryToggle + div');
    categoryToggle.addEventListener('click', () => {
        categories.classList.toggle('hidden');
    })

</script>
