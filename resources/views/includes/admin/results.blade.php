@if (Session::has('status'))
@switch(Session::get('status'))
        @case('error')
            <div class="alert alert-danger" role="alert">
                An Error Occured Please Try Again Later
            </div>
            @break
        @case('update')
            <div class="alert alert-primary" role="alert">
               Information Updated Successfully
            </div>
            @break
        @case('delete')
            <div class="alert alert-danger" role="alert">
                Information  Deleted Successfully
            </div>
            @break
        @case('added')
            <div class="alert alert-success" role="alert">
                Information  Added Successfully
            </div>
            @break
        @case('exists')
            <div class="alert alert-success" role="alert">
                This Info Already Exists and can't be dublicated
            </div>
            @break
        @default
    @endswitch
@endif
