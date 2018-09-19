<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        {{-- <strong>Version</strong>&nbsp;&nbsp; {!! config('admin.version') !!} --}}
        @version
        @endif

        &nbsp;&nbsp;&nbsp;&nbsp;

        @if(config('admin.show_version'))
        <strong>Version</strong>&nbsp;&nbsp; {!! \Encore\Admin\Admin::VERSION !!}
        @endif

    </div>
    <!-- Default to the left -->
    <strong>Powered by <a href="https://voidblock.com/" target="_blank">VOIDBLOCK LLC</a></strong>
</footer>