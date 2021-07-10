@extends('layout')
@section('dashboard-content')
    <h1>Create Blog Form</h1>

    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong>{{ (Session::get('success')) }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden=true>&times;</span>
            </button>
        </div>
    @endif

    @if (Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong>{{ (Session::get('failed')) }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden=true>&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('store-blog-post')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="postTitle">Post Title</label>
            <input type="text" class="form-control mt-3" id="postTitle" name="postTitle"aria-describedby="emailHelp" placeholder="Enter post title">
        </div>

        <div class="form-group">
            <label for="postDetails">Post Details</label>
            <textarea type="text" class="form-control mt-3" id="postDetails" name="postDetails"aria-describedby="emailHelp" placeholder="Enter post details"></textarea>
        </div>

        <div class="form-group">
            <label for="postCategory">Select a Post Category</label>
            <select type="text" class="form-control mt-3" id="postCategory" name="postCategory"aria-describedby="emailHelp">
                <option value="">Select one</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="featuredPhoto">Select featured photo:</label>
            <input type="file" name="featuredPhoto" class="form-control" id="featuredPhoto" onChange="loadPhoto(event);">
        </div>

        <div>
            <img id="photo" height="100" width="100" />
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

    <script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@stop