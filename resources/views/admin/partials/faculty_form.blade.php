<div class="modal-body">
        <div class="form-group">
            <label for="universities">Universities</label>
            <select name="uni_id" id="universities" class="form-control">
                <option value="">Select University</option>
                @foreach ($universities as $university)
                    <option value="{{$university->uni_id}}">{{$university->name}}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" value="" name="name" id="" class="form-control">
        </div>
</div>