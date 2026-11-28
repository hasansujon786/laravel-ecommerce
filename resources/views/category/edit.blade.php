<x-main-layout>
    <div class="max-w-xl space-y-4">
        <h1 class="text-xl font-semibold text-slate-100">Edit category</h1>

        <form method="POST" action="{{ route('categories.update', $category) }}" class="space-y-6">
            @include('category.form', ['category' => $category, 'isEditing' => true])
        </form>
    </div>
</x-main-layout>
