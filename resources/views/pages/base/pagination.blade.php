<div class="pagination-wrapper">

        @if($data->lastPage() <> 1)

                @if (isset($strSearch) && $strSearch)
                    {{ $data->appends(['searchItem' => $strSearch])->links() }}
                @else
                    {{ $data->links('pages.base.pagination-links') }}
                @endif

        @endif

</div>