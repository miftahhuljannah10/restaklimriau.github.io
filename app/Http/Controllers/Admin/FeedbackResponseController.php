<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FeedbackResponseController extends Controller
{
    public function index()
    {
        $responses = FeedbackResponse::with(['answers.question'])
            ->latest()
            ->paginate(10);
        return view('admin.feedback.responses.index', compact('responses'));
    }

    public function show(FeedbackResponse $response)
    {
        $response->load('answers.question');
        return view('admin.feedback.responses.show', compact('response'));
    }

    public function destroy(FeedbackResponse $response)
    {
        $response->delete();
        return redirect()->route('admin.feedback.responses.index')
            ->with('success', 'Feedback response deleted successfully');
    }

    public function bulkDelete(Request $request)
    {
        dd($request->all());
        // Debug logging
        Log::info('Bulk delete request received', [
            'request_data' => $request->all(),
            'ids_raw' => $request->ids
        ]);

        $ids = json_decode($request->ids, true);

        Log::info('Decoded IDs', ['ids' => $ids]);

        if (empty($ids) || !is_array($ids)) {
            Log::warning('No valid IDs provided for bulk delete');
            return redirect()->route('admin.feedback.responses.index')
                ->with('error', 'Tidak ada data yang dipilih untuk dihapus.');
        }

        try {
            $deletedCount = FeedbackResponse::whereIn('id', $ids)->delete();

            Log::info('Bulk delete successful', [
                'requested_ids' => $ids,
                'deleted_count' => $deletedCount
            ]);

            return redirect()->route('admin.feedback.responses.index')
                ->with('success', $deletedCount . ' feedback berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Bulk delete failed', [
                'ids' => $ids,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('admin.feedback.responses.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function truncate(Request $request)
    {
        try {
            // Use transaction for safety
            DB::transaction(function () {
                // First, delete all feedback answers (foreign key constraint)
                DB::table('feedback_answers')->delete();
                // Then delete all feedback responses
                DB::table('feedback_responses')->delete();

                // Reset auto-increment to 1 for both tables
                DB::statement('ALTER TABLE feedback_answers AUTO_INCREMENT = 1');
                DB::statement('ALTER TABLE feedback_responses AUTO_INCREMENT = 1');
            });

            return redirect()->route('admin.feedback.responses.index')
                ->with('success', 'Semua data feedback berhasil dihapus dan ID direset.');
        } catch (\Exception $e) {
            return redirect()->route('admin.feedback.responses.index')
                ->with('error', 'Gagal menghapus semua data: ' . $e->getMessage());
        }
    }
}
