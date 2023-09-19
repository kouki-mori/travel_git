<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class TravelsController extends Controller
{

    /** 
     * 非会員用画面を表示する
     * 
     * @return view
     */
    public function index()
    {

        $posts = Post::all();
        $posts = Post::paginate(5);
        // dd($posts);

        return view('travels.index', ['posts' => $posts]);
    }

    /** 
     * 会員用画面を表示する
     * 
     * @return view
     */
    public function index_member()
    {
        $posts = Post::all();
        $posts = Post::paginate(5);
        return view('travels.index_member', ['posts' => $posts]);
    }


    /**
     * 投稿詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            session()->flash('err_msg', 'データがありません。');
            return redirect(route('index_member'));
        }

        return view('travels.detail', ['post' => $post]);
    }


    /** 
     * 投稿登録画面を表示する
     * 
     * @return view
     */
    public function showCreate()
    {
        return view('travels.post');
    }


    /**
     * 投稿を登録する
     * 
     * return @view
     */
    public function exeStore(PostRequest $request)
    {
        // 投稿のデータを受け取る
        $inputs = $request->all();

        // 画像ファイルの保存場所指定
        if (request('image')) {
            $filename = request()->file('image')->getClientOriginalName();
            $inputs['image'] = request('image')->storeAs('public/img', $filename);
        }

        DB::beginTransaction();
        try {
            // ブログを登録
            Post::create($inputs);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        session()->flash('err_msg', '投稿を登録しました');
        return redirect(route('index_member'));
    }


    /**
     * 投稿編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            session()->flash('err_msg', 'データがありません。');
            return redirect(route('index_member'));
        }

        return view('travels.edit', ['post' => $post]);
    }


    /**
     * 投稿を更新する
     * 
     * return @view
     */
    public function exeUpdate(PostRequest $request)
    {
        // 投稿のデータを受け取る
        $inputs = $request->all();

        // 画像ファイルの保存場所指定
        if (request('image')) {
            $filename = request()->file('image')->getClientOriginalName();
            $inputs['image'] = request('image')->storeAs('public/img', $filename);
        }


        DB::beginTransaction();
        try {
            // 投稿を登録
            $post = Post::find($inputs['id']);
            $post->fill([
                'image' => $inputs['image'],
                'theme' => $inputs['theme'],
                'area' => $inputs['area'],
                'address' => $inputs['address'],
                'comment' => $inputs['comment'],
            ]);
            $post->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        session()->flash('err_msg', '投稿を更新しました');
        return redirect(route('index_member'));
    }


    /**
     * 投稿を削除する
     * @param int $id
     * @return view
     */
    public function delete($id)
    {
        if (empty($id)) {
            session()->flash('err_msg', 'データがありません。');
            return redirect(route('index_member'));
        }
        try {
            // 投稿を削除
            Post::destroy($id);
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        session()->flash('err_msg', '削除しました');
        return redirect(route('index_member'));
    }


    /** 
     * 検索結果画面を表示する
     * 
     * @return view
     */
    public function search(Request $request)
    {
        $posts = Post::where('theme', 'like', "%{$request->search}%")
            ->orWhere('area', 'like', "%{$request->search}%")
            ->orWhere('address', 'like', "%{$request->search}%")
            ->orWhere('comment', 'like', "%{$request->search}%")
            ->paginate(5);

        $search_result = $request->search . 'の検索結果' . $posts->total() . '件';

        return view('travels.index_member', ['posts' => $posts, 'search_result' => $search_result]);
    }


    /** 
     * いいね一覧画面を表示する
     * 
     * @return view
     */
    public function like_list()
    {
        $user = User::find(Auth::id());
        // ユーザーがいいねした投稿を取得
        $likedPosts = $user->likedPosts()->paginate(5);

        return view('travels.like_list', ['likedPosts' => $likedPosts]);

    }
}
