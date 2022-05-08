<div class="header-links">
    <div class="card-body">
        @if (Session::has('message'))
      <div class="flash alert-info">
        <p class="panel-body">
          {{ Session::get('message') }}
        </p>
      </div>
      @endif
        <form method="POST" action="{{route('post.store') }}"  enctype="multipart/form-data">
            @csrf
            <!-- Form Group (current password)-->
            <div class="mb-3">
                <label class="small mb-1" for="text">Content</label>
                <input class="form-control" id="text" type="text" name="text" placeholder="Enter content">
                <input type='file' onchange="readURL(this);" name="image"/>
                 <img id="blah" src="#" alt="image error" style="display: none" />
            </div>
            <button class="btn btn-primary" id="submit" disabled type="submit">Post</button>
        </form>
    </div>
 </div>