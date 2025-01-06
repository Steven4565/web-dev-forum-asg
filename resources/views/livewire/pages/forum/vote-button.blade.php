<?php

    use function Livewire\Volt\state;
    use function Livewire\Volt\{mount};
    use App\Models\ForumPost;
    use App\Models\User;

    state(['isVoted', 'post', 'class']);

    mount(function (ForumPost $post)  {
        $this->post = $post;
        if (Auth::user())
        $this->isVoted = User::find(Auth::id())->votedPosts()->where('forum_post_id', $post->id)->exists();
    });


    $toggleVote = function () {
        $user = User::find(Auth::id());


        if ($this->isVoted) {
            $user->votedPosts()->detach($this->post->id);

            $this->post->decrement('votes');
        } else {
            $user->votedPosts()->attach($this->post->id, ['vote' => true]);

            $this->post->increment('votes');
        }

        $this->isVoted = !$this->isVoted;
    };

?>

<button
    wire:click="toggleVote"
    class="btn text-primary1 py-2 px-5 font-bold bg-primary2 {{ $class ?? '' }}">
    {{ $isVoted ? 'Unvote' : 'Vote' }}
</button>
