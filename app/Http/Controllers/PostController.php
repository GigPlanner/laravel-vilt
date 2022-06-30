<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Domains\Posts\DataTransferObjects\PostCreationData;
use Domains\Posts\DataTransferObjects\PostData;
use Domains\Posts\ViewModels\PostsViewModel;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(?User $user = null)
    {
        return inertia('Post/Index', [
            'model' => new PostsViewModel(
                'All posts',
                PostData::collection(
                    Post::with('user')
                        ->when(
                            $user?->exists,
                            fn(Builder $builder) => $builder->where('user_id', '=', $user?->id),
                        )
                        ->latest()
                        ->get(),
                )->toArray(),
            ),
        ]);
    }

    public function store(PostCreationData $creationData): RedirectResponse
    {
        auth()
            ->user()
            ?->posts()
            ->create($creationData->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return Inertia::modal('Post/Edit')->baseRoute('posts.index', ['user' => $post->user_id]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
