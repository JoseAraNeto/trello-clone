<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $boards = $request->user()->boards()->latest()->get();

        return view('boards.index', compact('boards'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request->user()->boards()->create($validated);

        return redirect()->route('boards.index');
    }

    public function destroy(Request $request, Board $board)
    {
        abort_unless($board->user_id === $request->user()->id, 403);

        $board->delete();

        return redirect()->route('boards.index');
    }
}
