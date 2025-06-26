<div x-data='{"tab": "{{ $tabs[0]['key'] }}", "tabs": @json($tabs) }'>
    <div class="flex justify-center gap-2 mb-10 border-b-2 border-slate-200">
        <template x-for="t in tabs" :key="t.key">
            <button @click="tab = t.key"
                :class="tab === t.key ? 'relative text-sky-600 font-bold after:absolute after:left-0 after:bottom-0 after:w-full after:h-1.5 after:bg-gradient-to-r after:from-sky-400 after:to-cyan-400 after:rounded-t-lg' : 'text-slate-500 hover:text-sky-500'"
                class="px-7 py-3 bg-transparent border-0 outline-none font-montserrat text-lg transition-all duration-200 focus:outline-none"
                style="position:relative;"
                x-text="t.label">
            </button>
        </template>
    </div>
    <template x-for="t in tabs" :key="t.key">
        <div x-show="tab === t.key">
            <template x-if="t.slot">
                <div x-html="t.slot"></div>
            </template>
        </div>
    </template>
</div>
