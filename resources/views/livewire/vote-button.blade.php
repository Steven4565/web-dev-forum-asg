<button 
    wire:click="toggleVote" 
    class="btn text-primary1 py-2 px-5 font-bold bg-primary2 {{ $class ?? '' }}">
    {{ $isVoted ? 'Unvote' : 'Vote' }}
</button>
