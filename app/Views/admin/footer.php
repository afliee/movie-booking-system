</main>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(() => {
            !function () {
                $("a.nav-link.active").removeClass("active");
                $(`a[href="${window.location.pathname}"]`).addClass("active");
            }();
        })

    </script>
</body>
</html>