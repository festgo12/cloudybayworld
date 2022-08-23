<div class="favorite-list-item">
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        style="background-image: url('{{ asset('/assets/uploads/'.config('chat.user_avatar.folder').'/'.$user->avatar) }}');">
    </div>
    <p>{{ strlen($user->username) > 5 ? substr($user->username,0,6).'..' : $user->username }}</p>
</div>
