<?php

use function Livewire\Volt\state;
use function Livewire\Volt\{mount};
use App\Models\ForumComment;


# Requierd fields
state(['post_id', 'color', 'comment']);

# Reply states
state(['replybox_visible' => false, 'replies_visible' => true, 'reply_count' => 0]);

# Vote states
state(['vote_val' => 0, 'downvote_val' => 0, 'vote_option' => 0]);

# Depth state
state(['indent' => 0,]);

mount(function() {
    # TODO:
    $this->vote_val = $this->comment->votes;
    $this->downvote_val = $this->comment->votes;
    $this->reply_count = $this->comment->reply_count;
});

$updateDatabase = function ($val) {
    ForumComment::find($this->comment->id)->voters()->updateExistingPivot($this->comment->id, [
        'vote_value' => \DB::raw($val)
    ]);
};

$vote = function () {

    if ($this->vote_option == 1) {
        $this->vote_option = 0;
        $this->updateDatabase(0);

        $this->vote_val -= 1;
    } else if ($this->vote_option == -1) {
        $this->vote_option = 1;
        $this->updateDatabase(1);

        $this->vote_val += 1;
        $this->downvote_val -= 1;
    } else {
        $this->vote_option = 1;
        $this->updateDatabase(1);

        $this->vote_val += 1;
    }

};

$downvote = function() {
    if ($this->vote_option == -1) {
        $this->vote_option = 0;
        $this->updateDatabase(0);

        $this->downvote_val -= 1;
    } else if ($this->vote_option == 1) {
        $this->vote_option = -1;
        $this->updateDatabase(-1);

        $this->vote_val -= 1;
        $this->downvote_val += 1;
    } else {
        $this->vote_option = -1;
        $this->updateDatabase(-1);

        $this->downvote_val += 1;
    }
};

$toggle_replybox = function() {
    $this->replybox_visible = ! $this->replybox_visible;
};

$toggle_replies = function () {
    $this->replies_visible = ! $this->replies_visible;
};
?>

<div class="{{$indent == 0 ? '' : 'ml-[30px]'}}">
    <div class="border-l-8 border-black p-5 shadow-md rounded-sm mb-5">
        <div class="flex gap-2 items-center">
            <img src="https://cdn.pixabay.com/photo/2024/02/28/07/42/european-shorthair-8601492_640.jpg" alt="" class="w-5 h-5 rounded-full">
            <h4 class="h4">{{"@" . $comment->author->name}}</h4>
        </div>
        <h2 class="h2 font-bold text-2xl">{{$comment->title}}</h2>
        <p class="p">{{$comment->content}}</p>

        <div class="flex justify-between w-full gap-4">
            <div class="flex gap-4 ">
                <button class="flex gap-2" wire:click="vote">
                    <span class="{{$vote_option == 1 ? 'text-primary1' : 'text-black'}}">up</span>
                    <span>{{$vote_val}}</span>
                </button>
                <button class="flex gap-2" wire:click="downvote">
                    <span class="{{$vote_option == -1? 'text-primary1' : 'text-black'}}">down</span>
                    <span>{{$downvote_val}}</span>
                </button>
            </div>
            <div class="flex gap-4">
                <a wire:click="toggle_replies" class="{{$reply_count > 0 ? "inline-block" : "hidden"}}">{{$replies_visible ? 'Hide' : 'Show'}} all replies ({{$reply_count}})</a>
                <a wire:click="toggle_replybox">reply</a>
            </div>
        </div>
    </div>
    <div class="{{"ml-[". 30 * ($indent + 1) . "px]"}}">
        @if ($replybox_visible)
            <livewire:pages.forum.replybox :post_id="$post_id" :parent_id="$comment->id"/>
        @endif
    </div>
    <div class="{{$replies_visible ? "block" : "hidden"}}">
        @foreach ($comment->replies as $reply)
            <livewire:pages.forum.comment-card :comment="$reply" :color="'#000000'" :vote_val="$reply->votes" :indent="$indent+1" :post_id="$post_id" :replies_visible="$indent < 2 ? true : false" :reply_count="$reply->reply_count"/>
        @endforeach

    </div>
</div>
