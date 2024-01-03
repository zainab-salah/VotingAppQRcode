<?php

namespace App\Http\Controllers;

 
use App\Models\Vote; // Make sure to import the Vote model at the top of the file
use Illuminate\Http\Request;
class VoteController extends Controller
{
// app/Http/Controllers/VoteController.php

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
                return redirect()->back()->with('error', 'You have already voted.');
            }

            Vote::create($data);

            return redirect()->back()->with('success', 'Vote submitted successfully.');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->with('error', 'Error submitting vote: ' . $e->getMessage());
        }
    }

}
