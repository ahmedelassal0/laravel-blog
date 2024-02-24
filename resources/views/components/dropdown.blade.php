{{-- Trigger --}}
{{ $trigger }}
{{-- Links --}}
<div class="overflow-auto max-h-64 hidden absolute rounded-lg bg-gray-100 flex flex-col mt-12 p-3 text-left">
    {{ $links }}
</div>
<script>
    let categoryToggle = document.getElementById('categoryToggle');
    let categories = document.querySelector('#categoryToggle + div');
    categoryToggle.addEventListener('click', () => {
        categories.classList.toggle('hidden');
    })
</script>
