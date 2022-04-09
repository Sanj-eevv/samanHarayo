<div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            @php
                $img_src = asset('assets/images/common/blank_user.png');
                if ($user->avatar) {
                    $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->avatar);
                }
            @endphp
            <div class="position-relative">
                <img class="rounded avatar-md" src="{{$img_src}}" data-holder-rendered="true" id="img-container">
                <span class="cross-icon-profile remove-profile-image"><i class="fas fa-times"></i></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <label class="form-label">Avatar</label>
            <input class="form-control" type="file" name="image" accept=".png, .jpg, .jpeg" onchange="loadImage(this,'#img-container')">
            <input type="hidden" name="image" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-4">
                <label class="form-label">First Name</label>
                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-4">
                <label class="form-label">Last Name</label>
                <input class="form-control @error('last_name') is-invalid @enderror" type="text" value="{{old('last_name', $user->last_name)}}" name="last_name">
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-wrap gap-2 pt-4">
    <a type="button" href="{{route('profile.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
    <button type="submit" class="btn btn-info waves-effect waves-light">{{$buttonText}}</button>
</div>
@section('page_level_script')
    <script>
        $(function(){
            $('.remove-profile-image').click(function(){
                //send ajax request to
                console.log('sfsf');
                let action = BASE_URL+"/dashboard/profile/remove-avatar";
                $.ajax({
                    "url": action,
                    "dataType":"json",
                    "type":"DELETE",
                    "data":{"_token":CSRF_TOKEN},
                    beforeSend:function(){
                        // removeRowFromTable(table,id);
                        // $form.addClass("sp-loading");
                    },
                    success:function(resp){
                        $("#img-container").attr("src",BASE_URL+"/assets/images/common/blank_user.png");
                        toastSuccess(resp.message);
                    },
                    error: function(xhr){
                        console.log(xhr)
                        let obj = JSON.parse(xhr.responseText);
                        toastError(obj.message);
                    }
                });
            });
        });
        function loadImage(input, id) {
            id = id || '#sh_preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection
