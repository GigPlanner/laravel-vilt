<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Domains\Posts\DataTransferObjects\PostCreationData;
use Domains\Posts\DataTransferObjects\PostData;
use Domains\Posts\ViewModels\PostsViewModel;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return inertia('Post/Index', [
            'model' => new PostsViewModel(
                'All posts',
                PostData::collection(
                    Post::with('user')
                        ->latest()
                        ->get(),
                )->toArray(),
            ),
        ]);
    }

    public function create()
    {
        return inertia('Post/Create');
    }

    public function store(PostCreationData $creationData): RedirectResponse
    {
        auth()
            ->user()
            ?->posts()
            ->create($creationData->all());

        return redirect()->route('posts.index');
    }

    public function edit()
    {
        return Inertia::modal('Post/Edit')->baseRoute('posts.index');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
