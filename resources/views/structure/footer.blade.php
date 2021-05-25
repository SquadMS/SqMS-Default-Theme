<footer class="p-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center col-md-6 text-md-left">
                {{ __('sqms-default-theme::footer.copyright', ['name' => config('app.name'), 'year' => now()->year]) }}
            </div>
            <div class="col-12 text-center col-md-6 text-md-right">
                {!! __('sqms-default-theme::footer.powered-by') !!}
            </div>
        </div>
    </div>
</footer>