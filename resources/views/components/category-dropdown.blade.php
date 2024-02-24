<div>
    <x-dropdown>
        <x-slot name="trigger">
            <button class="font-semibold w-full"
                    id="categoryToggle">{{ isset($currentCategory)? $currentCategory->name: 'All categories' }}</button>
        </x-slot>

        <x-slot name="links">
            <x-dropdown-link
                    href="/"
                    :active='request("category") === null'
            >
                category
            </x-dropdown-link>
            @foreach($categories as $category)
                <x-dropdown-link
                        :active='request("category") === $category->slug'
                        href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}"
                >
                    {{$category->name}}
                </x-dropdown-link>
            @endforeach
        </x-slot>
    </x-dropdown>
</div>
