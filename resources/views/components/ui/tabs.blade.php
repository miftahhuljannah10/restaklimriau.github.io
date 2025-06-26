<div x-data='{"tab": "{{ $tabs[0]['key'] }}", "tabs": @json($tabs) }'>
    <div class="flex gap-4 border-b border-slate-200 mb-6">
        <template x-for="t in tabs" :key="t.key">
            <button @click="tab = t.key"
                :class="tab === t.key ? 'border-b-2 border-sky-500 text-sky-600 font-bold' : 'text-slate-500'"
                class="px-4 py-2 focus:outline-none transition-all"
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
