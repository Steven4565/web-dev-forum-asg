<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VoteButton extends Component
{

    public $post;
    public $isVoted;
    public $class;

    public function mount($post)
    {
        $this->post = $post;
        $this->isVoted = User::find(Auth::id())->votedPosts()->where('forum_post_id', $post->id)->exists();
    }

    public function toggleVote()
    {
        $user = User::find(Auth::id());


        if ($this->isVoted) {
            $user->votedPosts()->detach($this->post->id);

            $this->post->decrement('votes');
        } else {
            $user->votedPosts()->attach($this->post->id, ['vote' => true]);

            $this->post->increment('votes');
        }

        $this->isVoted = !$this->isVoted;
    }

    public function render()
    {
        return view('livewire.vote-button');
    }
}
