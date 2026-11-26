<x-main-layout>
    <div class="max-w-xl space-y-4">
        <h1 class="text-xl font-semibold text-slate-100">Create brand</h1>

        <form method="POST" action="{{ route('brands.store') }}" class="space-y-6">
            @include('brands.form', ['brand' => null, 'isEditing' => false])
        </form>
    </div>
</x-main-layout>
