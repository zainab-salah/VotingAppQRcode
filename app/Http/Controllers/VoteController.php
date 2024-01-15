<?php

namespace App\Http\Controllers;

 
use App\Models\Vote;
use Illuminate\Http\Request;
class VoteController extends Controller
{

public function showForm()
{
    return view('vote.form');
}

 
public function submitVote(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|exists:users,id',
                'vote_number' => 'required|integer',
            ]);

            $existingVote = Vote::where('user_id', $data['user_id'])->first();
            if ($existingVote) {
                return redirect()->back()->with('error', 'لقد قمت بالتصويت بالفعل');
            }

            Vote::create($data);

            return redirect()->back()->with('success', 'Vote submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error submitting vote: ' . $e->getMessage());
        }
    }

}
