    <!-- ==================================== Data Update Section ====================================  -->
    @if (session()->has('message'))
        <div class="bb-data-updated">
            <p>{{session('message')}}</p>
        </div>
    @endif

    <!-- ==================================== Footer Section ====================================  -->
    <footer class="bb-footer">
        <div class="bb-container">
            <p>All &copy; right resored by Blaze Battles</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>