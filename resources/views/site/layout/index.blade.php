<!DOCTYPE html>
<html lang="en">
@includeIf("site.layout.head")
<body class="@yield("body-class")">
<div class="page-wrapper">
    <main class="main">
    @includeIf("site.layout.nav")
    @yield("content")
    </main>
</div>

@includeIf("site.layout.mobile-nav")
@includeIf("site.layout.mobile-footer")

</body>
@include('sweetalert::alert')
@includeIf("site.layout.footer")
@includeIf("site.layout.blade-scripts")
@includeIf("site.layout.scripts")
</html>