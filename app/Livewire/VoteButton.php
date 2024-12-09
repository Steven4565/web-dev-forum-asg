<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VoteButton extends Component
{

    public $post;    // The forum post being voted on
    public $isVoted; // Tracks whether the user has voted on this post

    public function mount($post)
    {
        $this->post = $post;
        $this->isVoted = Auth::user()
            ->votedPosts()
            ->where('forum_post_id', $post->id)
            ->exists(); // Check if the user already voted
    }

    public function toggleVote()
{
    $user = Auth::user(); // Get the authenticated user

    if ($this->isVoted) {
        // User is unvoting
        $user->votedPosts()->detach($this->post->id);

        // Decrease the vote count
        $this->post->decrement('votes');
    } else {
        // User is voting
        $user->votedPosts()->attach($this->post->id, ['vote' => true]);

        // Increase the vote count
        $this->post->increment('votes');
    }

    $this->isVoted = !$this->isVoted; // Toggle the state
}

    public function render()
    {
        return view('livewire.vote-button');
    }


}
