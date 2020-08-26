<br/>
<div class="col-md-3">
    <button type="submit" class="save-btn new-categories">New Categories</button>
</div>
<div class="clearfix"></div>
<hr/>

@foreach($categories as $value)
    <div class="vacancies-list-item">
        <div class="about-main">
            <h2 style="display: inline-block; margin: 10px" >{{$value->title}}</h2>

            <div class="col-md-2 pull-right">
                <br/>
                <div class="customer-item-btn col-md-6">
                    <a href="#" class="btn btn-success" id="edit" onclick="categories.edit(event, {{ $value->id }})">Edit</a>
                </div>
                <div class="delete-btn-wrapper col-md-6">
                    <a href="#" class="delete-btn" data-id="{{ $value->id}}">Delete</a>
                    <span class="sure-delete">
                <span>Are you sure? Want <br><b>delete</b> Test Task</span>
                    <p>Yes</p>
                    <p>No</p>
            </span>
                </div>
            </div>

        </div>
    </div>
@endforeach