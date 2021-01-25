<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Auth;

class Comments extends Component
{
	public $comment;
	public $comments;

	public function store()
	{
		if ($this->comment != '') {
			Comment::create([
				'comment' => $this->comment,
				'user_id'  => Auth::id(),
			]);
			session()->flash('message', 'Comment published!');
			$this->comment = '';
			$this->render();
		}
	}

	public function destroy($id)
	{
		Comment::findOrFail($id)->delete();;
		session()->flash('message', 'Comment deleted!');
		$this->render();
	}

    public function render()
    {
    	$this->comments = Comment::latest()->get();
        return view('livewire.comments');
    }
}
