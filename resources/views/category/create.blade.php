<x-main-layout>
    <div class="max-w-xl space-y-4">
        <h1 class="text-xl font-semibold text-slate-100">Create category</h1>

        <form method="POST" action="{{ route('categories.store') }}" class="space-y-6">
            @include('category.form', ['category' => null, 'isEditing' => false])
        </form>
    </div>
</x-main-layout>
