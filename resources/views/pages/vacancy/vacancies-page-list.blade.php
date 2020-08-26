<div class="vacancies-list">

    <div class="col-md-12 sort">
    @if(!empty($categories))
    <div class="sort-category pull-left">
        <select>
            <option disabled selected>Category</option>
            @foreach($categories as $category)
                <option data-sort="type=category" value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    @endif
    @if(!empty($typesCandidate))
        <div class="sort-type-candidate pull-left">
            <select>
                <option disabled selected>Types candidates</option>
                @foreach($typesCandidate as $type)
                    <option data-sort="type=type-candidate" value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select>
        </div>
    @endif
        <div class="sort-tags pull-left">
            <form action="" method="get" name="searchTags" id="h-search">
                <input type="search" name="search-tags" data-sort="type=tags" placeholder="Tags"/>
                <input type="submit" value="" />
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    @include('pages.vacancy.vacancies-list-item')
</div>