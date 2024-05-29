<?php

namespace App\Livewire;

use App\Helpers\UserHelper;
use App\Models\Category;
use Livewire\Component;
use App\Models\User;
use App\Models\Discussion;

class ForumLivewire extends Component
{
    public $user;

    public $categories = [];

    public $discussion_list = [];

    // create discussion
    public $discussion_title;
    public $discussion_content;
    public $disscussion_category_id;
    public $disscussion_class;
    public $disscussion_like;
    public $disscussion_comment;


    public function fetchData() {
        $this->user = User::find(session('userId'));

        $this->categories = $this->getAllCategory();
        $this->discussion_list = $this->getAllDiscussion();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.both.forum.forum-livewire');
    }

    // ==================== CUSTOM FUNC ====================
    public function refreshModel() {
        $this->discussion_title = "";
        $this->discussion_content = "";
        $this->disscussion_category_id = 0;
        $this->disscussion_class = "0";
        $this->disscussion_like = 0;
        $this->disscussion_comment = 0;
    }

    public function getAllCategory() {
        return Category::all();
    }

    public function addDiscussion() {
        if ($this->disscussion_class == 0) {
            // show error
            session()->flash("error", "Please select class");
            return;
        }
        if ($this->disscussion_category_id == 0) {
            // show error
            session()->flash("error", "Please select category");
            return;
        }

        $discussion = new Discussion();
        $discussion->title = $this->discussion_title;
        $discussion->content = $this->discussion_content;
        $discussion->user_id = $this->user->id;
        $discussion->category_id = $this->disscussion_category_id;

        $discussion->class = $this->disscussion_class == 1
        ? "10"
        : ($this->disscussion_class == 2
            ? "11"
            : ($this->disscussion_class == 3
                ? "12"
                : "other"));


        $discussion->likes = 0;
        $discussion->comments = 0;

        $discussion->save();

        $this->refreshModel();
        $this->fetchData();
        $this->dispatch('swal', title: 'Đã thêm một bài thảo luận.', type: 'success');

        //  cộng điểm đăng bài diễn đàn
        UserHelper::addPoint($this->user, 20);
    }

    public function getAllDiscussion() {
        return Discussion::all();
    }

}
