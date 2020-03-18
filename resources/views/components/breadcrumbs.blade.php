<div class="breadcrumbs">
    <div class="breadcrumbs-container container">
        <div>
            {{ $slot }}
        </div>
        <div>
            <form action="{{ route('search') }}" method="GET">
                <span>Traži artikle:</span><input type="text" name="query" value="{{ request()->input('query') }}" id="query" class="form-control" placeholder="Search for product" />
            </form>
        </div>
    </div>
</div>
