<header class="mx-6 mt-5 px-5 py-2.5 rounded-2xl bg-[#0e1424]/90 backdrop-blur-md border border-slate-800/80 shadow-lg shadow-black/20 flex items-center justify-between select-none">
    <!-- Left Area (Mobile toggle or breadcrumb) -->
    <div class="flex items-center gap-3">
        <button type="button"
            class="md:hidden p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/60 transition-colors"
            onclick="document.getElementById('sidebar')?.classList.toggle('hidden')">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Right Controls -->
    <div class="flex items-center gap-4">
        <!-- Search Trigger Box -->
        <div class="flex items-center gap-3 px-3.5 py-1.5 rounded-xl bg-[#141b2d] border border-slate-700/60 hover:border-slate-500/80 transition-all duration-150 cursor-pointer group shadow-inner">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-300 transition-colors shrink-0"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <div class="flex flex-col text-left leading-tight pr-1">
                <span class="text-xs font-semibold text-slate-200">Search</span>
                <span class="text-[10px] text-slate-400 tracking-wide">anything...</span>
            </div>
            <kbd class="ml-1 px-1.5 py-0.5 text-[10px] font-medium tracking-wide text-slate-400 bg-slate-800/90 border border-slate-700/60 rounded shadow-sm">
                ⌘K
            </kbd>
        </div>

        <!-- Glowing Status / Notification Dot -->
        <div class="flex items-center justify-center px-1">
            <span class="w-2.5 h-2.5 rounded-full bg-indigo-500 shadow-[0_0_8px_#6366f1]"></span>
        </div>

        <!-- User Profile Avatar Button -->
        <div class="w-10 h-10 rounded-xl bg-[#141b2d] border border-slate-700/60 hover:border-slate-500/80 flex items-center justify-center text-sm font-bold text-white shadow-sm transition-all duration-150 cursor-pointer">
            G'
        </div>
    </div>
</header>
