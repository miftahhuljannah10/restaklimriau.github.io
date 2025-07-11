<div class="flex space-x-2">
    <a href="{{ route('admin.feedback.responses.show', $response) }}"
        class="inline-flex items-center px-3 py-1 border border-blue-500 rounded-md text-sm font-medium text-blue-600 hover:bg-blue-50 transition-colors duration-150">
        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
            </path>
        </svg>
        Detail
    </a>
    <button onclick="deleteResponse({{ $response->id }})"
        class="inline-flex items-center px-3 py-1 border border-red-500 rounded-md text-sm font-medium text-red-600 hover:bg-red-50 transition-colors duration-150">
        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
            </path>
        </svg>
        Hapus
    </button>
</div>
