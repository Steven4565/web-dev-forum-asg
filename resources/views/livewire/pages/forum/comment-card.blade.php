<?php

use function Livewire\Volt\state;
use App\Models\ForumComment;


state(['post_id', 'color', 'comment', 'vote_val', 'downvote_val', 'vote_state' => false, 'downvote_state' => false]);

state(['replybox_visible' => false, 'replies_visible' => true]);

state(['indent' => 0]);


$vote = function () {
    $this->vote_state = ! $this->vote_state;
    if ($this->vote_state == true)
        $this->vote_val++;
    else
        $this->vote_val--;

    ForumComment::where('id', '=', $this->comment->id)->increment('votes');
};

$downvote = function() {
    $this->downvote_state = ! $this->downvote_state;
    if ($this->downvote_state == true)
        $this->downvote_val++;
    else
        $this->downvote_val--;
    ForumComment::where('id', '=', $this->comment->id)->decrement('votes');
};

$toggle_replybox = function() {
    $this->replybox_visible = ! $this->replybox_visible;
};

$toggle_replies = function () {
    $this->replies_visible = ! $this->replies_visible;
};
?>

<div class="ml-[30px]">
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
                    <span class="{{$vote_state ? 'text-primary1' : 'text-black'}}">up</span>
                    <span>{{$vote_val}}</span>
                </button>
                <button class="flex gap-2" wire:click="downvote">
                    <span class="{{$downvote_state ? 'text-primary1' : 'text-black'}}">down</span>
                    <span>{{$downvote_val}}</span>
                </button>
            </div>
            <div class="flex gap-4">
                <a wire:click="toggle_replies">{{$replies_visible ? 'Hide' : 'Show'}} all replies (0)</a>
                <a wire:click="toggle_replybox">reply</a>
            </div>
        </div>
    </div>
    <div class="{{"ml-[". 30 * ($indent + 1) . "px]"}}">
        @if ($replybox_visible)
            <livewire:pages.forum.replybox :post_id="$post_id" :parent_id="$comment->id"/>
        @endif
    </div>
    <div>
        @if ($replies_visible)
            @foreach ($comment->replies as $reply)
                <livewire:pages.forum.comment-card :comment="$reply" :color="'#000000'" :vote_val="$reply->votes" :indent="$indent+1" :post_id="$post_id" :replies_visible="$indent < 2 ? true : false"/>
            @endforeach
        @endif

    </div>
</div>
