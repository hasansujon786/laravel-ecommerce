@csrf
@if ($isEditing)
    @method('PUT')
@endif

<div class="space-y-4">
    <div class="space-y-1">
        <label for="name" class="block text-sm font-medium text-slate-300">Name</label>
        <input id="name" name="name" type="text" autocomplete="off" value="{{ old('name', $brand?->name) }}"
            class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500 @error('name') border-red-500 @enderror">
        @error('name')
            <p class="text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-1">
        <label for="slug" class="block text-sm font-medium text-slate-300">Slug</label>
        <input id="slug" name="slug" type="text" autocomplete="off" value="{{ old('slug', $brand?->slug) }}"
            class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500 @error('slug') border-red-500 @enderror">
        @error('slug')
            <p class="text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-1">
        <label for="image" class="block text-sm font-medium text-slate-300">Image URL</label>
        <input id="image" name="image" type="text" autocomplete="off"
            value="{{ old('image', $brand?->image) }}"
            class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-500 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500 @error('image') border-red-500 @enderror">
        @error('image')
            <p class="text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex items-center gap-3">
    <button type="submit"
        class="rounded-md bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-white">
        {{ $isEditing ? 'Update brand' : 'Create brand' }}
    </button>
    <a href="{{ route('brands.index') }}" class="text-sm text-slate-400 hover:text-slate-200">Cancel</a>
</div>
