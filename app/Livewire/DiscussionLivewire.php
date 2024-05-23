<?php

namespace App\Livewire;

use App\Helpers\UserHelper;
use App\Models\Discussion;
use App\Models\DiscussionComment;
use App\Models\User;
use Livewire\Component;

class DiscussionLivewire extends Component
{
    public $id; //receive id from route
    public $discussion;
    public $newComment;
    public $allComment;

    public function fetchData() {
        $this->discussion = Discussion::find($this->id);
        $this->allComment = $this->getAllComment();
    }
    public function mount() {
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.both.forum.discussion-livewire');
    }

    // =================== CUS FUNCTION ===================
    public function likeDiscussion() {
        $discussion = $this->discussion;
        $discussion->likes += 1;
        $discussion->save();
        $this->fetchData();
    }

    public function addComment() {
        $newCmt = new DiscussionComment();
        $newCmt->content = $this->newComment;
        $newCmt->user_id = session('userId');
        $newCmt->user_name = User::where('id', session('userId'))->first()->username;
        $newCmt->discussion_id = $this->id;
        $newCmt->save();

        // count total comment
        $this->discussion->comments += 1;
        $this->discussion->save();

        // add point to user
        UserHelper::addPoint(User::find(session('userId')), 10);

        $this->fetchData();
    }

    public function getAllComment() {
        return DiscussionComment::where('discussion_id', $this->id)->get();
    }
}
