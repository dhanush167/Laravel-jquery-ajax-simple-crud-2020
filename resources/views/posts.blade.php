@extends('layouts.app')

@section('content')

    <hr />
    <div class="container">
        <h1>Posts List</h1>
        <p>
            <button id="btn-add-post" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#postsAddModal">
                Add Post
            </button>
        </p>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="posts-list" name="posts-list">
                @foreach ($posts as $post)
                    <tr id="link{{$post->id}}">
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->description}}</td>
                        <td>
                            <button class="btn btn-info" id="modal-edit" data-toggle="modal" data-target="#postsEditModal" value="{{$post->id}}">
                                Edit
                            </button>
                            <button class="btn btn-danger delete-post" value="{{$post->id}}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Add Post -->
        <div class="modal fade" id="postsAddModal" tabindex="-1" role="dialog" aria-labelledby="postAddModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </p>
                        <h4 class="modal-title">Add Post</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form id="postAddModalForm" name="postAddModalForm" class="form-horizontal" method="POST" novalidate="">
                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Author</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter author" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn-save-add-post" class="btn btn-success">Add Post</button>
                        <button type="button" id="btn-reset-post" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Post -->
        <div class="modal fade" id="postsEditModal" tabindex="-1" role="dialog" aria-labelledby="postEditModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </p>
                        <h4 class="modal-title">Edit Post</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form id="postEditModalForm" name="postEditModalForm" class="form-horizontal" method="POST" novalidate="">
                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title-edit" name="title" placeholder="Enter title" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Author</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="author-edit" name="author" placeholder="Enter author" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="description-edit" name="description" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn-save-update-post" class="btn btn-primary">Update Post</button>
                        <input type="hidden" id="post_id" name="post_id" value="0">
                    </div>
                </div>
            </div>
        </div>

        {!! csrf_field() !!}

	</div>
@endsection
