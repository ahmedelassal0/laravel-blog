@if(session()->has('success'))
    <div
        id="flash"
        class="bg-blue-500 text-white right-0 bottom-3 fixed p-3 text-lh rounded">
        <p>{{session('success')}}</p>
    </div>
@endif

<script>
    setTimeout(() => {
        document.getElementById('flash').remove();
    }, 3000)
</script>
