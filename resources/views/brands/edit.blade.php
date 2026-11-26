<x-main-layout>
    <div class="max-w-xl space-y-4">
        <h1 class="text-xl font-semibold text-slate-100">Edit brand</h1>

        <form method="POST" action="{{ route('brands.update', $brand) }}" class="space-y-6">
            @include('brands.form', ['brand' => $brand, 'isEditing' => true])
        </form>
    </div>
</x-main-layout>
