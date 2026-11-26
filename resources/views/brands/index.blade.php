<x-main-layout>
    <div class="space-y-4">
        @if (session('status'))
            <div class="rounded-md border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex items-center justify-between gap-4">
            <h1 class="text-xl font-semibold text-slate-100">Brands</h1>
            <a href="{{ route('brands.create') }}" class="rounded-md bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-white">New brand</a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-slate-700/60">
            <table class="min-w-full divide-y divide-slate-700/60 text-sm text-slate-300">
                <thead class="bg-slate-800/60 text-xs uppercase tracking-wider text-slate-400">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left">ID</th>
                        <th scope="col" class="px-4 py-3 text-left">Name</th>
                        <th scope="col" class="px-4 py-3 text-left">Slug</th>
                        <th scope="col" class="px-4 py-3 text-left">Image</th>
                        <th scope="col" class="px-4 py-3 text-left">Created At</th>
                        <th scope="col" class="px-4 py-3 text-left">Updated At</th>
                        <th scope="col" class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/70">
                    @forelse ($brands as $brand)
                        <tr>
                            <td class="px-4 py-3">{{ $brand->id }}</td>
                            <td class="px-4 py-3">{{ $brand->name }}</td>
                            <td class="px-4 py-3">{{ $brand->slug }}</td>
                            <td class="px-4 py-3">{{ $brand->image }}</td>
                            <td class="px-4 py-3">{{ $brand->created_at?->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3">{{ $brand->updated_at?->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('brands.edit', $brand) }}" class="text-slate-300 hover:text-white">Edit</a>
                                    <form method="POST" action="{{ route('brands.destroy', $brand) }}" onsubmit="return confirm('Delete this brand?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-slate-500">No brands found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-main-layout>
