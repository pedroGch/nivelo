<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <h1>_Tus chats</h1>
    <div>
      <ul>
        @foreach ($conversation as $convoItem )
          <li>{{$convoItem['username']}} : {{$convoItem['message']}}</li>
        @endforeach
      </ul>
    </div>


    <form wire:submit="submitMessage">
      <input wire:model="message" wire:key="{{now()}}"/>
      <button type="submit">send</button>
    </form>
</div>
